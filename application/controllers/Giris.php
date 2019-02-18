<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Giris extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKullanicilar');
		$this->load->helper("cookie");
	}	
	public function index()
	{
    $kullaniciSession=$this->session->userdata("kullanici");
    if($kullaniciSession)
    {
      redirect(base_url("Dosyalar"));
    }
		$this->load->view('giris');
	}
	public function girisYap()
	{
		$kullaniciSession=$this->session->userdata("kullanici");
    if($kullaniciSession)
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
			$kadi = $this->input->post("kadi");
			$sifre = $this->input->post("sifre");
			$beniHatirla = $this->input->post("beniHatirla");
			$kullaniciVeri=array(
				"kullanici_adi"=>$kadi,
				"kullanici_sifre"=>md5($sifre)
			);
			$kullaniciSession=$this->ModelKullanicilar->selectRow($kullaniciVeri);
			if($kullaniciSession)
			{
				$kullaniciSession=array(
					"kullanici_adi"  => $kullaniciSession->kullanici_adi,
					"kullanici_izin" => $kullaniciSession->kullanici_izin,
					"kullanici_adsoyad"=>$kullaniciSession->kullanici_adsoyad
				);
				$this->session->set_userdata("kullanici",$kullaniciSession);
				if($beniHatirla=="on")
				{
					set_cookie("cookieKullanici",json_encode($kullaniciVeri),60*60*24);// 1 gün cookie süresi
				}
				else
				{
					delete_cookie("cookieKullanici");
				}
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
