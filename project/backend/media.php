<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

// Handle different HTTP methods
$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

// Extract user ID from URL (e.g., /backend/media.php/123)
$userId = null;
if (preg_match('#/media\.php(?:/(\d+))?#', $path, $matches)) {
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
        // Get media for a user
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

        // Get user's media
        $stmt = $pdo->prepare('SELECT id, media_type, file_path, title, description, uploaded_at FROM media WHERE user_id = ? ORDER BY uploaded_at DESC');
        $stmt->execute([$userId]);

        $media = $stmt->fetchAll();

        backend_json_response(200, [
            'ok' => true,
            'media' => $media,
        ]);

    } elseif ($method === 'POST') {
        // Upload media
        if (!$userId || $userId !== $currentUserId) {
            backend_json_response(403, [
                'ok' => false,
                'error' => 'Can only upload media for yourself',
            ]);
        }

        $data = backend_read_input();

        $mediaType = $data['media_type'] ?? '';
        $filePath = $data['file_path'] ?? '';
        $title = $data['title'] ?? '';
        $description = $data['description'] ?? '';

        if (!in_array($mediaType, ['image', 'video'])) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'Invalid media type',
            ]);
        }

        if (empty($filePath)) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'File path required',
            ]);
        }

        // Insert media record
        $stmt = $pdo->prepare('INSERT INTO media (user_id, media_type, file_path, title, description, uploaded_at) VALUES (?, ?, ?, ?, ?, NOW())');
        $stmt->execute([$userId, $mediaType, $filePath, $title, $description]);

        $mediaId = (int)$pdo->lastInsertId();

        backend_json_response(201, [
            'ok' => true,
            'message' => 'Media uploaded',
            'media_id' => $mediaId,
        ]);

    } elseif ($method === 'DELETE') {
        // Delete media
        if (!$userId) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'User ID required',
            ]);
        }

        $mediaId = (int)($data['media_id'] ?? 0);

        if ($mediaId <= 0) {
            backend_json_response(400, [
                'ok' => false,
                'error' => 'Media ID required',
            ]);
        }

        // Check if media exists and belongs to user
        $stmt = $pdo->prepare('SELECT id FROM media WHERE id = ? AND user_id = ?');
        $stmt->execute([$mediaId, $currentUserId]);
        if (!$stmt->fetch()) {
            backend_json_response(404, [
                'ok' => false,
                'error' => 'Media not found or access denied',
            ]);
        }

        // Delete media
        $stmt = $pdo->prepare('DELETE FROM media WHERE id = ?');
        $stmt->execute([$mediaId]);

        backend_json_response(200, [
            'ok' => true,
            'message' => 'Media deleted',
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