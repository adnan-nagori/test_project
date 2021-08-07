<?php  defined('BASEPATH') OR exit('No direct script access allowed');

function check_auth() {
    $CI = get_instance();
  	if($CI->session->userdata('session_admin_user_data')) {
        return true;
    } else {
      return false;
    }
}

function front_user_check(){
    $CI = get_instance();
  	if($CI->session->userdata('session_frontuser_data')) {
        return true;
    } else {
      return false;
    }
}