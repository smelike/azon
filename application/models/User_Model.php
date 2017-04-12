<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28
 * Time: 11:07
 */
class User_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function user_query($offset, $row_count)
    {
        $type = request_param('type');
        $this->db->select();

        $this->db->where('status <>', 3);
        $type ? $this->db->where('type', $type) : '';
        $this->db->limit($row_count, $offset);
        $query = $this->db->get('t_user');

        return $query->result();
    }

    public function user_count()
    {
        $type = request_param('type');
        $this->db->where('status <>', 3);
        $type ? $this->db->where('type', $type) : '';
        $this->db->from('t_user');
        $total = $this->db->count_all_results();

        return $total;
    }

    public function update_uer()
    {

        $data = array(
            'username' => $this->input->post('username'),
            'real_name' => $this->input->post('real_name'),
            //'password' => md5($this->input->post('password')),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'qq' => intval($this->input->post('qq')),
            'type' => intval($this->input->post('type')),
            'user_group_id' => intval($this->input->post('user_group_id')),
            'status' => intval($this->input->post('status'))
        );

        $id = intval($this->input->post('id'));

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('t_user', $data);
        }
        return false;
    }

    public function search_user_by_equal_value($searchValue)
    {
        if ($searchValue) {

            $this->db->where('username', $searchValue);
            $this->db->or_where('real_name', $searchValue);
            $this->db->or_where('mobile', $searchValue);
            $query = $this->db->get('t_user');

            return $query->result();
        }

        return false;
    }

    public function search_user_by_similar_value($searchValue)
    {

        if ($searchValue) {

            $this->db->like('username', $searchValue, 'both');
            $this->db->or_like('real_name', $searchValue, 'both');
            $this->db->or_like('mobile', $searchValue, 'both');

            $query = $this->db->get('t_user');

            return $query->result();
        }
    }

    public function search_user_by_type($type)
    {
        if ($type) {

            $this->db->where('type', $type);
            $this->db->where('status <>', 3);

            $query = $this->db->get('t_user');

            return $query->result();
        }
    }

    public function soft_delete()
    {
        $id = intval(post_param('id'));

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('t_user', array('status' => 3));
        }

        return false;
    }

    public function add_user()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'real_name' => $this->input->post('real_name'),
            //'password' => md5($this->input->post('password')),
            'password' => $this->input->post('password'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'qq' => $this->input->post('qq'),
            'type' => $this->input->post('type'),
            'user_group_id' => $this->input->post('user_group_id'),
            'status' => $this->input->post('status')
        );

        return $this->db->insert('t_user', $data);
    }
}