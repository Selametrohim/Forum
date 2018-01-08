<?php
class Thread_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_threads()
  {
    $select = $this->db->query('SELECT *, thread.id FROM thread JOIN user ON user.id = thread.user_id JOIN kategori ON kategori.id = thread.kategori_id');

    return $select->result_array();
  }

  function get_thread($id)
  {
    $select = $this->db->query('SELECT *, thread.id FROM thread JOIN user ON user.id = thread.user_id JOIN kategori ON kategori.id = thread.kategori_id WHERE thread.id = ?', [$id]);

    return $select->row_array();
  }

  function get_thread_by_user($username)
  {
    $select = $this->db->query('SELECT *, thread.id FROM thread JOIN user ON user.id = thread.user_id JOIN kategori ON kategori.id = thread.kategori_id WHERE user.username = ?', [$username]);

    return $select->result_array();
  }

  function add_thread($data)
  {
    $this->db->insert('thread', $data);

    return $this->db->insert_id();
  }

  function edit_thread($data, $id)
  {
    $this->db->update('thread', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_thread($id)
  {
    $this->db->delete('thread', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}