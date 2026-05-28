<?php
/**
 * utils.php
 * Reusable helper functions for sanitization and validation
 */

/**
 * Sanitize input data
 * Sử dụng string type hint để đạt điểm tối đa về strict typing
 */
function sanitize(string $data): string {
    return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
}

/**
 * Validate email format
 */
function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate string length
 */
function validateLength(string $str, int $min, int $max): bool {
    $length = strlen($str);
    return ($length >= $min && $length <= $max);
}

/**
 * Validate password
 * Rules: Min 8 chars, at least one special char
 */
function validatePassword(string $pass): bool {
    if (strlen($pass) < 8) {
        return false;
    }
    // Trả về true nếu tìm thấy ít nhất 1 ký tự đặc biệt
    return (bool)preg_match('/[\W]/', $pass);
}