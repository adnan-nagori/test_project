<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
		$this->um=$this->UserModel;
		$this->load->model('common_model');
        $this->com=$this->common_model;
	}

	public function index()
	{
		if($this->input->post('submit')=="submit"){

			if($this->input->post('email') == ''){
				$this->session->set_flashdata('Error',"Please Enter Email");
			}else{
				$userEmail = $this->input->post('email');
				$checkMail = $this->um->checkUserEmail($userEmail);
				if(!empty($checkMail)){
					$this->session->set_flashdata('Error',"Email already exist");
				}else{
					$validated_email = $this->_valid_email($userEmail);
					if(!$validated_email){
						$this->session->set_flashdata('Error',"Please Enter Valid Email");
					} else {
						$data = array(
							'user_email'         => $userEmail,
							'isVerify' 			 => 0,
							'createdDate'        => time()
						);
						$userId=$this->com->db_operation_add_data('test_subscribers',$data);
						if($userId != ''){
                        	$userEmail = $userEmail;   
				            
				            $email_log = $this->welcome_mail($userEmail);
                        	$this->session->set_flashdata('success',"Subscribe Successfully! Check Your Email to verify");
	                    }else{
	                        $this->session->set_flashdata('error_msg',"Error in subscribtion. Try Again!");
	                    }

					}
				}

			}


		
		}
		

		$this->load->view('home');
	}


	// check email id is valid or not
	private function _valid_email($str){
		if(function_exists('idn_to_ascii') && preg_match('#\A([^@]+)@(.+)\z#', $str, $matches))
		{
			$domain = defined('INTL_IDNA_VARIANT_UTS46')
			? idn_to_ascii($matches[2], 0, INTL_IDNA_VARIANT_UTS46)
			: idn_to_ascii($matches[2]);

			if ($domain !== FALSE)
			{
				$str = $matches[1].'@'.$domain;
			}
		}
		return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
	}


	// function to send mail
	public function welcome_mail($emailId=''){
			$this->load->helper('string');
			$token= random_string('alnum', 35);  
			$to_email = $emailId;
			$param['email'] =  $emailId;
			$param['token'] = 'https://domain.com/auth/action_verify_account_link/'.$to_email.'/_'.$token;
			
			$message = $this->load->view('email/email',$param,true);
			$subject="Verify Email";
			$from_email = "no-reply@domain.com"; 
			//Load email library 
	        $config['protocol']='smtp';
            $config['smtp_host']='ssl://smtp.gmail.com';
            $config['smtp_port']='465';
            $config['smtp_user']='no-reply@domain.com';
            $config['smtp_pass']='123456';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->load->library('email',$config);

            $this->email->set_newline("\r\n");
            $this->email->set_crlf( "\r\n" );
            $this->email->set_mailtype( "html" );
            // $this->email->charset( "utf-8" );
	        $this->email->set_wordwrap( true );
	        $this->email->to($to_email);
            $this->email->from($from_email,'Test Project');
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send()){
                $responseArray=array('is_sent'=>1,'message'=>NULL);
                // print_r($responseArray);exit('ok');
            } else {
                $error=$this->email->print_debugger(array('headers'),true);
                $responseArray=array('is_sent'=>0,'message'=>$error);
                  // print_r($responseArray);exit('error');
            }
            return $responseArray;
		}

}
