<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel', 'login_m');
        $this->load->model('MainModel', 'main_m');
    }
    public function registerUser()  
    {
    $user_count = $this->main_m->checkuser($_POST)->user_count;
    if($user_count == 0){
        $generate= date('ymdgs');
    $username = strtolower(substr($_POST['fname'], 0, 1).$_POST['lname']);
       $data_user = [
        'GeneratedId'=> $generate,
        'username'   =>   $username,
        'password'   => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'role'       => 2,
        'email'      => $_POST['email']   
       ];


       $data_info = [
        'UserGeneratedId'=>$generate,
        'fname' =>  $_POST['fname'],
        'mname' => isset($_POST['mname']) ? $_POST['mname'] : '_',
        'lname' => $_POST['lname']
       ];
       $data_control= [
        'UserId' => $generate
       ];

      $result =  $this->main_m->addUser($data_control,$data_info,$data_user);
      $body = _registrationSpiel($_POST['password'],$username);
      $resul['send-sms'] = _sendPhpMailer($_POST['email'],'Early Birds Registration',null,$body);
    }
    else{
        $result['error'] = 100;
        // $resul['send-sms'] = 0;
    }
   
      echo json_encode($result);
    }

   
}
