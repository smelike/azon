<?php

	class Wallet extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function ballance()
		{
			$arr_data = ['s' => 0, 'data' => ['balance' => rand()]];
			
			echo json_encode($arr_data);
		}
	
	}