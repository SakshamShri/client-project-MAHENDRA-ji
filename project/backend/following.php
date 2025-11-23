<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

// Extract user ID from URL
$path = $_SERVER['REQUEST_URI'];
$userId = null;
if (preg_match('#/following\.php/(\d+)#', $path, $matches)) {
    $userId = (int)$matches[1];
}

if (!$userId) {
    backend_json_response(400, [
        'ok' => false,
        'error' => 'User ID required',
    ]);
}

try {
    $pdo = backend_get_pdo();

    // Check if user exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE id = ?');
    $stmt->execute([$userId]);
    if (!$stmt->fetch()) {
        backend_json_response(404, [
            'ok' => false,
            'error' => 'User not found',
        ]);
    }

    // Get following with their profile info
    $stmt = $pdo->prepare('
        SELECT
            u.id,
            u.username,
            COALESCE(up.display_name, u.username) as display_name,
            up.avatar_url,
            up.role,
            up.psi_score,
            up.is_verified,
            f.followed_at
        FROM following f
        JOIN users u ON f.following_id = u.id
        LEFT JOIN user_profiles up ON u.id = up.user_id
        WHERE f.follower_id = ?
        ORDER BY f.followed_at DESC
    ');
    $stmt->execute([$userId]);

    $following = $stmt->fetchAll();

    backend_json_response(200, [
        'ok' => true,
        'following' => $following,
    ]);

} catch (PDOException $e) {
    backend_json_response(500, [
        'ok' => false,
        'error' => 'Unexpected server error.',
    ]);
}