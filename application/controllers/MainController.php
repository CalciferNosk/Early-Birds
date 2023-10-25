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
        // var_dump($_POST);die;
		if($_POST['comment_to'] == 'post'){
            $data = [
                'newsfeed_id' => $_POST['newsfeed_id'],
                'comment'     => $_POST['comment_text'],
                'CreatedBy'   => $this->user 
            ];
        }

        if($_POST['comment_to'] == 'sub_comment'){
            $data = [
                'parent_comment_id' => $_POST['comment_id'],
                'comment'     => $_POST['comment_text'],
                'CreatedBy'   => $this->user 
            ];
        }

        if(isset($data)){
           $result['result'] =  $this->main_m->storeComment($data);
           $result['last_id'] = $this->db->insert_id($result['result']);
           $result['fullname'] = $_SESSION['fname']. ' ' .$_SESSION['lname'];
        }
        else{
            $result['result'] = 0;
            $result['fullname'] = '';
            $result['last_id'] =0;
        }
        echo json_encode($result);
	}
    public function getTimeRecord(){
        $array = [];
        if($_SESSION['groups'] == []){

        }else{
            $result = $this->main_m->getTimeRecordToday($_SESSION['groups']);

            foreach($result as $key => $res){
                if($res['TimeOut'] == null){
                    if($res['TimeIn'] == null){
                        $color = ' background-image: linear-gradient(to right, #e1e1e163 , white);';
                        $status= $res['GeneratedId'] == $_SESSION['GeneratedId'] ? ' <button class="btn btn-success timein timein-user"  style="width:75px">Time-in</button>' : '<span style="color:gray">Inactive</span>';
                    }
                    else{
                        $color = 'background-image: linear-gradient(to right, #88f55859 , white)';
                        $status =  $res['GeneratedId'] == $_SESSION['GeneratedId']  ?'<button class="btn btn-info timein timeout-user" data-timeinid="'. $res['id'].'" style="width:75px">Time-out</button>' : '<span style="color:green">Active</span>';
                    }
                }else{
                    $color = 'background-image: linear-gradient(to right, #47aaf742 , white) ';
                    $status = '<span style="color:blue">Out</span>';
                }
                array_push($array,[
                    'UserId' => $res['UserId'],
                    'status'=> $status,
                    'color' => $color,
                    'group' => _getGroupName($res['GroupId']),
                    'role'=> $res['role'],
                    'fullname'=> _getFullName($res['role'],$res['GeneratedId'])->fullname ,
                ]);
            }
        }
       
        $data['result'] = $array;
        echo json_encode($data);
    }

    public function timeInUser(){

        $data['result'] = $this->main_m->timeInUser();

        echo json_encode($data);
    }
    public function timeOutUser(){

        $data['result'] = $this->main_m->timeOutUser($_POST['timein_id']);

        echo json_encode($data);
    }

   
}
