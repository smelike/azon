<?php

	class Mainseller extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();

		
		}
		
		public function index()
		{
			print_r($this->query_middler_platform(1));

		}

		
	}