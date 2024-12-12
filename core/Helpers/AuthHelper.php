<?php

class AuthHelper {
    public static function isLoggedIn() {
        return SessionHelper::has('user');
    }

    public static function getCurrentUser() {
        return SessionHelper::get('user');
    }

    public static function checkPermission($requiredRole) {
        $currentUser = self::getCurrentUser();
        if (!$currentUser || $currentUser['role'] !== $requiredRole) {
            header("Location: /403.php");
            exit;
        }
    }

    public static function logIn($user) {
        SessionHelper::set('user', $user);
    }

    public static function logOut() {
        SessionHelper::remove('user');
    }
}
