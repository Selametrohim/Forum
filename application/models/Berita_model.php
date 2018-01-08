<?php
class Berita_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_beritas()
  {
    $select = $this->db->query('SELECT *, berita.id FROM berita JOIN user ON user.id = berita.user_id ORDER BY berita.tanggal DESC');

    return $select->result_array();
  }

  function get_berita($id)
  {
    $select = $this->db->query('SELECT *, berita.id FROM berita JOIN user ON user.id = berita.user_id WHERE berita.id = ?', [$id]);

    return $select->row_array();
  }

  function get_berita_by_user($username)
  {
    $select = $this->db->query('SELECT *, berita.id FROM berita JOIN user ON user.id = berita.user_id WHERE user.username = ? ORDER BY berita.tanggal DESC', [$username]);

    return $select->result_array();
  }

  function add_berita($data)
  {
    $this->db->insert('berita', $data);

    return $this->db->insert_id();
  }

  function edit_berita($data, $id)
  {
    $this->db->update('berita', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_berita($id)
  {
    $this->db->delete('berita', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}