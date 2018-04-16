<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user_model');
    }
    
	public function index()
	{
		$this->load->view('login');
	}

	public function login_process(){
		$log = $this->user_model->login($_POST);
		if($log){
			redirect(site_url().'/content');
		}else{
			//give error
			$this->session->set_userdata(['error_login'=>'Login Error. Username dan password tidak sesuai!']);
			redirect(site_url().'/user');
		}
	}

	public function register(){
		$this->load->view('register');
	}
	public function register_process(){
		$reg =$this->user_model->register($_POST);
		if($reg===true){
			redirect(site_url().'/content');
		}else{
			//give error
			$this->session->set_userdata(['warning_reg'=>$reg]);
			redirect(site_url().'/user/register');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url().'/user');
	}
}
