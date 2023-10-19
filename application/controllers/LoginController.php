<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        $this->load->model('LoginModel', 'login_m');
     }
	public function index()
	{   
        if(isset($_SESSION['role'])){
            redirect('main-view');
        }
        $data['script'] = 'login';
        _load_view($data,'LoginView');
	}

    public function userLogin(){
       $post = $this->input->post(); 

       if(isset($post)){
        $result =  $this->login_m->getUserByUsername($post['username']);

        if(!empty($result)){
            if (password_verify($post['password'], $result->password)) {
                $data['resultfetch'] = 1;

                $_SESSION['GeneratedId']  = $result->GeneratedId;
                $_SESSION['role']  =  $result->role;
            } else {
                $data['resultfetch'] = 0;
            };
        };
        echo  json_encode($data);
       }
    }

    public function mainView(){

        if(!isset($_SESSION['role']) || $_SESSION['role'] >= 3){
            
            redirect('default');
        }

        if($_SESSION['role'] == 0){
            $data['script'] = 'admin'; 
            _load_view($data,'AdminModule/AdminView');
        }
        if($_SESSION['role'] == 1){
            
            $data['script'] = 'teacher'; 
            _load_view($data,'TeacherModule/TeacherView');
        }
        if($_SESSION['role'] == 2){
            $data['script'] = 'student'; 
            _load_view($data,'StudentModule/StudentView');
        }

    }
    
}
