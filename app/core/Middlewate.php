<?php

class Middleware {
    
    public static function requireAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public static function requireAdmin() {
        self::requireAuth();
        if ($_SESSION['user_role'] !== 'admin') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public static function requireSuperAdmin() {
        self::requireAuth();
        if ($_SESSION['user_role'] !== 'super_admin') {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
}