<?php

	class Login extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			
			$this->load->library('captcha');
		
		}
		
		public function index()
		{
			$post = $this->input->post();
			
			if ($post) {
				$this->verify_captcha($post['captcha']);
				$user = $this->Login_Model->get_user($post['user_name']);
				redirect(site_url('/login/index'));
			} else {
				$this->load->vars('title', '卖家登陆页');
				$this->load->helper('url_helper');
				$this->load->view('login/index');
			}
		}
		
		// 校验验证码是否正确
		private function verify_captcha($code)
		{
			if ($this->session->userdata('cdoe') == $code)
			{
				echo 'well done.';
			}
		}
		// 获取验证码
		public function showCaptcha()
		{
			echo $this->captcha->make();
		}
		
	}