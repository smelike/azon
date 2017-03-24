<?php


	class Back extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url_helper');
		}
		
		public function index()
		{
			
			$this->load->view('back_index');
		}
		
	
	}