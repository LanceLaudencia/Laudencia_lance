<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth
{
    protected $db;
    protected $session;

    public function __construct()
    {
        $lava = lava_instance();

        // Load required components
        $lava->call->database();
        $lava->call->library('session');

        // Assign for easier use
        $this->db = $lava->db;
        $this->session = $lava->session;
    }

    /**
     * Register a new user
     */
    public function register($username, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->table('users')->insert([
            'username'   => $username,
            'password'   => $hash,
            'role'       => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Login user
     */
    public function login($username, $password)
    {
        $user = $this->db->table('users')
                         ->where('username', $username)
                         ->get();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }

    /**
     * Check if user is logged in
     */
    public function is_logged_in()
    {
        return (bool) $this->session->userdata('logged_in');
    }

    /**
     * Check user role
     */
    public function has_role($role)
    {
        return $this->session->userdata('role') === $role;
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $this->session->unset_userdata([
            'user_id', 'username', 'role', 'logged_in'
        ]);
    }
}
