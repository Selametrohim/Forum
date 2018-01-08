<?php
class Kategori_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
  }

  function get_kategories()
  {
    $select = $this->db->query('SELECT * FROM kategori');

    return $select->result_array();
  }

  function get_kategori($id)
  {
    $select = $this->db->query('SELECT * FROM kategori WHERE id = ?', [$id]);

    return $select->row_array();
  }

  function add_kategori($data)
  {
    $this->db->insert('kategori', $data);

    return $this->db->insert_id();
  }

  function edit_kategori($data, $id)
  {
    $this->db->update('kategori', $data, ['id' => $id]);

    return $this->db->affected_rows();
  }

  function delete_kategori($id)
  {
    $this->db->delete('kategori', ['id' => $id]);

    return $this->db->affected_rows();
  }
  
}