<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    backend_json_response(405, [
        'ok' => false,
        'error' => 'Method not allowed',
    ]);
}

$data = backend_read_input();

$phoneNumber = trim((string)($data['phone_number'] ?? ''));
$otpCode     = trim((string)($data['otp_code'] ?? ''));

$errors = [];

if ($phoneNumber === '' || !preg_match('/^\+?[1-9]\d{1,14}$/', $phoneNumber)) {
    $errors['phone_number'] = 'A valid phone number is required.';
}

if ($otpCode === '' || !preg_match('/^\d{6}$/', $otpCode)) {
    $errors['otp_code'] = 'A valid 6-digit OTP is required.';
}

if (!empty($errors)) {
    backend_json_response(422, [
        'ok'     => false,
        'errors' => $errors,
    ]);
}

try {
    $pdo = backend_get_pdo();

    // Check OTP
    $stmt = $pdo->prepare(
        'SELECT * FROM otp_codes
         WHERE phone_number = :ph AND otp_code = :otp AND expires_at > NOW()
         ORDER BY created_at DESC LIMIT 1'
    );
    $stmt->execute([
        ':ph' => $phoneNumber,
        ':otp' => $otpCode,
    ]);
    $otpRecord = $stmt->fetch();

    if (!$otpRecord) {
        backend_json_response(401, [
            'ok'    => false,
            'error' => 'Invalid or expired OTP.',
        ]);
    }

    // Get user
    $stmt = $pdo->prepare('SELECT id, username, email FROM users WHERE phone_number = :ph LIMIT 1');
    $stmt->execute([':ph' => $phoneNumber]);
    $user = $stmt->fetch();

    if (!$user) {
        backend_json_response(404, [
            'ok'    => false,
            'error' => 'User not found.',
        ]);
    }

    // Delete OTP after use
    $stmt = $pdo->prepare('DELETE FROM otp_codes WHERE id = :id');
    $stmt->execute([':id' => $otpRecord['id']]);

    // Start session
    session_start();
    session_regenerate_id(true);

    $_SESSION['user_id']    = (int)$user['id'];
    $_SESSION['username']   = (string)$user['username'];
    $_SESSION['user_email'] = (string)$user['email'];

    backend_json_response(200, [
        'ok'   => true,
        'user' => [
            'id'       => (int)$user['id'],
            'username' => (string)$user['username'],
            'email'    => (string)$user['email'],
        ],
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok'    => false,
        'error' => 'Unexpected server error.',
    ]);
}