<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {

    // Read or Select Functions

    public function select_users()
    {
        $query = "SELECT u.user_id, u.user_name, u.user_email, u.first_name, u.last_name, u.gender, ur.user_role FROM users u JOIN user_role ur ON u.user_type=ur.user_role_id";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function select_notes()
    {
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
        $this->db->where('course_id',$this->input->get('course_id'));
        $sql = $this->db->get('course');
        $result = $sql->result_array();
        return $result;
    }

    public function update_query_select()
    {
        
    }

    public function add_user_select()
    {
        $arr = ['user_name','user_email','first_name','last_name','user_password','gender','user_type'];
        return $arr;
    }

    public function add_course_select()
    {
        $arr = ['course_name'];
        return $arr;
    }

    // Add functions

    public function add_user()
    {
        $query = "INSERT INTO users (user_name,user_email,first_name,last_name,user_password,gender,user_type) VALUES ('{$this->input->post('user_name')}','{$this->input->post('user_email')}','{$this->input->post('first_name')}','{$this->input->post('last_name')}','{$this->input->post('user_password')}','{$this->input->post('gender')}',{$this->input->post('user_type')})";
        $this->db->query($query);
        header("Location: http://localhost/NSSC/index.php/admin");
    }

    public function add_course()
    {
        $query = "INSERT INTO course (course_name) VALUES ('{$this->input->post('course_name')}')";
        $this->db->query($query);
        header("Location: http://localhost/NSSC/index.php/admin/view_courses");
    }

    // Update functions

    public function update_user($user_id)
    {
        // email or username check query
        $check_query = "SELECT user_name, user_email FROM users WHERE (user_name = '{$this->input->post('user_name')}' OR user_email='{$this->input->post('user_email')}') AND NOT user_id=$user_id";
        $check_sql = $this->db->query($check_query);
        $check_result = $check_sql->result_array();
        if(empty($check_result)){
            // update record query
            $update_query = "UPDATE users SET user_name='{$this->input->post('user_name')}', user_email='{$this->input->post('user_email')}', first_name='{$this->input->post('first_name')}', last_name='{$this->input->post('last_name')}', gender='{$this->input->post('gender')}', user_type='{$this->input->post('user_type')}' WHERE user_id={$user_id}";
            $this->db->query($update_query);
            header('Location: http://localhost/NSSC/index.php/admin');
        }
        else{
            // printing an error message missing
            header('Location: http://localhost/NSSC/index.php/admin/update?user_id='.$user_id);
        }
    }

    public function update_course($course_id)
    {
        $query = "UPDATE course SET course_name='{$this->input->post('course_name')}' WHERE course_id=$course_id";
        $this->db->query($query);
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
        return;
    }

    public function delete_course($course_id)
    {
        $delete_query = "DELETE FROM course WHERE course_id = $course_id";
        $this->db->query($delete_query);
        return;
    }

    public function delete_query()
    {

    }
}