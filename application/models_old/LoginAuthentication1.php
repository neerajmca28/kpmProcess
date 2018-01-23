<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAuthentication extends CI_Model {
	
	public function loginCheck($username, $password) {
		//echo $username;
		//echo $password; die;
		$CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
		$matrix_db->where("username", $username);

        
		$value = $matrix_db->get("marketvehicle_login");

		if(($value->num_rows() >= 1) && ($value->row()->password == $password)):

			$myObj = array(
				"resultLogin" => true,
				"username" => $username
			);
			return $myObj;

		else :

			$myObj = array(
				"resultLogin" => false,
				"username" => $username
			);
			return $myObj;

		endif;


	}

	// public function loginCheckTemp($username, $password) {

	// 	$this->db->where("user_name", $username);
	// 	$value = $this->db->get("login_user_temp");

	// 	if(($value->num_rows() >= 1) && ($value->row()->password == $password)):

	// 		$myObj = array(
	// 			"resultLogin" => true,
	// 			"username" => $username
	// 		);
	// 		return $myObj;

	// 	else :

	// 		$myObj = array(
	// 			"resultLogin" => false,
	// 			"username" => $username
	// 		);
	// 		return $myObj;

	// 	endif;


	// }

	public function setSession($username,$password){
 		$CI = &get_instance();
        $matrix_db=$this->matrix_db = $CI->load->database('matrix_db', TRUE);
		$matrix_db->where("username", $username);
		$value = $matrix_db->get("marketvehicle_login")->result();

		$newdata = array(

	        'user_name'			=> $value[0]->username,
		    'userId'			=> $value[0]->id,
		    'ParentId'			=> $value[0]->parent_user_id,
		    'BranchId'			=> $value[0]->branchid,
			'user_id_live'		=> $value[0]->user_id_live,
			 'group_id'			=> $value[0]->group_id,
			 'installerId'		=> $value[0]->installer_id
		);
		//echo '<pre>'; print_r($newdata); die;
		$this->session->set_userdata($newdata);

		return true;
	}

}
