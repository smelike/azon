<?php


	class MY_Controller extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->CI =& get_instance();
			$this->load->model('Login_Model');
			$this->load->library('session');
			
			
			$this->auth_api();
		}
		
		public function auth_api()
		{
			$class = $this->CI->uri->segment(1);
			$method = $this->CI->uri->segment(2);
			$method = $method ? $method : 'index';
			
			$class = strtolower($class);
			$method = strtolower($method);
			$route = '/' . $class . '/' . $method;
	
			
			$user = $this->Login_Model->get_user($this->input->post('user_name'));
			
			if ($user) {
				$user_group = $this->Login_Model->get_usergroup($user->user_group_id);
				$access_url = $this->Login_Model->get_user_rule(trim($route), $user->type);
			}
		}
		
	}