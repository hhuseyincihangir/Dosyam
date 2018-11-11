<?php 
class ModelDosyalar extends CI_Model
{
  
  public function __construct()
  {
    parent::__construct();
  }
  public function insert($veri=array())
  {
    return $this->db->insert("dosyalar",$veri);
  }
  public function getAll()
  {
    return $this->db->get("dosyalar")->result();
  }
  public function delete($neyi=array())
  {
    return $this->db->delete("dosyalar",$neyi);
  }
  
}



?>