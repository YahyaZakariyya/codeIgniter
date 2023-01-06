<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    public function index()
	{
        $this->load->model('admin_model');
        $result['table'] = $this->admin_model->select_users();
        $result['heading']='USERS';
		$this->load->view('admin/index',$result);
	}

    public function view_notes()
    {
        $this->load->model('admin_model');
        $result['table'] = $this->admin_model->select_notes();
        $result['heading']='NOTES';
		$this->load->view('admin/index',$result);
    }

    public function view_queries()
    {
        $this->load->model('admin_model');
        $result['table'] = $this->admin_model->select_queries();
        $result['heading']='QUERIES';
		$this->load->view('admin/index',$result);
    }

    public function view_courses()
    {
        $this->load->model('admin_model');
        $result['table'] = $this->admin_model->select_courses();
        $result['heading']='COURSES';
		$this->load->view('admin/index',$result);
    }

    public function update()
    {
        $this->load->model('admin_model');
        if($this->input->get('user_id')!==NULL){
            $result['form'] = $this->admin_model->update_user_select();
            $result['type'] = 'update_user';
            $result['id'] = $this->input->get('user_id');
        }elseif($this->input->get('notes_id')!==NULL){
            $result['form'] = $this->admin_model->update_notes_select();
            $result['type'] = 'update_notes';
            $result['id'] = $this->input->get('notes_id');
        }elseif($this->input->get('course_id')!==NULL){
            $result['form'] = $this->admin_model->update_course_select();
            $result['type'] = 'update_course';
            $result['id'] = $this->input->get('course_id');
        }elseif($this->input->get('id')!==NULL){
            $result['form'] = $this->admin_model->update_query_select();
            $result['type'] = 'update_query';
            $result['id'] = $this->input->get('query_id');
        }
        $this->load->view('admin/update',$result);
    }

    public function update_user($user_id)
    {
        $this->load->model('admin_model');
        $this->admin_model->update_user($user_id);
    }
}