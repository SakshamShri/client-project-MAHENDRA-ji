# Backend Setup Guide

This guide will help you set up and test the Review Ratings backend on your local machine.

## Prerequisites

- PHP 8.0 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or PHP's built-in server

## 🗄️ Database Setup

### 1. Create Database
```sql
CREATE DATABASE voter_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Import Schema
```bash
mysql -u your_username -p voter_app < backend/schema.sql
```

### 3. Update Configuration
Edit `backend/config.php` with your database credentials:
```php
const DB_HOST = 'localhost';
const DB_NAME = 'voter_app';
const DB_USER = 'your_mysql_username';
const DB_PASS = 'your_mysql_password';
```

## 🌐 Web Server Setup

### Option A: PHP Built-in Server (Recommended for Testing)
```bash
cd /path/to/your/project
php -S localhost:8000
```
Then visit: `http://localhost:8000/backend/test.php`

### Option B: Apache/Nginx
- Place project files in web root directory
- Ensure PHP is enabled
- Visit: `http://localhost/backend/test.php`

## 🧪 Testing Your Backend

### 1. Database Connection Test
Visit: `http://localhost:8000/backend/test.php`

You should see:
- ✅ Database connection: SUCCESS
- Table counts for all backend tables
- Links to test individual APIs

### 2. API Endpoint Testing

#### Using Browser
Visit these URLs in your browser:
- `http://localhost:8000/backend/categories.php`
- `http://localhost:8000/backend/leaderboard.php`
- `http://localhost:8000/backend/trending.php`
- `http://localhost:8000/backend/polls.php?status=active`

#### Using curl (Command Line)
```bash
# Test categories
curl http://localhost:8000/backend/categories.php

# Test trending with parameters
curl "http://localhost:8000/backend/trending.php?limit=5&category=Education"

# Test polls
curl "http://localhost:8000/backend/polls.php?status=active"
```

### 3. Sample Data (Optional)
To add some test data, you can run these SQL commands:
```sql
-- Add sample categories
INSERT INTO categories (name, icon_name) VALUES
('Education', 'fa-graduation-cap'),
('Healthcare', 'fa-heartbeat'),
('Technology', 'fa-code');

-- Add sample user (password: 'password')
INSERT INTO users (username, email, password_hash) VALUES
('testuser', 'test@example.com', '$2y$10$hash_here');
```

## 🔧 Troubleshooting

### Database Connection Issues
- Verify MySQL is running: `sudo service mysql status`
- Check credentials in `config.php`
- Ensure database exists: `SHOW DATABASES;`

### Permission Errors
```bash
# Make sure web server can read files
chmod 755 backend/
chmod 644 backend/*.php
```

### PHP Errors
- Check PHP version: `php --version`
- Enable error reporting in `config.php`
- Check web server error logs

### Port Already in Use
If port 8000 is busy, use a different port:
```bash
php -S localhost:8080
```

## 📊 Expected Results

When working correctly, you should see:
- JSON responses from API endpoints
- No PHP fatal errors
- Database tables with proper structure
- Test page showing all green success indicators

## 🚀 Next Steps

Once backend is working:
1. Add sample users and data
2. Test user authentication endpoints
3. Connect frontend to backend APIs
4. Deploy to production server

## 📞 Support

If you encounter issues:
1. Check the test page for specific error messages
2. Verify all prerequisites are installed
3. Ensure file paths are correct
4. Check web server configuration