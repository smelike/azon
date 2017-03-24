<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/24
 * Time: 11:44
 */
class Plat_user_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_count($table = '')
    {
        return $this->db->count_all_results('t_user');
    }

    public function get_users($slug = FALSE)
    {
        if ($slug === false) {
            $query = $this->db->get('t_user');
            return $query->result_array();
        }

        $query = $this->db->get_where('t_user', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_user()
    {

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => '',
            'text' => $this->input->post('text')
        );

        return $this->db->insert('t_user', $data);
    }

}