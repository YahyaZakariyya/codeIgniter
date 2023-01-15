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
            redirect('admin/');    
        }
        else
        {
            redirect('admin/admin?invalid');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/');    
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
            $result['forms'] = $this->admin->update_user_select();
            $result['type'] = 'update_user';
            $result['id'] = $this->input->get('user_id');
        }elseif($this->input->get('course_id')!==NULL){
            $result['forms'] = $this->admin->update_course_select();
            $result['type'] = 'update_course';
            $result['id'] = $this->input->get('course_id');
        }
        $this->load->view('admin/update',$result);
    }

    // update_user data from view to model
    public function update_user($user_id)
    {
        if($this->admin->update_user($user_id)){
            redirect('admin/');
        }else{
            redirect('admin/update?user_id='.$user_id);
        }
    }

    // update_course data from view to model
    public function update_course($course_id)
    {
        $this->admin->update_course($course_id);
        redirect('admin/view_courses');
    }

    // add page view
    public function add()
    {
        if($this->input->get('user_id')!==NULL){
            $array['form'] = ['text'=>['first_name','last_name','user_name'],'email'=>['user_email'],'password'=>['user_password'],'form-select'=>['gender'=>[['value'=>'m','label'=>'male'],['value'=>'f','label'=>'female']],'user_type'=>$this->admin->select_user_type()]];
            $array['type'] = 'add_user';
        }elseif($this->input->get('course_id')!==NULL){
            $array['form'] = ['text'=>['course_name']];
            $array['type'] = 'add_course';
        }
        $this->load->view('admin/add',$array);
    }

    // add_user data form view to model
    public function add_user()
    {
        if($this->admin->add_user()){
            redirect('admin/');
        }else{
            redirect('admin/add?user_id&error=true');
        }
    }

    // add_course data form view to model
    public function add_course()
    {
        $this->admin->add_course();
        redirect('admin/view_courses');
    }

    // delete data
    public function delete()
    {
        if($this->input->get('user_id')!==NULL){
            $this->admin->delete_user($this->input->get('user_id'));
            redirect('admin');
        }elseif($this->input->get('notes_id')!==NULL){
            $this->admin->delete_notes($this->input->get('notes_id'));
            redirect('admin/view_notes');
        }elseif($this->input->get('course_id')!==NULL){
            $this->admin->delete_course($this->input->get('course_id'));
            redirect('view_courses');
        }elseif($this->input->get('id')!==NULL){
            $this->admin->delete_query($this->input->get('id'));
            redirect('view_queries');
        }
    }
}