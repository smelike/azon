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

			$this->load->helper('url_helper');
			$this->load->view('login/index');
		}

		public function login()
		{
			$arr_error = [];
			if (empty(post_param('user_name')) AND  empty(post_param('password'))) {
				$arr_error = ['login_error' => '用户与密码不能为空'];
			}

			if ($this->session->userdata('cdoe') == post_param('captcha'))
			{
				$arr_error['captcha'] = '验证码不正确';
			}

			$user = $this->Login_Model->get_user_by_name(post_param('user_name'));

			$arr_error['user_status'] = '不存在该用户';
			if ($user) {
					if ($user->status == 1) {
						$user ? $this->session->set_userdata('user_data', $user) : "";
						redirect(base_url('back'));exit;
					} else {
						$arr_error['user_status'] = '该账号已被禁用';
					}
			}
			$this->load->vars('arr_error', $arr_error);
			$this->load->view('login/index');
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

		public function logout()
		{
			$this->session->unset_userdata('user_data');
			redirect(base_url('login/index'));exit;
		}
		
	}