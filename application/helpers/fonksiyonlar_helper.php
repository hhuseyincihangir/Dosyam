<?php 
  function replace_tr($metin)
  {
    $metin = trim($metin);
    $aranan = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
    $degistirilecek = array('C','c','G','g','i','I','O','o','S','s','U','u');
    $yeni_metin = str_replace($aranan,$degistirilecek,$metin);
    return $yeni_metin;
  }
?>