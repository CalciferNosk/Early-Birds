<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainModel extends CI_Model
{

    public function __construct()
    {   
        // $this->max_concat = $this->db->query("SET SESSION group_concat_max_len = 18446744073709551615;");
        parent::__construct();
    }

   public function getRecord($generated_id, $role){
      $table_name = $role == 2 ? 'tbl_user_student' : 'tbl_user_teacher';
      $sql = "SELECT * FROM {$table_name} WHERE UserGeneratedId = '{$generated_id}'";
      $result = $this->db->query($sql);
      return $result->row();
   }
   public function getAllNewsFeed($generated_id){

    $sql = 'SELECT 
                *
            FROM
                file_sytem.tbl_newsfeed a
            LEFT JOIN 
                (SELECT GeneratedId,role  FROM tbl_user) as b on a.CreatedBy = b.GeneratedId order by id desc';
    $result = $this->db->query($sql);
    return $result->result_array();
   }

    public function getStudNameById($id)
    {
        $sql = "SELECT 
                group_concat(fname, ' ' ,lname) as fullname,
                fname

            FROM
                file_sytem.tbl_user_student
            WHERE 
            UserGeneratedId = '{$id}'";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function getTeachNameById($id)
    {
        $sql = "SELECT 
                    group_concat(fname, ' ' ,lname) as fullname,
                    fname
                FROM
                    file_sytem.tbl_user_teacher
                WHERE 
                UserGeneratedId = '{$id}'";
        $result = $this->db->query($sql);
        return $result->row();
    }

    public function getLikeTotal($id){
        $sql = "SELECT count(*) as `count` FROM file_sytem.tbl_newsfeed_like Where newsfeed_id = {$id} ";
        $result = $this->db->query($sql);
        return $result->row();

    }

    public function getUserLiked($userid,$postid){
        $sql = "SELECT count(*) as `count` FROM file_sytem.tbl_newsfeed_like Where CreatedBy = {$userid} AND  newsfeed_id = {$postid}";
        $result = $this->db->query($sql);
        return $result->row();
    }
    public function getAllCommentById($id){
        $sql = "SELECT 
                        a.*,
                        a.id as 'ID',
                        b.role
                FROM 
                    file_sytem.tbl_newsfeed_comments a
                 LEFT JOIN
	                file_sytem.tbl_user b on a.CreatedBy = b.GeneratedId
                Where 
                    a.newsfeed_id = {$id}  AND newsfeed_id  is not null";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getSubCommentById($id){
        $sql = "SELECT 
                    *
                FROM
                    file_sytem.tbl_newsfeed_comments a 
                LEFT JOIN
                    file_sytem.tbl_user b on a.CreatedBy = b.GeneratedId
                WHERE
                    a.parent_comment_id = {$id} order by a.id";
        
        $result = $this->db->query($sql);

        return $result->result_array();
    }
    public function insertPost($text_post,$filename = null){
        
        $data =[
            'Label' => $text_post,
            'CreatedBy' => $_SESSION['GeneratedId'],
            'img'       => $filename
        ];
       return  $this->db->insert('tbl_newsfeed',$data);
    }

    public function countComment($id){

        $sql = "SELECT 
       *
           FROM
        file_sytem.tbl_newsfeed_comments a
    WHERE 
        a.newsfeed_id = {$id}";

        $result = $this->db->query($sql)->result_array();
        // var_dump($result);die;
        $sub_count = 0;
        $p_count = 0;
        foreach($result as $count){
            $p_count ++;
            $sql = "SELECT 
            count(*) as `sub_count`
        FROM
            file_sytem.tbl_newsfeed_comments a
        WHERE 
            a.parent_comment_id = {$count['id']}";
    
            $sub_count += $this->db->query($sql)->row()->sub_count;
        }

        return $p_count + $sub_count;;
    }
    public function storeComment($data){
        return  $this->db->insert('tbl_newsfeed_comments',$data);
    }
    public function getDataControl($id){
        $sql = "SELECT * FROM file_sytem.tbl_data_control WHERE UserId = '{$id}'";
        $result = $this->db->query($sql);

        return $result->row();
    }
    public function getTimeRecordToday($group){
        
        $data_today = date('Y-m-d');
        $sql = "SELECT
                        *
                FROM
                (
                    SELECT 
                        GroupId,
                        UserId
                    FROM
                        file_sytem.tbl_group_access
                    WHERE
                        DeletedTag = 0 AND GroupId in({$group}) group by UserId
                ) as a 
                left JOIN 
                    (SELECT id,TimeIn,TimeOut,UserId FROM tbl_time_records WHERE DeletedTag = 0 AND TImeIn like '{$data_today}%') as b on a.UserId = b.UserId
                left join 
		            (SELECT role,GeneratedId from tbl_user) as c on c.GeneratedId = a.UserId
                order by a.UserId = {$_SESSION['GeneratedId']} desc
                    ";
  
        return $this->db->query($sql)->result_array();
    }

    public function getGroup($id){
       
        $sql = "SELECT group_concat(GroupId) as group_access FROM file_sytem.tbl_group_access WHERE UserId ='{$id}'";
    
        return $this->db->query($sql)->row();

    }
    public function addUser($data_control,$data_info,$data_user){

        $user = $this->db->insert('tbl_user',$data_user);
        if($user == 1){
            $info = $this->db->insert('tbl_user_student',$data_info);

            if($info == 1){
                $data['error'] = $this->db->insert('tbl_data_control',$data_control);
            }
            else{
                $data['error'] = 0;
            }
        }
        else{
            $data['error'] = 0;
        }

      return $data;
    }

    public function checkUser($post){
        $sql = "SELECT count(*) as user_count FROM file_sytem.tbl_user_student WHERE fname = '{$post['fname']}' AND lname = '{$post['lname']}'";
        return $this->db->query($sql)->row();
    }
    public function checkLoginStatus(){
        $data_today = date('Y-m-d');
        $sql = "SELECT 
                    *
                FROM
                    (SELECT GeneratedId FROM tbl_user) as a
                right join 
                    file_sytem.tbl_time_records b on a.GeneratedId = b.UserId
                WHERE b.UserId = '2310190106' AND b.TimeIn like '{$data_today}%'";
        return $this->db->query($sql)->row();
    }

    public function timeInUser(){
        $data = [
            'UserId'     => $_SESSION['GeneratedId'],
            'CreatedBy'  => $_SESSION['GeneratedId'],
            'TimeIn'     => date('Y-m-d h:i:s'),
            'CreatedDate'=>date('Y-m-d h:i:s')
        ];
        return  $this->db->insert('tbl_time_records',$data);
    }
    public function timeOutUser($id){
        $user_check = $this->db->query("SELECT UserId FROM file_sytem.tbl_time_records WHERE id = {$id}")->row()->UserId;
        if($user_check !=  $_SESSION['GeneratedId']) return false;
        $data = [
            'UpdatedBy'     => $_SESSION['GeneratedId'],
            'UpdatedDate'   => date('Y-m-d h:i:s'),
            'TimeOut'       => date('Y-m-d h:i:s')
        ];
              $this->db->where('id',$id);
      return  $this->db->update('tbl_time_records', $data);
    }
    public function getGroupName($group_id){
        $sql = "SELECT * FROM file_sytem.tbl_group Where id = {$group_id}";
    return $this->db->query($sql)->row();
    }
}
