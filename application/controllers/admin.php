<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    // Simple view Controllers

    // users page view
    public function index()
	{
        if(isset($_SESSION['user_name']))
        {
            $result['table'] = $this->admin->select_users();
            $result['heading']='USERS';
            $this->load->view('admin/index',$result);
        }
        else
        {
            $this->load->view('admin/login');
        }
	}

    public function login()
    {
        $result = $this->admin->validate_login();
        if(!empty($result))
        {
            $this->load->library('session');
            foreach($result[0] as $key => $value)
            {
                $this->session->set_userdata($key,$value);
            }
            header('Location: '.base_url());    
        }
        else
        {
            header('Location: '.base_url('admin?invalid'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('Location: '.base_url());    
    }

    // notes page view
    public function view_notes()
    {
        $result['table'] = $this->admin->select_notes();
        $result['heading']='NOTES';
		$this->load->view('admin/index',$result);
    }

    // queries page view
    public function view_queries()
    {
        $result['table'] = $this->admin->select_queries();
        $result['heading']='QUERIES';
		$this->load->view('admin/index',$result);
    }

    // courses page view
    public function view_courses()
    {
        $result['table'] = $this->admin->select_courses();
        $result['heading']='COURSES';
		$this->load->view('admin/index',$result);
    }

    // update page view
    public function update()
    {
        if($this->input->get('user_id')!==NULL){
            $result['form'] = $this->admin->update_user_select();
            $result['type'] = 'update_user';
            $result['id'] = $this->input->get('user_id');
        }elseif($this->input->get('course_id')!==NULL){
            $result['form'] = $this->admin->update_course_select();
            $result['type'] = 'update_course';
            $result['id'] = $this->input->get('course_id');
        }
        $this->load->view('admin/update',$result);
    }

    // update_user data from view to model
    public function update_user($user_id)
    {
        $this->admin->update_user($user_id);
    }

    // update_course data from view to model
    public function update_course($course_id)
    {
        $this->admin->update_course($course_id);
    }

    // add page view
    public function add()
    {
        if($this->input->get('user_id')!==NULL){
            $array['form'] = ['user_name','user_email','first_name','last_name','user_password','gender','user_type'];
            $array['type'] = 'add_user';
        }elseif($this->input->get('course_id')!==NULL){
            $array['form'] = ['course_name'];
            $array['type'] = 'add_course';
        }
        $this->load->view('admin/add',$array);
    }

    // add_user data form view to model
    public function add_user()
    {
        $this->admin->add_user();
    }

    // add_course data form view to model
    public function add_course()
    {
        $this->admin->add_course();
    }

    // delete data
    public function delete()
    {
        if($this->input->get('user_id')!==NULL){
            $this->admin->delete_user($this->input->get('user_id'));
            header("Location: ".base_url());
        }elseif($this->input->get('notes_id')!==NULL){
            $this->admin->delete_notes($this->input->get('notes_id'));
            header("Location: ".base_url('view_notes'));
        }elseif($this->input->get('course_id')!==NULL){
            $this->admin->delete_course($this->input->get('course_id'));
            header("Location: ".base_url('view_courses'));
        }elseif($this->input->get('id')!==NULL){
            $this->admin->delete_query($this->input->get('id'));
            header("Location: ".base_url('view_queries'));
        }
    }
}