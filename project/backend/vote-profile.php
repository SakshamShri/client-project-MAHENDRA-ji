<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

// Set content type to JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

try {
    $pdo = backend_get_pdo();

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }

    $userId = (int)$_SESSION['user_id'];

    // Get JSON input
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        $input = $_POST;
    }

    $targetUserId = (int)($input['target_user_id'] ?? 0);
    $rating = (int)($input['rating'] ?? 0);

    // Validate input
    if ($targetUserId <= 0 || $rating < 1 || $rating > 10) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid target user ID or rating (1-10)']);
        exit;
    }

    // Check if trying to vote on self
    if ($targetUserId === $userId) {
        http_response_code(400);
        echo json_encode(['error' => 'Cannot vote on your own profile']);
        exit;
    }

    // Check if target user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$targetUserId]);
    if (!$stmt->fetch()) {
        http_response_code(404);
        echo json_encode(['error' => 'Target user not found']);
        exit;
    }

    // Insert or update vote
    $stmt = $pdo->prepare("
        INSERT INTO profile_votes (voter_id, target_user_id, rating, voted_at)
        VALUES (?, ?, ?, NOW())
        ON DUPLICATE KEY UPDATE rating = VALUES(rating), voted_at = NOW()
    ");
    $stmt->execute([$userId, $targetUserId, $rating]);

    // Recalculate PSI for target user
    $psiScore = calculatePSI($pdo, $targetUserId);

    // Update user profile with new PSI score
    $stmt = $pdo->prepare("
        UPDATE user_profiles
        SET psi_score = ?, updated_at = NOW()
        WHERE user_id = ?
    ");
    $stmt->execute([$psiScore, $targetUserId]);

    // Return success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Vote recorded successfully',
        'psi_score' => $psiScore
    ]);

} catch (Exception $e) {
    error_log("Vote profile error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Internal server error']);
}

/**
 * Calculate PSI (Public Sentiment Index) for a user
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
    $totalRating = 0;
    $weightedRating = 0;
    $now = time();

    foreach ($votes as $vote) {
        $rating = (float)$vote['rating'];
        $totalRating += $rating;

        // Recency bonus: votes within 7 days get 5% bonus
        $voteTime = strtotime($vote['voted_at']);
        $daysDiff = ($now - $voteTime) / (60 * 60 * 24);

        $recencyMultiplier = 1.0;
        if ($daysDiff <= 7) {
            $recencyMultiplier = 1.05; // 5% bonus for recent votes
        }

        $weightedRating += $rating * $recencyMultiplier;
    }

    // Calculate average rating
    $avgRating = $totalRating / $totalVotes;
    $weightedAvg = $weightedRating / $totalVotes;

    // Apply vote count weighting: log(vote_count + 1) prevents manipulation
    $voteWeight = log($totalVotes + 1) / log(10); // log10 scaling

    // Final PSI calculation
    $psi = min(10.0, max(0.0, $weightedAvg * $voteWeight));

    // Round to 2 decimal places
    return round($psi, 2);
}
?>