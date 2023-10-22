<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentController extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        $this->load->model('StudentModel', 'stud');
     }
	public function getStudentData()
	{   
     
        $result = $this->stud->getRecord($_SESSION['GeneratedId']);
        $this->createSession($result);
        $result_newsfeed  =$this->stud->getAllNewsFeed($_SESSION['GeneratedId']);
       
        
        $newsfeed = [];
       foreach($result_newsfeed as $key => $res){
       
       array_push( $newsfeed ,[
            'CreatedBy'     => $res['role'] = 2 ? $this->getStudNameById($res['CreatedBy'])->fullname : $this->getStudNameById($res['CreatedBy'])->fullname ,
            'newsfeed'      =>  $res['Label'],
            'tag'           => $res['tag_id'] == null ? null: '',
            'like_total'    => $this->stud->getLikeTotal($res['id'])->count,
            'user_liked'    => $this->stud->getUserLiked($_SESSION['GeneratedId'],$res['id'])->count,
            'img'           => $res['img'],
            'id'            => $res['id'],
            'comments'      => $this->getComment( (int)$res['id'])
       ]);  
      
       }

       $data['newsfeed'] = $newsfeed ;
       $data['result'] = $result;
       echo json_encode($data);
    }
    private function getComment($id)
    {
      
        $result_comment = $this->stud->getAllCommentById($id);
        // var_dump($result_comment);die;
        if($result_comment == []) return null;
        $comments = [];
        foreach ($result_comment as $key => $com) {
            array_push($comments, [
                'id'          => (int)$com['ID'],
                'comment'     => $com['comment'],
                'CreatedBy'   => $com['role'] = 2 ? $this->getStudNameById($com['CreatedBy'])->fullname : $this->getStudNameById($com['CreatedBy'])->fullname,
                'fname'  => $com['role'] = 2 ? $this->getStudNameById($com['CreatedBy'])->fname : $this->getStudNameById($com['CreatedBy'])->fname,
                'sub_comment' => $this->getSubComment((int)$com['ID']) == [] ? null : $this->getSubComment((int)$com['ID'])

            ]);
        }
        return $comments;
    }
    private function getSubComment($id)
    {   
        
      
        $result_comment = $this->stud->getSubCommentById($id);
        // var_dump($result_comment);die;
        // if($result_comment == []) return null;
        $comments = [];
        foreach ($result_comment as $key => $com2) {
            array_push($comments, [
                'id'        => $com2['id'],
                'comment'   => $com2['sub_comment'],
                'CreatedBy' => $com2['role'] = '2' ? $this->getStudNameById($com2['GeneratedId'])->fullname : $this->getStudNameById($com2['GeneratedId'])->fullname,
               
            ]);
        }
    

        return $comments;
    }


    private function createSession($result)
    {

        $_SESSION['fname'] = $result->fname;
        $_SESSION['mname'] = $result->mname;
        $_SESSION['lname'] = $result-> lname;
        $_SESSION['address'] = $result-> address;
        $_SESSION['age'] = $result-> age;
        $_SESSION['fullname'] =$result-> lname.','. $result-> fname . ' ' . mb_substr($result-> mname,0,1) .'.';
    }

    public function getStudNameById($id){
            return  $this->stud->getStudNameById($id);
    }
    public function getTeachNameById($id){
        return  $this->stud->getTeachNameById($id);
    }

    public function viewComment(){
     
    }
    public function addPost(){

        // var_dump(($_FILES['file-post']));die;
        if($_FILES['file-post']['name'] != ''){
            $fileExtensionsAllowed = ['jpeg','jpg','png'];
            $uploadDirectory = "./assets/img/NewsFeedSrc/";
            $fileName = $_FILES['file-post']['name'];
            $fileSize = $_FILES['file-post']['size'];
            $fileTmpName  = $_FILES['file-post']['tmp_name'];
            $fileType = $_FILES['file-post']['type'];
            $pathfile = pathinfo($_FILES['file-post']['name']);
            $fileExtension = strtolower($pathfile["extension"]);
            $rand = $string = bin2hex(openssl_random_pseudo_bytes(10));
            $basename =  basename($_SESSION['GeneratedId'].'_'. $rand.'.'.$fileExtension);
            $uploadPath = $uploadDirectory . $basename; 
            if (! in_array($fileExtension,$fileExtensionsAllowed)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
              }
        
              if ($fileSize > 4000000) {
                $data['upload_msg'] = 1;
                $errors[] = "File exceeds maximum size (4MB)";
              }
              if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        
                if ($didUpload) {
                    $data['upload_msg'] = 0;
                    $data['upload'] = "The file " .  $basename. " has been uploaded";
                    $data['insert'] = $this->stud->insertPost($_POST['post_text'],$basename);
                } else {
                    $datap['upload_msg'] = 2;
                    $data['upload'] =  "An error occurred. Please contact the administrator.";
                }
              } else {
                $number_error = 0;
                foreach ($errors as $key => $error) {
                    $number_error ++;
                    $data['upload_msg'] = $number_error;
                    $data['upload'] = $error . "These are the errors" . "\n";
                }
              }
        }else{
            $data['upload-msg'] = 0;
            $data['upload'] = "";
            $data['insert'] = $this->stud->insertPost($_POST['post_text']);

        }

        echo json_encode($data);

    }
    
}
