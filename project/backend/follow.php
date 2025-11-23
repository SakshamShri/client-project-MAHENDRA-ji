<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

// Handle different HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Extract user ID from URL (e.g., /backend/follow.php/123)
$userId = null;
if (preg_match('#/follow\.php/(\d+)#', $path, $matches)) {
    $userId = (int)$matches[1];
}

try {
    $pdo = backend_get_pdo();
    session_start();

    if (!isset($_SESSION['user_id'])) {
        backend_json_response(401, [
            'ok' => false,
            'error' => 'Not logged in',
        ]);
    }

    $currentUserId = $_SESSION['user_id'];

    if ($method === 'POST') {
        // Follow a user
        if (!$userId) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'User ID required',
            ]);
        }

        if ($currentUserId === $userId) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'Cannot follow yourself',
            ]);
        }

        // Check if user exists
        $stmt = $pdo->prepare('SELECT id FROM users WHERE id = ?');
        $stmt->execute([$userId]);
        if (!$stmt->fetch()) {
            backend_json_response(404, [
                'ok' => false,
                'error' => 'User not found',
            ]);
        }

        // Insert follow relationship
        $stmt = $pdo->prepare('INSERT IGNORE INTO following (follower_id, following_id) VALUES (?, ?)');
        $stmt->execute([$currentUserId, $userId]);

        // Update follower/following counts
        updateFollowCounts($pdo, $currentUserId);
        updateFollowCounts($pdo, $userId);

        backend_json_response(201, [
            'ok' => true,
            'message' => 'User followed',
        ]);

    } elseif ($method === 'DELETE') {
        // Unfollow a user
        if (!$userId) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'User ID required',
            ]);
        }

        // Remove follow relationship
        $stmt = $pdo->prepare('DELETE FROM following WHERE follower_id = ? AND following_id = ?');
        $stmt->execute([$currentUserId, $userId]);

        // Update follower/following counts
        updateFollowCounts($pdo, $currentUserId);
        updateFollowCounts($pdo, $userId);

        backend_json_response(200, [
            'ok' => true,
            'message' => 'User unfollowed',
        ]);

    } else {
        backend_json_response(405, [
            'ok' => false,
            'error' => 'Method not allowed',
        ]);
    }

} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}

function updateFollowCounts(PDO $pdo, int $userId): void {
    // Update followers count
    $stmt = $pdo->prepare('
        UPDATE user_profiles
        SET followers_count = (SELECT COUNT(*) FROM following WHERE following_id = user_profiles.user_id)
        WHERE user_id = ?
    ');
    $stmt->execute([$userId]);

    // Update following count
    $stmt = $pdo->prepare('
        UPDATE user_profiles
        SET following_count = (SELECT COUNT(*) FROM following WHERE follower_id = user_profiles.user_id)
        WHERE user_id = ?
    ');
    $stmt->execute([$userId]);
}