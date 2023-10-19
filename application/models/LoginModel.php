<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{

    public function __construct()
    {   
        // $this->max_concat = $this->db->query("SET SESSION group_concat_max_len = 18446744073709551615;");
        parent::__construct();
    }

    public function getUserByUsername($username){
      
        $sql = "SELECT * FROM file_sytem.tbl_user WHERE username = '{$username}'";
        $result = $this->db->query($sql);
        return $result->row();
        
    }
    

    private function fetchSql($sql){
        $result = $this->db->query($sql);
       
       
    }
}
