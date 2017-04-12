<?php


	class MY_Controller extends CI_Controller
	{
		public $_row_count = 10;
		public function __construct()
		{
			parent::__construct();
			$this->CI =& get_instance();
			$this->load->model('Login_Model');
			$this->load->helper('url_helper');
			$this->load->library('session');
			$this->CI->load->model('Data_model');
			$uri = strtolower(uri_string());
			$arr_url = array("login/showcaptcha", "login/index");

			if ($uri AND !in_array($uri, $arr_url)) {
				$this->auth_api();
			}
			$this->company_id  = 6;
			$this->middler_com_id = 5;
		}

		/**
		 * @校验当前登录用户是否具有该接口权限
		 * @parama void
		 * @return boolean [true - 有权限，false - 无权限]
		 */
		public function auth_api()
		{

			$class = $this->CI->uri->segment(1);
			$method = $this->CI->uri->segment(2);
			$method = $method ? $method : 'index';

			$class = strtolower($class);
			$method = strtolower($method);
			$route = '/' . $class . '/' . $method;

			$user = $this->session->user_data;
			if ($user) {
				$user_group = $this->Login_Model->get_usergroup($user->user_group_id);
				$access_url = $this->Login_Model->get_user_rule(trim($route), $user->type);

				$auth_result = false;
				if ($user_group AND $user_group->rule AND $access_url) {
					$user_rule = explode(',', $user_group->rule);
					$auth_result = in_array($access_url->url, $user_rule);
				}
				return $auth_result;
			}
			return false;
		}

		public function is_login()
		{
			if (empty($this->session->user_data))
			{
				redirect(base_url('login/index'));exit;
			}
		}

		public function echo_json($status, $arr_data = array())
		{
			$arr_return = ['s' => $status ? 1 : 0, 'data' => $arr_data];
			echo json_encode($arr_return);
		}
		
		//查询公司的平台
		protected function query_middler_platform($company_id = '',$first = 0,$num = 0,$where = null)
		{
			$list = array();
			if($company_id)
			{
				$table = 't_com_platform a';
				$join = array(
					array('t_platform b','b.id = a.platform_id','left'),
					array('t_currency c','c.id = b.currency_id','left')
				);
				$where['a.company_id'] = $company_id;
				$where['a.status'] = $where['b.status'] = $where['c.status'] = 1;
				$fields = 'b.id,b.name,b.url,c.name as currency,c.code,c.rate,a.task_start,a.task_end,b.create_time';
				$order = 'b.id asc';
				$group = '';
				$list = $this->Data_model->getJoinData($table, $join, $where, $fields, $order, $group, $first, $num);
			}

			return $list;
		}
		
	}