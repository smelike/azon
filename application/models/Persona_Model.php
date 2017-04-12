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
        $this->db->select();
        $this->db->where('status <>', 3);
        $this->db->limit($row_count, $offset);

        $query = $this->db->get('t_user_group');
        return $query->result();
    }
    public function persona_count()
    {
        $this->db->where('status <>', 3);
        return $this->db->count_all_results('t_user_group');
    }

    public function update_persona() {

        $data = array(
            'name' => request_param('name'),
            'description' => request_param('description'),
            'type' => request_param('type'),
            'rule' => join(',', request_param('rule')),
            'status' => request_param('status')
        );

        $id = intval(request_param('id'));

        if ($id) {

            $this->db->where('id', $id);
            return $this->db->update('t_user_group', $data);
        }

        return false;
    }

    public function soft_delete()
    {
        $id = intval(request_param('id'));

        if ($id) {
            $this->db->where('user_group_id', $id);
            $query = $this->db->get('t_user');
            $users_in_group = $query->result();

            if (empty($users_in_group)) {
                $this->db->where('id', $id);
                return $this->db->update('t_user_group', array('status' => 3));
            }
        }

        return false;
    }

    public function add_persona()
    {
        $data = array(
            'name' => request_param('name'),
            'description' => request_param('description'),
            'create_man' => 0,
            'create_time' => time(),
            'rule' => join(',', request_param('rule')),
            'status' => request_param('status'),
            'company_id' => 0,
            'type' => request_param('type')
        );

        if ($data['name'] AND $data['description'] AND $data['rule']) {
            return $this->db->insert('t_user_group', $data);
        }
        return false;
    }
}