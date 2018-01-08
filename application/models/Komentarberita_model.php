<?php
class Komentarberita_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_komentars($id)
  {
    $select = $this->db->query('SELECT *, komentar_berita.id FROM komentar_berita JOIN user ON user.id = komentar_berita.user_id WHERE berita_id = ? ORDER BY tanggal DESC', [$id]);

    return $select->result_array();
  }

  function get_komentar($id)
  {
    $select = $this->db->query('SELECT *, komentar_berita.id FROM komentar_berita JOIN user ON user.id = komentar_berita.user_id WHERE komentar_berita.id = ?', [$id]);

    return $select->row_array();
  }

  function add_komentar($data)
  {
    $this->db->insert('komentar_berita', $data);

    return $this->db->insert_id();
  }

  function edit_komentar($data, $id)
  {
    $this->db->update('komentar_berita', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_komentar($id)
  {
    $this->db->delete('komentar_berita', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}