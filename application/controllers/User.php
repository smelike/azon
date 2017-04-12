<?php

	class User extends MY_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('User_Model');
			$this->is_login();
		}


		public function index()
		{

			$users = $this->paginate();

			foreach($users as &$user)
			{
				$user->deleteVisible = false;
				$user->reviseVisible = false;
			}
			$page_size = $this->input->post('size');
			$size = $page_size ? $page_size : 10;
			$total = $this->User_Model->user_count();

			$this->echo_json($users, compact('total', 'size', 'users'));
		}

		public function edit_user()
		{

			$update = $this->User_Model->update_uer();

			$this->echo_json($update);
		}

		public function add()
		{

			$add = $this->User_Model->add_user();

			echo $this->echo_json($add);
		}

		public function delete_user()
		{

			$delete = $this->User_Model->soft_delete();

			$this->echo_json($delete);
		}

		public function user_search()
		{
			$type = intval(post_param('type'));
			$keyword = request_param('keyword');

			$users = [];
			if ($keyword) {
				$users = $this->User_Model->search_user_by_similar_value($keyword);

				if ($type) {
					$search_result = $users;
					$users = [];
					foreach($search_result as $user) {
						if ($user->type == $type) {
							$users[] = $user;
						}
					}
				}
			} else if (empty($keyword) AND $type) {
				$users = $this->User_Model->search_user_by_type($type);
			}

			$total = count($users);

			$this->echo_json($users, compact('total', 'users'));
		}
		public function wallet_ballance()
		{
			$arr_data = ['s' => 0, 'data' => ['balance' => rand()]];
			
			echo json_encode($arr_data);
		}

		private function paginate()
		{
			$pageno = 1;
			$row_count = $this->_row_count;

			$total = $this->User_Model->user_count();
			$end = ceil($total / $row_count);

			$post = $this->input->post();

			if ($post)
			{
				$pageno = $post['current'];
				$row_count = $post['size'];
			}

			$pageno = ($pageno > $end) ? $end : $pageno;
			$offset = ($pageno - 1) * $row_count;

			return $this->User_Model->user_query($offset, $row_count);
		}

		public function test()
		{
			$arr_value = ['number' => 1, 'number2' => 2,3,4,5,6];

			$slice = array_slice($arr_value, 0, 1);
			array_shift($arr_value);
			var_dump(each($slice));
			var_dump($slice);

			var_dump($arr_value);
		}
	}