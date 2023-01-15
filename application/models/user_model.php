<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {
    
    public function login()
    {
        $query = "CALL validate_login('{$this->input->post('user_name')}','{$this->input->post('user_password')}')";
        $sql = $this->db->query($query);
        if($sql->num_rows()>0){
            $result = $sql->result_array();
            return $result;
        }else{
            return Array();
        }
    }


    public function signup()
    {
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $user_password = $this->input->post('user_password');
        $gender = $this->input->post('gender');
        $check_query = "SELECT user_name, user_email FROM users WHERE user_name='{$user_name}' OR user_email='{$user_email}'";
        $check_sql = $this->db->query($check_query);
        $check_result = $check_sql->result_array();
        if(empty($check_result)){
            $query = "CALL add_user('{$user_name}','{$user_email}','{$first_name}','{$last_name}','{$user_password}','{$gender}')";
            $this->db->query($query);
            echo "Data inserted";
            // header('Location: '.base_url());
        }else{
            echo "Already exists";
            // header("Location: ".base_url('add?user_id&error=true'));
        }
    }

    public function insert_notes($notes_file)
    {
        $notes_title = $this->input->post('notes_title');
        $notes_description = $this->input->post('notes_description');
        $author = $_SESSION['user_id'];
        $notes_subject = $this->input->post('notes_subject');
        $date = date('Y-m-d');
        $query = "CALL insert_notes('{$notes_title}','{$notes_description}',{$author},'{$notes_file}','{$notes_subject}','{$date}')";
        print_r($query);
        $this->db->query($query);
    }

    public function notes_count()
    {
        $query = "SELECT COUNT(*) FROM notes WHERE author='{$_SESSION['user_id']}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result[0]['COUNT(*)'];
    }

    public function follower_count()
    {
        $query = "SELECT COUNT(*) FROM followers WHERE following='{$_SESSION['user_id']}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result[0]['COUNT(*)'];
    }

    public function following_count()
    {
        $query = "SELECT COUNT(*) FROM followers WHERE follower='{$_SESSION['user_id']}'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result[0]['COUNT(*)'];
    }

    public function select_notes()
    {
        if($this->input->get('notes_id')!==NULL){
            $query = "SELECT * FROM notes WHERE notes_id='{$this->input->get('notes_id')}'";
        }
        else{
            $query = "SELECT * FROM notes WHERE author='{$_SESSION['user_id']}'";
        }
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function update_notes($notes_id)
    {
        $notes_title = $this->input->post('notes_title');
        $notes_description = $this->input->post('notes_description');
        $notes_subject = $this->input->post('notes_subject');
        $query = "CALL update_notes('{$notes_title}','{$notes_description}','{$notes_subject}','{$notes_id}')";
        $this->db->query($query);
    }

    public function select_courses()
    {
        $sql = $this->db->get('courses');
        $result = $sql->result_array();
        return $result;
    }
}