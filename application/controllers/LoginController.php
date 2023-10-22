<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel', 'login_m');
        $this->load->model('MainModel','main_m');
    }
    public function index()
    {
        if (isset($_SESSION['role'])) {
            redirect('main-view');
        }
        $data['script'] = 'login';
        _load_view($data, 'LoginView');
    }

    public function userLogin()
    {
        $post = $this->input->post();

        if (isset($post)) {
            $result =  $this->login_m->getUserByUsername($post['username']);

            if (!empty($result)) {
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

    public function mainView()
    {

        if (!isset($_SESSION['role']) || $_SESSION['role'] >= 3) {
            redirect('');
        }


        $data['data'] = $this->mainViewData();
        // var_dump($data);die;
        if ($_SESSION['role'] == 0) {
            $data['script'] = 'admin';
            _load_view($data, 'AdminModule/AdminView');
        }

        if ($_SESSION['role'] == 1) {

            $data['script'] = 'teacher';
            _load_view($data, 'TeacherModule/TeacherView');
        }

        if ($_SESSION['role'] == 2) {
            $data['script'] = ['student','mainscript'];
            _load_view($data, 'StudentModule/StudentViewSample',$data);
        }

        // if($_SESSION['role'] == 2){
        //     $data['script'] = ['student','mainscript']; 
        //     _load_view($data,'StudentModule/StudentView');
        // }

    }

    private function mainViewData()
    {


        $result = $this->main_m->getRecord($_SESSION['GeneratedId']);
        $this->createSession($result);
        $result_newsfeed  = $this->main_m->getAllNewsFeed($_SESSION['GeneratedId']);


        $newsfeed = [];
        foreach ($result_newsfeed as $key => $res) {

            array_push($newsfeed, [
                'Created_id'  => $res['CreatedBy'], 
                'CreatedBy'     => $res['role'] = 2 ? $this->getStudNameById($res['CreatedBy'])->fullname : $this->getStudNameById($res['CreatedBy'])->fullname,
                'newsfeed'      =>  $res['Label'],
                'tag'           => $res['tag_id'] == null ? null : '',
                'like_total'    => (int)$this->main_m->getLikeTotal($res['id'])->count,
                'user_liked'    => $this->main_m->getUserLiked($_SESSION['GeneratedId'], $res['id'])->count,
                'img'           => $res['img'],
                'id'            => $res['id'],
                'CommentsCount' => $this->countComment((int)$res['id']),
                'comments'      => $this->getComment((int)$res['id'])
            ]);
        }

        // $data['newsfeed'] = $newsfeed;
        $data['result'] = $result;
        return $newsfeed;
    }

    private function createSession($result)
    {
        $_SESSION['fname'] = $result->fname;
        $_SESSION['mname'] = $result->mname;
        $_SESSION['lname'] = $result->lname;
        $_SESSION['address'] = $result->address;
        $_SESSION['age'] = $result->age;
        $_SESSION['fullname'] = $result->lname . ',' . $result->fname . ' ' . mb_substr($result->mname, 0, 1) . '.';
    }
    public function getStudNameById($id)
    {
        return  $this->main_m->getStudNameById($id);
    }
    public function getTeachNameById($id)
    {
        return  $this->main_m->getTeachNameById($id);
    }
    private function countComment($id){
        return $this->main_m->countComment($id);

    }
    private function getComment($id)
    {
      
        $result_comment = $this->main_m->getAllCommentById($id);
        // var_dump($result_comment);die;
        if($result_comment == []) return null;
        $comments = [];
        foreach ($result_comment as $key => $com) {
            array_push($comments, [
                'id'          => (int)$com['ID'],
                'comment'     => $com['comment'],
                'Created_id'  => $com['CreatedBy'],
                'CreatedBy'   => $com['role'] = 2 ? $this->getStudNameById($com['CreatedBy'])->fullname : $this->getStudNameById($com['CreatedBy'])->fullname,
                'fname'  => $com['role'] = 2 ? $this->getStudNameById($com['CreatedBy'])->fname : $this->getStudNameById($com['CreatedBy'])->fname,
                'sub_comment' => $this->getSubComment((int)$com['ID']) == [] ? null : $this->getSubComment((int)$com['ID'])

            ]);
        }
        return $comments;
    }
    private function getSubComment($id)
    {   
        
      
        $result_comment = $this->main_m->getSubCommentById($id);
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
    public function logout()
    {

        $this->session->sess_destroy();
        redirect('');
    }
}
