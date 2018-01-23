<?php

class ServiceRequestModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function get_account_creation()
    {
        $query = $this->db->get('new_account_creation');
        return $query->result();
    }

    public function getAllSalesManager()
    {
    	$user_id = $this->session->userdata['branch_id'];

	    $this->db->select('name');
	    $where = "active='1' AND branch_id='$user_id'";
	    $this->db->where($where);
	    $query = $this->db->get('sales_person');

	    if ($query->num_rows() > 0){
	        foreach($query->result() as $row) {
	            $data[] = $row;
	        }
	        return $data;
    	}
	}

    public function getVehicleType()
    {
        $query = $this->db->get('veh_type');

        if ($query->num_rows() > 0){
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function insertNewAccountCreation($data)
    {
        
        $this->db->insert('new_account_creation',$data);
        
    }

}