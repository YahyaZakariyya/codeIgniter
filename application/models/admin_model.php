<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model {

    public function validate_login()
    {
        $query = "SELECT u.user_id, u.user_name FROM users u JOIN user_type ut ON u.user_type=ut.user_type_id WHERE (u.user_name='{$this->input->post('user_name')}' OR u.user_email='{$this->input->post('user_name')}') AND u.user_password='{$this->input->post('user_password')}' AND ut.user_type='admin'";
        $sql = $this->db->query($query);
        if($sql->num_rows()>0){
            $result = $sql->result_array();
            return $result;
        }else{
            return Array();
        }
    }
    // Read or Select Functions

    // Select all records functions

    public function select_users()
    {
        $sql = $this->db->get('select_users');
        $result = $sql->result_array();
        return $result;
    }

    public function select_notes()
    {
        $sql = $this->db->get('select_notes');
        $result = $sql->result_array();
        return $result;
    }

    public function select_courses()
    {
        $sql = $this->db->get('courses');
        $result = $sql->result_array();
        return $result;
    }

    public function select_user_type()
    {
        $sql = $this->db->get('user_type');
        $result = $sql->result_array();
        return $result;
    }

    public function select_queries()
    {
        $sql = $this->db->get('select_queries');
        $result = $sql->result_array();
        return $result;
    }

    // select specific record functions

    public function update_user_select()
    {
        $this->db->select('user_name,user_email,first_name,last_name,gender,user_type');
        $this->db->where('user_id',$this->input->get('user_id'));
        $sql = $this->db->get('users');
        $result = $sql->result_array();
        $result1['form'] = ['text'=>['first_name'=>$result[0]['first_name'], 'last_name'=>$result[0]['last_name'],'user_name'=>$result[0]['user_name']],'email'=>['user_email'=>$result[0]['user_email']],'form-select'=>['gender'=>[['value'=>'m','label'=>'male'],['value'=>'f','label'=>'female']],'user_type'=>$this->admin->select_user_type()]];
        $result1['gender']=$result[0]['gender'];
        $result1['user_type']=$result[0]['user_type'];
        // print_r($result1);
        // return $sql->result_array();
        return $result1;
    }

    public function update_course_select()
    {
        $this->db->select('course_name');
        $this->db->where('course_id',$this->input->get('course_id'));
        $sql = $this->db->get('courses');
        $result = $sql->result_array();
        $result1['form'] = ['text'=>['course_name'=>$result[0]['course_name']]];
        return $result1;
    }

    // Insert functions

    public function add_user()
    {
        $check_query = "SELECT user_name, user_email FROM users WHERE user_name='{$this->input->post('user_name')}' OR user_email='{$this->input->post('user_email')}'";
        $check_sql = $this->db->query($check_query);
        $check_result = $check_sql->result_array();
        if(empty($check_result)){
            print_r($_POST);
            $query = "INSERT INTO users (user_name,user_email,first_name,last_name,user_password,gender,user_type) VALUES ('{$this->input->post('user_name')}','{$this->input->post('user_email')}','{$this->input->post('first_name')}','{$this->input->post('last_name')}','{$this->input->post('user_password')}','{$this->input->post('gender')}',{$this->input->post('user_type')})";
            $this->db->query($query);
            header('Location: '.base_url());
        }else{
            header("Location: ".base_url('add?user_id&error=true'));
        }
    }

    public function add_course()
    {
        $query = "INSERT INTO courses (course_name) VALUES ('{$this->input->post('course_name')}')";
        $this->db->query($query);
        header("Location: ".base_url('view_courses'));
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
            header('Location: '.base_url());
        }
        else{
            // printing an error message missing
            header('Location: '.base_url('update?user_id='.$user_id));
        }
    }

    public function update_course($course_id)
    {
        $query = "UPDATE courses SET course_name='{$this->input->post('course_name')}' WHERE course_id=$course_id";
        echo $query;
        $this->db->query($query);
        header('Location: '.base_url('view_courses'));
    }

    // Delete Functions

    public function delete_user($user_id)
    {
        $delete_query = "DELETE FROM users WHERE user_id = $user_id";
        $this->db->query($delete_query);
    }

    public function delete_notes($notes_id)
    {
        $delete_query = "DELETE FROM notes WHERE notes_id={$notes_id}";
        $this->db->query($delete_query);
    }

    public function delete_course($course_id)
    {
        $delete_query = "DELETE FROM courses WHERE course_id={$course_id}";
        $this->db->query($delete_query);
    }

    public function delete_query()
    {

    }
}