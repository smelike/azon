<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/1
 * Time: 14:25
 */
class Api_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function api_query()
    {
        // $query = $this->db->get_where('t_user_group', $offset, $row_count);
        $this->db->select();
        // status = 0，代表未启用
        $this->db->where('status <>', 0);
        $query = $this->db->get('t_api');

        return $query->result();
    }
}