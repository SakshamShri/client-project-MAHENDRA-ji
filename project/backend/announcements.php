<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

// Handle different HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Extract user ID from URL (e.g., /backend/announcements.php/123)
$userId = null;
if (preg_match('#/announcements\.php(?:/(\d+))?#', $path, $matches)) {
    $userId = isset($matches[1]) ? (int)$matches[1] : null;
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

    if ($method === 'GET') {
        // Get announcements for a user
        if (!$userId) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'User ID required',
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

        // Get user announcements
        $stmt = $pdo->prepare('SELECT id, title, content, image_url, created_at FROM announcements WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$userId]);

        $announcements = $stmt->fetchAll();

        backend_json_response(200, [
            'ok' => true,
            'announcements' => $announcements,
        ]);

    } elseif ($method === 'POST') {
        // Add announcement (only for self)
        if (!$userId || $userId !== $currentUserId) {
            backend_json_response(403, [
                'ok' => false,
                'error' => 'Can only add announcements for yourself',
            ]);
        }

        $data = backend_read_input();

        $title = trim($data['title'] ?? '');
        $content = trim($data['content'] ?? '');
        $imageUrl = trim($data['image_url'] ?? '');

        if (empty($title) || empty($content)) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'Title and content are required',
            ]);
        }

        // Insert announcement
        $stmt = $pdo->prepare('INSERT INTO announcements (user_id, title, content, image_url, created_at) VALUES (?, ?, ?, ?, NOW())');
        $stmt->execute([$userId, $title, $content, $imageUrl]);

        $announcementId = (int)$pdo->lastInsertId();

        backend_json_response(201, [
            'ok' => true,
            'message' => 'Announcement added',
            'announcement_id' => $announcementId,
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