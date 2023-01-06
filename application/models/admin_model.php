<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {
    public function select_users()
    {
        $sql = $this->db->get('users');
        $result = $sql->result_array();
        return $result;
    }

    public function select_notes()
    {
        $sql = $this->db->get('notes');
        $result = $sql->result_array();
        return $result;
    }

    public function select_courses()
    {
        $sql = $this->db->get('course');
        $result = $sql->result_array();
        return $result;
    }

    public function select_queries()
    {
        $sql = $this->db->get('queries');
        $result = $sql->result_array();
        return $result;
    }

}