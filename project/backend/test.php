<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

echo "<!DOCTYPE html><html><head><title>Backend Test</title></head><body>";
echo "<h1>Backend Test Results</h1>\n";

try {
    $pdo = backend_get_pdo();
    echo "<p style='color: green;'>✅ Database connection: SUCCESS</p>\n";

    // Test categories table
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM categories");
    $result = $stmt->fetch();
    echo "<p>📂 Categories table: " . $result['count'] . " records</p>\n";

    // Test users table
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM users");
    $result = $stmt->fetch();
    echo "<p>👥 Users table: " . $result['count'] . " records</p>\n";

    // Test other tables
    $tables = ['user_profiles', 'profile_votes', 'following', 'media', 'achievements', 'announcements', 'social_links', 'polls'];
    foreach ($tables as $table) {
        try {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM $table");
            $result = $stmt->fetch();
            echo "<p>📊 $table table: " . $result['count'] . " records</p>\n";
        } catch (Exception $e) {
            echo "<p style='color: red;'>❌ $table table: ERROR - " . $e->getMessage() . "</p>\n";
        }
    }

    echo "<h2 style='color: green;'>🎉 Backend is working correctly!</h2>\n";

} catch (Exception $e) {
    echo "<h2 style='color: red;'>❌ Backend Error</h2>\n";
    echo "<p>Database connection failed: " . $e->getMessage() . "</p>\n";
    echo "<p>Check your config.php settings and database credentials.</p>\n";
}

echo "<hr>\n";
echo "<h3>API Endpoints to Test:</h3>\n";
echo "<ul>\n";
echo "<li><a href='categories.php'>Categories API</a></li>\n";
echo "<li><a href='leaderboard.php'>Leaderboard API</a></li>\n";
echo "<li><a href='trending.php'>Trending Profiles API</a></li>\n";
echo "<li><a href='polls.php'>Polls API</a></li>\n";
echo "<li><a href='users.php/me'>User Profile API (requires login)</a></li>\n";
echo "</ul>\n";

echo "<h3>Sample API Calls:</h3>\n";
echo "<pre>\n";
echo "# Test categories\n";
echo "curl http://localhost/backend/categories.php\n\n";
echo "# Test trending with filters\n";
echo "curl \"http://localhost/backend/trending.php?limit=5&category=Education\"\n\n";
echo "# Test polls\n";
echo "curl \"http://localhost/backend/polls.php?status=active\"\n";
echo "</pre>\n";

echo "</body></html>";