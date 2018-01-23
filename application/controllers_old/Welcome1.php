<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view("login/index");
	}

	public function authentication(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$loginValue = $this->LoginAuthentication->loginCheck($username,$password);
//print_r($loginValue); die;
		if($loginValue['resultLogin']):
			$this->LoginAuthentication->setSession($username,$password);
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
