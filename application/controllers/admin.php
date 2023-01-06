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
}