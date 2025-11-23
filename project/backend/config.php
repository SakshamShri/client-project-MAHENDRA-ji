<?php

// Basic configuration for backend auth service.
// TODO: change these values to match your actual MySQL server.

// Database connection
const DB_HOST = 'localhost';
const DB_NAME = 'voter_app';
const DB_USER = 'root';
const DB_PASS = 'root';

// General settings
const APP_ENV = 'development'; // 'production' in prod

if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', '0');
}
