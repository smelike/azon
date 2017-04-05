<?php


	class Back extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url_helper');
			$this->load->library('session');
			$this->is_login();
		}
		
		public function index()
		{

			$referer = $this->input->server('HTTP_REFERER');
			$url_param = parse_url($referer);
			$path = trim($url_param['path'], '/');

			$dir = "platform";
			$page_data = ['title' => '平台'];

			if (strpos($path, 'agent') === 0) {
				$dir = 'agent';
				$page_data = ['title' => '商家'];
			} else if (strpos($path, 'seller') === 0) {
				$dir = 'seller';
				$page_data = ['title' => '卖家'];
			}

			$this->load->vars('page_data', $page_data);
			$this->load->vars('user_data', $this->session->user_data);
			$this->load->view("/{$dir}/back_index");
		}
	}