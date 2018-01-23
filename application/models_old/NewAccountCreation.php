<?php
class NewAccountCreation extends CI_Model {
    
    function __construct() {
        $this->userTbl = 'new_account_creation';
    }

    /*
     * get rows from the new_account_creation table
     */

    // function getRows($params = array()){
        
    //     $result = $this->db->get($this->userTbl)->result();

    //     print_r($result);die;

    //     //return fetched data
    //     return $result;
    // }	
}
