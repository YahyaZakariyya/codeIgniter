<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    // Simple view Controllers

    // users page view
    public function index()
	{
        if(isset($_SESSION['user_name']))
        {
            echo 'session set';
            $result['table'] = $this->admin_model->select_users();
            $result['heading']='USERS';
            $this->load->view('admin/index',$result);
        }
        else
        {
            echo 'session not set';
            $this->load->view('admin/login');
        }
	}

    public function login()
    {
        $result = $this->admin_model->validate_login();
        if(!empty($result))
        {
            $this->load->library('session');
            foreach($result[0] as $key => $value)
            {
                $this->session->set_userdata($key,$value);
            }
            header('Location: http://localhost/NSSC/index.php/admin');    
        }
        else
        {
            header('Location: http://localhost/NSSC/index.php/admin?invalid');
        }
    }

    // notes page view
    public function view_notes()
    {
        $result['table'] = $this->admin_model->select_notes();
        $result['heading']='NOTES';
		$this->load->view('admin/index',$result);
    }

    // queries page view
    public function view_queries()
    {
        $result['table'] = $this->admin_model->select_queries();
        $result['heading']='QUERIES';
		$this->load->view('admin/index',$result);
    }

    // courses page view
    public function view_courses()
    {
        $result['table'] = $this->admin_model->select_courses();
        $result['heading']='COURSES';
		$this->load->view('admin/index',$result);
    }

    // update page view
    public function update()
    {
        if($this->input->get('user_id')!==NULL){
            $result['form'] = $this->admin_model->update_user_select();
            $result['type'] = 'update_user';
            $result['id'] = $this->input->get('user_id');
        }elseif($this->input->get('course_id')!==NULL){
            $result['form'] = $this->admin_model->update_course_select();
            $result['type'] = 'update_course';
            $result['id'] = $this->input->get('course_id');
        }
        $this->load->view('admin/update',$result);
    }

    // update_user data from view to model
    public function update_user($user_id)
    {
        $this->admin_model->update_user($user_id);
    }

    // update_course data from view to model
    public function update_course($course_id)
    {
        $this->admin_model->update_course($course_id);
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
        $this->admin_model->add_user();
    }

    // add_course data form view to model
    public function add_course()
    {
        $this->admin_model->add_course();
    }

    // delete data
    public function delete()
    {
        if($this->input->get('user_id')!==NULL){
            $result['form'] = $this->admin_model->delete_user($this->input->get('user_id'));
            header("Location: http://localhost/NSSC/index.php/admin");
        }elseif($this->input->get('notes_id')!==NULL){
            $result['form'] = $this->admin_model->delete_notes($this->input->get('notes_id'));
            header("Location: http://localhost/NSSC/index.php/admin/view_notes");
        }elseif($this->input->get('course_id')!==NULL){
            $result['form'] = $this->admin_model->delete_course($this->input->get('course_id'));
            header("Location: http://localhost/NSSC/index.php/admin/view_courses");
        }elseif($this->input->get('id')!==NULL){
            $result['form'] = $this->admin_model->delete_query($this->input->get('id'));
            header("Location: http://localhost/NSSC/index.php/admin/view_queries");
        }
    }
}