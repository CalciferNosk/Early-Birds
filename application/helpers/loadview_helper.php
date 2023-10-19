<?php 

if(!function_exists('_load_view')){
    function _load_view($script,$directory){
        // var_dump($directory);die;
        $CI =& get_instance();
        $CI->load->view('layout/header');
		$CI->load->view($directory);
        $CI->load->view('layout/footer',$script);
        return ;
    }
}

if(!function_exists('_getRoleName')){
    function _getRoleName($role_id){
       if($role_id = 0) {
        return 'Admin';
       }
       if($role_id = 1) {
        return 'Teacher';
       }
       if($role_id = 2) {
        return 'Student';
       }
    }
}

   
?>