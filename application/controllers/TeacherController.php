<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TeacherController extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        $this->load->model('TeacherModel', 'teach_m');
     }
	public function index()
	{   
       
	}

    
}
