<?php
class SessionHelper {
    
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    public static function isLoggedIn() {
        return isset($_SESSION['username']);
    }

    // Kiểm tra xem người dùng có phải là admin hay không
    public static function isAdmin() {
        return isset($_SESSION['username']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
    }

    // Kiểm tra xem người dùng có phải là một người dùng thường hay không
    public static function isUser() {
        return isset($_SESSION['username']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'user';
    }

    // Lấy tên người dùng
    public static function getUsername() {
        return $_SESSION['username'] ?? null;
    }

    // Lấy quyền người dùng
    public static function getUserRole() {
        return $_SESSION['user_role'] ?? null;
    }

    // Đăng xuất người dùng (xóa session)
    public static function logout() {
        session_unset();
        session_destroy();
    }
}
