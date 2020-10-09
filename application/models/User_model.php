<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User_model extends CI_Model
{
  public function auth_check($data)
  {
    $query = $this->db->get_where('passenger', $data);
    if ($query)
    {
      return $query->row();
    }
    return false;

  }
  public function insert_user($data)
  {
    $insert = $this->db->insert('passenger', $data);
    if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
  }

  public function getPlanes()
  {
    $query = $this->db->query('SELECT airplane_id, type FROM airplane');
    return $query->result_array();
  }

  public function insert_flight($data)
  {
    $insert = $this->db->insert('flight', $data);
    if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
  }

  public function insert_plane($data)
  {
    $insert = $this->db->insert('airplane', $data);
    if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
  }
}

?>
