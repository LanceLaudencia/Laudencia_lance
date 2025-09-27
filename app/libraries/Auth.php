<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth {
    public function __construct() {
        // Example: start session if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function check() {
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login page if user is not logged in
            redirect('login');
        }
    }

    public function login($user_id) {
        $_SESSION['user_id'] = $user_id;
    }

    public function logout() {
        session_destroy();
    }
}
