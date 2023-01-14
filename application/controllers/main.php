<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('user/home');
	}

	public function login()
	{
		$this->load->view('user/login');
	}

	public function signup()
	{
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
			echo "button not pressed";
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
				header('Location: http://localhost/NSSC/main/');
			}
			else
			{
				header('Location: http://localhost/NSSC/main/login?invalid');
			}
		}
		else
		{
			header('Location: http://localhost/NSSC/main/');
		}
    }

	public function logout()
    {
        $this->session->sess_destroy();
		header('Location: http://localhost/NSSC/main/');
    }

	public function profile()
	{
		$result['notes_count'] = $this->user->notes_count();
		$result['follower_count'] = $this->user->follower_count();
		$result['following_count'] = $this->user->following_count();
		$result['notes'] = $this->user->select_notes();
		$this->load->view('user/profile', $result);
	}

	public function add_notes()
	{
		$this->load->view('user/addnotes');
	}

	public function insert_notes()
	{
		if(isset($_POST['insert_notes']))
		{
			$this->user->insert_notes();
			redirect('profile');
		}
		else
		{
			echo "button not pressed";
		}
	}
	
}
