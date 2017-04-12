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

    public function api_query_by_type($type = 2)
    {
        $this->db->select();
        $this->db->where('type', $type);
        // status = 0，代表未启用
        $this->db->where('status <>', 0);
        $query = $this->db->get('t_api');

        return $query->result();
    }
}