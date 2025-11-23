<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

// Set content type to JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

try {
    $pdo = backend_get_pdo();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get PSI for specific user
        $userId = (int)($_GET['user_id'] ?? 0);

        if ($userId <= 0) {
            http_response_code(400);
            echo json_encode(['error' => 'Valid user_id required']);
            exit;
        }

        // Check if user exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        if (!$stmt->fetch()) {
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
            exit;
        }

        $psiScore = calculatePSI($pdo, $userId);

        // Get current stored PSI for comparison
        $stmt = $pdo->prepare("SELECT psi_score FROM user_profiles WHERE user_id = ?");
        $stmt->execute([$userId]);
        $currentPsi = $stmt->fetchColumn() ?? 0;

        echo json_encode([
            'user_id' => $userId,
            'psi_score' => $psiScore,
            'stored_psi' => (float)$currentPsi,
            'needs_update' => abs($psiScore - (float)$currentPsi) > 0.01
        ]);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recalculate PSI for all users (admin function)
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Authentication required']);
            exit;
        }

        // Get all users with votes
        $stmt = $pdo->query("
            SELECT DISTINCT up.user_id
            FROM user_profiles up
            JOIN profile_votes pv ON up.user_id = pv.target_user_id
        ");
        $users = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $updated = 0;
        foreach ($users as $userId) {
            $psiScore = calculatePSI($pdo, (int)$userId);

            $stmt = $pdo->prepare("
                UPDATE user_profiles
                SET psi_score = ?, updated_at = NOW()
                WHERE user_id = ?
            ");
            $stmt->execute([$psiScore, $userId]);
            $updated++;
        }

        echo json_encode([
            'success' => true,
            'message' => "Recalculated PSI for $updated users"
        ]);

    } else {
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
    }

} catch (Exception $e) {
    error_log("PSI calc error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Internal server error']);
}

/**
 * Calculate PSI (Public Sentiment Index) for a user
 *
 * Formula: PSI = weighted_average_rating × log(vote_count + 1) + recency_bonus
 *
 * Components:
 * 1. Average rating (1-10) with recency weighting
 * 2. Vote count logarithmic scaling to prevent manipulation
 * 3. Recency bonus for recent votes (within 7 days)
 */
function calculatePSI(PDO $pdo, int $userId): float
{
    // Get all ratings for this user
    $stmt = $pdo->prepare("
        SELECT rating, voted_at
        FROM profile_votes
        WHERE target_user_id = ?
        ORDER BY voted_at DESC
    ");
    $stmt->execute([$userId]);
    $votes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($votes)) {
        return 0.0; // No votes = 0 PSI
    }

    $totalVotes = count($votes);
    $weightedSum = 0;
    $totalWeight = 0;
    $now = time();

    foreach ($votes as $vote) {
        $rating = (float)$vote['rating'];
        $voteTime = strtotime($vote['voted_at']);
        $daysDiff = ($now - $voteTime) / (60 * 60 * 24);

        // Base weight
        $weight = 1.0;

        // Recency bonus: exponential decay over 30 days
        if ($daysDiff <= 30) {
            $weight *= (1 + exp(-$daysDiff / 7)); // Peaks at ~1.5x for very recent
        } else {
            $weight *= 0.5; // Old votes get 50% weight
        }

        $weightedSum += $rating * $weight;
        $totalWeight += $weight;
    }

    // Calculate weighted average
    $weightedAvg = $weightedSum / $totalWeight;

    // Apply vote count scaling: prevents single vote manipulation
    $voteScaling = min(2.0, log($totalVotes + 1) / log(10)); // Max 2.0 at ~100 votes

    // Final PSI: scale to 0-10 range
    $psi = min(10.0, max(0.0, $weightedAvg * $voteScaling));

    return round($psi, 2);
}
?>