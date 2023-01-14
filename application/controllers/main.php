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
		print_r($_POST);
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
				print_r($_SESSION);
			}
			else
			{
				// header('Location: http://localhost/NSSC/main/login?invalid');
			}
		}
		else
		{
			echo "button not pressed";
		}
    }

	public function logout()
    {
        $this->session->sess_destroy();
    }
	
}
