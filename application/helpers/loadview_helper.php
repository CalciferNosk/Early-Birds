<?php 

if(!function_exists('_load_view')){
    function _load_view($script,$directory,$data = []){
        // var_dump($directory);die;
        $CI =& get_instance();
        $CI->load->view('layout/header');
        $CI->load->view('layout/footer',$script);
		$CI->load->view($directory,[]);
    
        
        return ;
    }
}

if(!function_exists('_getRoleName')){
    function _getRoleName($role_id){
       if($role_id == 0) {
        return 'Admin';
       }
       if($role_id == 1) {
        return 'Teacher';
       }
       if($role_id == 2) {
        return 'Student';
       }
    }
}



   
?>