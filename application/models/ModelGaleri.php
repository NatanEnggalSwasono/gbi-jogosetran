<?php

/**
 *
 */
class ModelGaleri extends CI_Model
{
  var $table = 'galeri';
  var $primaryKey = 'id';

  /*public function get($batas = NULL, $offset = NULL, $cari = NULL)
  {
    if ($batas != NULL) {
      $this->db->limit($batas, $offset);
    }
    if ($cari != NULL) {
      $this->db->or_like($cari);
    }
    $this->db->from('galeri');
    $query = $this->db->get();
    return $query->result();
  }
  public function jumlah_row($search)
  {
    $this->db->or_like($search);
    $query = $this->db->get('galeri');

    return $query->num_rows();
  }*/

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function getByPrimaryKey($id)
  {
    $this->db->where($this->primaryKey, $id);
    return $this->db->get($this->table)->row();
  }

  public function insert($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function insertGetId($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    $this->db->where($this->primaryKey, $id);
    return $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
    return $this->db->where($this->primaryKey, $id)->delete($this->table);
  }
}
