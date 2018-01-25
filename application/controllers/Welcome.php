<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
	{
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view("login/index");
	}

	public function authentication(){
		echo $username = $this->input->post('username');
		echo $password = $this->input->post('password'); 

		 //echo $username;die;

		$loginValue = $this->LoginAuthentication->loginCheck($username,$password);

		if($loginValue['resultLogin']):
			$this->LoginAuthentication->setSession($username);
			redirect("support");

		else:
			redirect("welcome");

		endif;	
	
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("welcome/index");
	}
}
