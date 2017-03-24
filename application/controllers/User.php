<?php


	class User extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Plat_user_model');
			$this->load->helper('url_helper');
		}

		public function index()
		{
			$data = [];

			$total = $this->Plat_user_model->get_count();
			$data['users'] = $this->Plat_user_model->get_users();

			echo "共有{$total}位用户";
		}

		public function add()
		{
			$this->Plat_user_model->set_user();
		}
		
		public function wallet_ballance()
		{
			$arr_data = ['s' => 0, 'data' => ['balance' => rand()]];
			
			echo json_encode($arr_data);
		}
	}