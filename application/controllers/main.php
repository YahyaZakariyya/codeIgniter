<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('user/home');
	}

	public function login()
	{
		$this->load->helper('html');
		$this->load->view('user/login');
	}

	public function signup()
	{
		$this->load->helper('html');
		$this->load->view('user/signup');
	}

	public function signup_button()
	{
		if(isset($_POST['signup_button']))
		{
			$this->user->signup();
		}
		else
		{
			redirect('main');
		}
	}

	public function login_button()
    {
		if(isset($_POST['login_button']))
		{
			$result = $this->user->login();
			if(!empty($result))
			{
				$this->load->library('session');
				foreach($result[0] as $key => $value)
				{
					$this->session->set_userdata($key,$value);
				}
				redirect('main');
			}
			else
			{
				redirect('main/login?invalid');
			}
		}
		else
		{
			redirect('main/login');
		}
    }

	public function logout()
    {
        $this->session->sess_destroy();
		redirect('main');
	}

	public function profile()
	{
		if(isset($_SESSION['user_name'])){
			$result['count'] = $this->user->profile_data($_SESSION['user_id']);
			$result['notes'] = $this->user->select_notes($_SESSION['user_id']);
			$this->load->view('user/profile', $result);
		}else{
			redirect('main');
		}
	}

	public function view_profile($user_id)
	{
		if(!empty($this->user->check_user($user_id)))
		{
			$data = $this->user->check_user($user_id);
			$result['user_id'] = $data[0]['user_id'];
			$result['user_name'] = $data[0]['user_name'];
			$result['count'] = $this->user->profile_data($result['user_id']);
			$result['notes'] = $this->user->select_notes($result['user_id']);
			if(isset($_SESSION['user_name'])){
				$result['follow'] = $this->user->check_follow($user_id);			
			}else{
				$result['follow'] = false;
			}
			
			$this->load->view('user/userprofile', $result);
		}
		else
		{
			redirect('main');
		}
	}

	public function add_notes()
	{
		$result['options'] = $this->user->select_courses();
		$this->load->view('user/addnotes',$result);
	}

	public function insert_notes()
	{
		if(isset($_POST['insert_notes']))
		{
			$config['upload_path'] = './notes_files/';
			$config['allowed_types'] = 'pdf';
			$this->load->library('upload', $config);
			$temp_name = $_SESSION['user_name'].time().'.pdf';
			$_FILES['notes_file']['name'] = $temp_name;
			if (!$this->upload->do_upload('notes_file'))
			{
				$error = array('error' => $this->upload->display_errors());
				redirect('addnotes',$error);
			}
			else
			{
				$this->user->insert_notes($temp_name);
				redirect('profile');
			}		
		}
		else
		{
			redirect('main');
		}
	}

	public function update_notes()
	{
		$result['notes'] = $this->user->select_notes();
		$result['options'] = $this->user->select_courses();
		$this->load->view('user/addnotes',$result);
	}

	public function modify_notes($notes_id)
	{
		$this->user->update_notes($notes_id);
		redirect('main/profile');
	}

	public function search()
	{
		if($this->input->get('search')!==NULL AND $this->input->get('search')!=='')
		{
			$result['search'] = $this->user->search_notes();
			$this->load->view('user/search',$result);
		}
		else
		{
			redirect('main');
		}
	}

	public function follow($user_id)
	{
		if(isset($_SESSION['user_name'])){
			$this->user->follow_unfollow($user_id);
			redirect('main/view_profile/'.$user_id);
		}else{
			redirect('main/login');
		}
	}

	public function show_file($file_name)
	{
		$this->load->helper('file');
		if(file_exists('notes_files/'.$file_name)){
			$data = read_file('notes_files/'.$file_name);
			$this->output->set_content_type('application/pdf');
			$this->output->set_header('Content-Disposition: inline; filename="'.basename('notes_files/'.$file_name).'"');
			$this->output->set_output($data);
			exit;
		} else{
			// return some error message
		}
	}
	
	public function temp($file_name)
	{
		$result['file_name'] = $file_name;
		$this->load->view('user/temp',$result);
	}

}