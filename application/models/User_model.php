<?php
class User_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function auth_user($username)
  {
    $select = $this->db->query('SELECT * FROM user WHERE username = ? OR email = ?', [$username, $username]);

    return $select->row_array();
  }

  function get_user($username)
  {
    $select = $this->db->query('SELECT * FROM user WHERE username = ?', [$username]);

    return $select->row_array();
  }

  function add_user($data)
  {
    $this->db->insert('user', $data);

    return $this->db->insert_id();
  }

  function edit_user($data, $id)
  {
    $this->db->update('user', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_user($id)
  {
    $this->db->delete('user', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}