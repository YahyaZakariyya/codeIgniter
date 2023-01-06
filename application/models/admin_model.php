<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {

    // Read or Select Functions

    public function select_users()
    {
        $this->db->select('user_id,user_name,user_email,first_name,last_name,gender,user_type');
        $sql = $this->db->get('users');
        $result = $sql->result_array();
        return $result;
    }

    public function select_notes()
    {
        // $sql = $this->db->get('notes');
        // $result = $sql->result_array();
        // return $result;
        $query = "SELECT n.notes_id,n.notes_title,n.notes_description,c.course_name,u.user_name,n.notes_file,n.upload_date FROM notes n JOIN course c ON n.notes_id=c.course_id JOIN users u ON n.author=u.user_id";
        $sql = $this->db->query($query);
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

    public function update_user_select()
    {
        $this->db->select('user_name,user_email,first_name,last_name,gender,user_type');
        $this->db->where('user_id',$this->input->get('user_id'));
        $sql = $this->db->get('users');
        $result = $sql->result_array();
        return $result;
    }

    public function update_notes_select()
    {
        $this->db->select('notes_title,notes_description');
        $this->db->where('notes_id',$this->input->get('notes_id'));
        $sql = $this->db->get('notes');
        $result = $sql->result_array();
        return $result;
    }

    public function update_course_select()
    {
        $this->db->select('course_name');
        $sql = $this->db->get('course');
        $result = $sql->result_array();
        return $result;
    }

    public function update_query_select()
    {
        
    }

    // Update functions

    public function update_user($user_id)
    {
        // email or username check query
        $check_sql = "SELECT user_name, user_email FROM users WHERE (user_name = '{$this->input->post('user_name')}' OR user_email='{$this->input->post('user_email')}') AND NOT user_id=$user_id";
        $check_result = $this->db->query($check_sql);
        $chk_result = $check_result->result_array();
        if(empty($chk_result)){
            // update record query
            $update_sql = "UPDATE users SET user_name='{$this->input->post('user_name')}', user_email='{$this->input->post('user_email')}', first_name='{$this->input->post('first_name')}', last_name='{$this->input->post('last_name')}', gender='{$this->input->post('gender')}', user_type='{$this->input->post('user_type')}' WHERE user_id={$user_id}";
            $this->db->query($update_sql);
            header('Location: http://localhost/NSSC/index.php/admin');
        }
        else{
            // printing an error message missing
            header('Location: http://localhost/NSSC/index.php/admin/update?user_id='.$user_id);
        }
    }

    public function update_course($course_id)
    {
        $sql = "UPDATE course SET course_name='{$this->input->post('course_name')}' WHERE course_id=$course_id";
        $this->db->query($sql);
        header('Location: http://localhost/NSSC/index.php/admin/view_courses');
    }

    // Delete Functions

    public function delete_user($user_id)
    {
        // other delete queries remaining to  apply
        $delete_query = "DELETE FROM users WHERE user_id = $user_id";
        $this->db->query($delete_query);
        return;
    }

    public function delete_notes($notes_id)
    {
        // other delete queries remaining to apply
        $delete_query = "DELETE FROM notes WHERE notes_id = $notes_id";
        $this->db->query($delete_query);
    }

    public function delete_course()
    {

    }

    public function delete_query()
    {

    }
}