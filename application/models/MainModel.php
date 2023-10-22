<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainModel extends CI_Model
{

    public function __construct()
    {   
        // $this->max_concat = $this->db->query("SET SESSION group_concat_max_len = 18446744073709551615;");
        parent::__construct();
    }

   public function getRecord($generated_id){
      $sql = "SELECT * FROM file_sytem.tbl_user_student WHERE UserGeneratedId = '{$generated_id}'";
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
                    group_concat(fname, ' ' ,fname) as fullname,
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
}
