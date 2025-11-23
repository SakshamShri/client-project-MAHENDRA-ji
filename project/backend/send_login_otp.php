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

$errors = [];

if ($phoneNumber === '' || !preg_match('/^\+?[1-9]\d{1,14}$/', $phoneNumber)) {
    $errors['phone_number'] = 'A valid phone number is required.';
}

if (!empty($errors)) {
    backend_json_response(422, [
        'ok'     => false,
        'errors' => $errors,
    ]);
}

try {
    $pdo = backend_get_pdo();

    // Check if user exists with this phone number
    $stmt = $pdo->prepare('SELECT id FROM users WHERE phone_number = :ph LIMIT 1');
    $stmt->execute([':ph' => $phoneNumber]);
    $user = $stmt->fetch();

    if (!$user) {
        backend_json_response(404, [
            'ok'    => false,
            'error' => 'Phone number not registered.',
        ]);
    }

    // Generate 6-digit OTP
    $otp = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);

    // Expire in 5 minutes
    $expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    // Insert OTP
    $stmt = $pdo->prepare('INSERT INTO otp_codes (phone_number, otp_code, expires_at) VALUES (:ph, :otp, :exp)');
    $stmt->execute([
        ':ph' => $phoneNumber,
        ':otp' => $otp,
        ':exp' => $expiresAt,
    ]);

    // In production, send SMS here. For testing, return OTP
    backend_json_response(200, [
        'ok' => true,
        'message' => 'OTP sent successfully.',
        'otp' => $otp, // Remove this in production
    ]);
} catch (PDOException $e) {
    backend_json_response(500, [
        'ok'    => false,
        'error' => 'Unexpected server error.',
    ]);
}