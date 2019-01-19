<?php
  function replace_tr($metin)
  {
    $metin = trim($metin);
    $aranan = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
    $degistirilecek = array('C','c','G','g','i','I','O','o','S','s','U','u');
    $yeni_metin = str_replace($aranan,$degistirilecek,$metin);
    return $yeni_metin;
  }
  function uzantiIsminiAl($dosya)
  {
    $uzanti = pathinfo($dosya);
    $uzanti = $uzanti["extension"];
    return $uzanti;
  }
  function uzantiLogosuFaSinifi($uzantiIsmi)
  {
    if($uzantiIsmi=="pdf")
    {
      return "fa fa-file-pdf-o";
    }
    else if($uzantiIsmi=="docx" or $uzantiIsmi=="doc")
    {
      return "fa fa-file-word-o";
    }
    else if($uzantiIsmi=="xlsx" or $uzantiIsmi=="xlsm" or $uzantiIsmi=="xls")
    {
      return "fa fa-file-excel-o";
    }
    else if($uzantiIsmi=="csv")
    {
      return "fa file-image-o";
    }
    else if($uzantiIsmi=="txt")
    {
      return "fa file-text-o";
    }
    else if($uzantiIsmi=="xps" or $uzantiIsmi=="pdf")
    {
      return "fa file-o";
    }
    else if($uzantiIsmi=="odt")
    {
      return "fa fa-file-text";
    }
    else if($uzantiIsmi=="ppt" or $uzantiIsmi=="pptx" or $uzantiIsmi=="potx")
    {
      return "fa fa-file-powerpoint-o";
    }
    else if($uzantiIsmi=="zip" or $uzantiIsmi=="rar")
    {
      return "fa fa-file-archive-o";
    }
    else
    {
      return "fa file";
    }
  }
  function resimUzantisi($uzanti)
  {
    if($uzanti=="jpeg" or $uzanti=="jpg" or $uzanti=="gif" or $uzanti=="png")
    {
      return true;
    }
    else{
      return false;
    }
  }
?>