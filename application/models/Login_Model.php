<?php


	class Login_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}


		public function get_user_by_name($user_name)
		{
			$where = ['username' => $user_name];
			$query = $this->db->get_where('t_user', $where);
	
			return $query->row();
		}

		public function get_user_by_id($user_id)
		{
			$where = ['id' => $user_id, 'status' => 1];
			$query = $this->db->get_where('t_user', $where);

			return $query->row();
		}

		public function get_usergroup($user_group_id)
		{
			
			$where = array('id' => $user_group_id);
			$query = $this->db->get_where('t_user_group', $where);	
			
			return $query->row();
		}
		
		public function get_user_rule($url, $user_type)
		{
			$where = ['url' =>  $url, 'type' => $user_type, 'status' => 1];
			$query = $this->db->get_where('t_api', $where);
			
			return $query->row();
		}
		
		
	}