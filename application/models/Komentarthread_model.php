<?php
class Komentarthread_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_komentars($id)
  {
    $select = $this->db->query('SELECT *, komentar_thread.id FROM komentar_thread JOIN user ON user.id = komentar_thread.user_id WHERE thread_id = ? ORDER BY tanggal DESC', [$id]);

    return $select->result_array();
  }

  function get_komentar($id)
  {
    $select = $this->db->query('SELECT *, komentar_thread.id FROM komentar_thread JOIN user ON user.id = komentar_thread.user_id WHERE komentar_thread.id = ?', [$id]);

    return $select->row_array();
  }

  function add_komentar($data)
  {
    $this->db->insert('komentar_thread', $data);

    return $this->db->insert_id();
  }

  function edit_komentar($data, $id)
  {
    $this->db->update('komentar_thread', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_komentar($id)
  {
    $this->db->delete('komentar_thread', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}