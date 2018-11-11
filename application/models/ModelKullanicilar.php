<?php 
  class ModelKullanicilar extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    public function selectRow($neyi=array())
    {
      return $this->db->where($neyi)->get("kullanicilar")->row();      
    }
    
    
    
  }
  



?>