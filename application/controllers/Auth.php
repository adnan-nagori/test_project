<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->um=$this->user_model;
		$this->load->model('common_model');
		$this->com=$this->common_model;
	}
	public function action_verify_account_link(){
		// uri segment count after project name/controller/method/parameter1/parameter2
		$emailId = $this->uri->segment(3);
		
		$param['email'] =  $emailId;
		
		// $this->load->view('success_msg');
		$this->load->view('email/email',$param);

	}
	



}
?>