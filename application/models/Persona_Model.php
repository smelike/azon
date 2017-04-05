<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/28
 * Time: 13:53
 */
class Persona_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function persona_query($offset, $row_count)
    {
        // $query = $this->db->get_where('t_user_group', $offset, $row_count);
        $this->db->select();
        $this->db->where('status <>', 3);
        $this->db->limit($row_count, $offset);
        $query = $this->db->get('t_user_group');

        return $query->result();
    }
    public function persona_count()
    {
        return $this->db->count_all_results('t_user_group');
    }

    public function update_persona() {

        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'type' => $this->input->post('type'),
            'rule' => $this->input->post('rule'),
            'status' => $this->input->post('status')
        );

        $id = intval($this->input->post('id'));

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('t_user_group', $data);
        }

        return false;
    }

    public function soft_delete()
    {
        $id = intval($this->input->post('id'));

        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update('t_user_group', array('status' => 3));
        }

        return false;
    }

    public function add_persona()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'real_name' => $this->input->post('realname'),
            'password' => md5($this->input->post('password')),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'qq' => $this->input->post('qq'),
            'type' => $this->input->post('type'),
            'user_group_id' => $this->input->post('user_role_id'),
            'status' => $this->input->post('status')
        );

        return $this->db->insert('t_user', $data);
    }
}