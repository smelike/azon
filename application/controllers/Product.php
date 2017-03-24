<?php

class Product extends MY_Controller
{

    protected $_table = '';

    public function __construct()
    {
        parent::__construct();
		$this->load->model(array('ReadModel', 'UpdateModel'));
        //$this->CI = &get_instance();
    }

    public function list_data()
    {
        $offset = 0;
        $row_count = 20;
        return $this->ReadModel->paginate($this->_table, $offset, $row_count);
    }

    public function edit()
    {
        $post = $this->input->post();
        $this->UpdateModel->single_update($this->_table, array('id' => $post['id']), $post);
    }

    public function delete($id)
    {
        $this->UpdateModel->single_update($this->_table, array('id' => $id), array('status' => 1));
    }

}