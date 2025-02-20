<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

	public function __construct()
		{
			parent::__construct();

	    	/* Checking Condition if not logged in  */
			if (!$this->session->userdata('logged_in')) {
				# code...
				redirect(base_url('Auth/Login'));
			} 
			
	    // Start---- Code for changing last online status ////

	        $conEmail['conditions'] = array(
	            'id' => $this->session->userdata('id'),
	        ); 
	        $check=$this->Crud_model->getRows('users',$conEmail,'row');

	    
	       
	        if($check->last_online_at!=date('Y-m-d H:i:s')) {
	           
	            $data = array(
	                'last_online_at' => date('Y-m-d H:i:s'),
	            );

	            $u_row=$this->Crud_model->update('users',$data,$conEmail);
	        }
	      
	    // End---- Code for changing last online status ////

	}



	public function index()
	{
		$this->data['page_name']  = 'Settings';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
		// $this->render_template('pages/setting/setting', $this->data);
		$this->render_template('pages/setting/setting2', $this->data);
	}

	public function Profile()
	{
		$this->data['page_name']  = 'Profile';	
		$this->data['page_title'] = 'eNACH - '.$this->data['page_name'];
		$this->render_template('pages/profile/profile', $this->data);
	}


}
