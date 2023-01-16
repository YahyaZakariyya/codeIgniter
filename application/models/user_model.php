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

    public function select_notes()
    {
        $query = "SELECT * FROM notes WHERE author={$_SESSION['user_id']}";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }

    public function profile_data()
    {
        if($this->input->get('profile')!==NULL){
            $user_id = $this->input->get('profile');
        }else{
            $user_id = $_SESSION['user_id'];
        }
        $following = "SELECT COUNT(*) AS following FROM followers WHERE following={$user_id}";
        $followers = "SELECT COUNT(*) AS followers FROM followers WHERE follower={$user_id}";
        $notes = "SELECT COUNT(*) AS notes FROM notes WHERE author={$user_id}";
        $query1 = $this->db->query($following);
        $query2 = $this->db->query($followers);
        $query3 = $this->db->query($notes);
        $result1 = $query1->result_array();
        $result2 = $query2->result_array();
        $result3 = $query3->result_array();
        $count = Array($result1[0]['following'],$result2[0]['followers'],$result3[0]['notes']);
        return $count;
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

    public function search_notes()
    {
        $search = $this->input->get('search');
        $query = "SELECT n.notes_title, n.notes_description, n.author AS user_id, n.upload_date, u.user_name AS author, c.course_name AS notes_subject FROM notes n JOIN users u ON n.author=u.user_id JOIN courses c ON n.notes_subject=c.course_id WHERE n.notes_title LIKE '%{$search}%' OR n.notes_description LIKE '%{$search}%'";
        $sql = $this->db->query($query);
        $result = $sql->result_array();
        return $result;
    }
}