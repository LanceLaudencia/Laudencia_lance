<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: Studentmodel
 * 
 * Automatically generated via CLI.
 */
class Studentmodel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
     public function page($q, $records_per_page = null, $page = null) {
    if (is_null($page)) {
        return $this->db->table('students')->get_all();
    } else {
        $query = $this->db->table('students');

        if (!empty($q)) {
            $query->like('id', $q)
                  ->or_like('last_name', $q)
                  ->or_like('first_name', $q)
                  ->or_like('email', $q);
        }

        // Clone before pagination
        $countQuery = clone $query;

        $data['total_rows'] = $countQuery->select_count('*', 'count')
                                        ->get()['count'];

        $data['records'] = $query->pagination($records_per_page, $page)
                                ->get_all();

        return $data;
    }

        }
         public function get_user_by_id($id)
    {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get();
    }

    public function get_all_users()
    {
        return $this->db->table($this->table)->get_all();
    }
}