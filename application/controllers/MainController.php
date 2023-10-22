<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    
     public function __construct()
     {
         parent::__construct();
        //  $this->load->model('LoginModel', 'login_m');
         $this->load->model('MainModel','main_m');
         $this->user = $_SESSION['GeneratedId'];
     }
	public function commentPost()
	{
		if($_POST['comment_to'] == 'post'){
            $data = [
                'newsfeed_id' => $_POST['newsfeed_id'],
                'comment'     => $_POST['comment_text'],
                'CreatedBy'   => $this->user 
            ];
        }

        if($_POST['comment_to'] == 'parent_comment'){
            $data = [
                'parent_comment_id' => $_POST['id'],
                'comment'     => $_POST['comment_text'],
                'CreatedBy'   => $this->user 
            ];
        }

        if(isset($data)){
           $result['result'] =  $this->main_m->storeComment($data);
        }
        else{
            $result['result'] = 0;
        }
        echo json_encode($result);
	}
}
