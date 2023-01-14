<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model {
    
    public function login()
    {
        $query = "SELECT u.user_id, u.user_name, ut.user_type FROM users u JOIN user_type ut ON u.user_type=ut.user_type_id WHERE (u.user_name='{$this->input->post('user_name')}' OR u.user_email='{$this->input->post('user_name')}') AND u.user_password='{$this->input->post('user_password')}' AND ut.user_type='user'";
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
        $check_query = "SELECT user_name, user_email FROM users WHERE user_name='{$this->input->post('user_name')}' OR user_email='{$this->input->post('user_email')}'";
        $check_sql = $this->db->query($check_query);
        $check_result = $check_sql->result_array();
        if(empty($check_result)){
            $query = "INSERT INTO users (user_name,user_email,first_name,last_name,user_password,gender) VALUES ('{$this->input->post('user_name')}','{$this->input->post('user_email')}','{$this->input->post('first_name')}','{$this->input->post('last_name')}','{$this->input->post('user_password')}','{$this->input->post('gender')}')";
            $this->db->query($query);
            echo "Data inserted";
            // header('Location: '.base_url());
        }else{
            echo "Already exists";
            // header("Location: ".base_url('add?user_id&error=true'));
        }
    }

}