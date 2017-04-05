<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1
 * Time: 9:50
 */
// 指定允许其他域名访问
header('Access-Control-Allow-Origin:*');

// 响应类型
header('Access-Control-Allow-Methods:GET,POST,PUT');
header('Access-Control-Allow-Headers:x-requested-with,content-type');

class Test extends CI_Controller
{
    private $_row_count = 10;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
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
        $arr_data = [
            'total' => $this->User_Model->user_count(),
            'size' => $size,
            'users' => $users
        ];

        $this->echo_json($users, $arr_data);
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

    public function echo_json($status , $arr_data = array('success/failed'))
    {
        $arr_return = array(
            's' => empty($status) ? 0 : 1,
            'data' => $arr_data
        );

        echo json_encode($arr_return);
    }

}