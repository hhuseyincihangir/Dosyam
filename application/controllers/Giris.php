<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giris extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKullanicilar');
	}	
	public function index()
	{
    $kullanici=$this->session->userdata("kullanici");
    if($kullanici)
    {
      redirect(base_url("Dosyalar"));
    }
		$this->load->view('giris');
	}
	public function girisYap()
	{
		$kullanici=$this->session->userdata("kullanici");
    if($kullanici)
    {
      redirect(base_url("Dosyalar"));
    }
		$this->load->library("form_validation");
		$this->form_validation->set_rules("kadi","Kullanıcı Adı","trim|required");
		$this->form_validation->set_rules("sifre","Şifre","trim|required|min_length[5]");

		$error_messages=array(
				"required"      => "<strong>{field}</strong> alanı boş bırakılamaz",
				"min_length"    => "Şifre 6 karekterden az olamaz."
		);
		$this->form_validation->set_message($error_messages);
		if($this->form_validation->run()==FALSE)
		{
				$this->session->set_flashdata('error',validation_errors());
				redirect(base_url("Giris"));
		}
		else
		{
			$kadi =$this->input->post("kadi");
			$sifre	= $this->input->post("sifre");

			$neyi=array(
				"kullanici_adi"=>$kadi,
				"kullanici_sifre"=>$sifre
			);
			$kullanici=$this->ModelKullanicilar->selectRow($neyi);
			if($kullanici)
			{
				$kullanici=array(
					"kullanici_adi"  => $kullanici->kullanici_adi,
					"kullanici_izin" => $kullanici->kullanici_izin,
					"kullanici_adsoyad"=>$kullanici->kullanici_adsoyad
				);
				$this->session->set_userdata("kullanici",$kullanici);
				redirect(base_url("Dosyalar"));
			}
			else
			{
				$this->session->set_flashdata('error',"Kullanıcı Adı veya Şifre Yanlış!");
				redirect(base_url("Giris"));
			}
		}		
	}
	public function cikisYap()
	{
		$this->session->unset_userdata("kullanici");
		redirect(base_url("Giris"));
	}
}
