<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    private function checkUser($username){
    	$check = $this->db->select('*')
    					->from('user')
    					->where(['username'=>$username])
    					->get()
    					->result_array();
    	$count = count($check);
    	if($count==0){
    		return true;
    	}
    	return false;
    }
    public function register($data){
    	//cek username
    	$check = $this->checkUser($data['username']);
    	if($check){
	    	$user_arr = [
	    		"username"=>$data['username'],
	    		"password"=>md5($data['password']),
	    		"name"=>$data['name'],
	    		"email"=>$data['user_email'],
	    	];
	    	if($this->db->insert("user",$user_arr)){
				$session = array(
			        'username'  => $_POST['username'],
			        'user_id'=>$this->db->insert_id(),
			        'role'=>1
				);
				$this->session->set_userdata($session);
	    		return true;
	    	}
	    	return 2; //error save data
    	}else{
    		return 3; //user exist
    	}
    }

    public function login($data){
    	$login = $this->db->select('*')
    					->from('user')
    					->where(['username'=>$data['username'],
    						'password'=>md5($data['password'])
    						])
    					->get()
    					->result_array();
    	$count = count($login);
    	if($count==0 || $count>1){
    		return false;
    	}
    	foreach ($login as $key => $value) {
			$session = array(
		        'username'  => $_POST['username'],
		        'user_id'=>$value['user_id'],
		        'role'=>$value['role_id'],
			);
    	}
		$this->session->set_userdata($session);
    	return true;
    }
}
