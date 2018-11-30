<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dosyalarım | DOSYAM</title>
  <?php 
    $this->load->view("includes/styles.php");
    $kullanici=$this->session->userdata("kullanici");
  ?>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">DOSYAM</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$kullanici["kullanici_adsoyad"]?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <!-- <li><a href="#">Ayarlar</a></li> -->
              <li role="separator" class="divider"></li>
              <li><a href="<?=base_url("Giris/cikisYap")?>">Çıkış Yap</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
  <?php
    if($kullanici["kullanici_izin"]==2)
    {?>
    <?php 
		$error=$this->session->userdata("error"); 
		if(isset($error)){
		?>
			<div class="alert alert-danger alert-dismissible">
				<h6 class="text-center"><?=$error?></h6>
			</div>
		<?php }?>
    <h3 class="text-center bg-primary">Dosya Yükle</h3>  
    <h6 class="text-center bg-success">Desteklenen Formatlar</h6>
    <div class="text-center">
      <?php 
        $formatlar=array("jpeg","jpg","gif","png","pdf","docx","doc","xlsx","xlsm","xls","xml","csv","txt","xps","odt","ppt","pptx","potx","zip","rar");
        for($i=0;$i<count($formatlar);$i++)
        {?>
          <span class="label label-warning"><?=$formatlar[$i]?></span>
        <?php 
        }?>
    </div><br>
    <div class="text-center bg-danger">Maksimum dosya boyutu 8 MB</div><br>
    <div class="row">
      <div class="col-md-12">
        <form action="<?=base_url("dosyalar/yukle")?>" class="dropzone" id="dropForm">
        </form>
      </div>
    </div>
    <hr>
    <?php 
    }
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Dosyalar</div>
          <div class="panel-body">
            <div class="table-responsive">            
              <table class="table table-bordered table-striped table-hover" >
                <thead>
                  <th>Önizleme</th>
                  <th>Dosya Boyutu</th>
                  <th>Dosya İsmi</th>
                  <th>Yükleyen</th>
                  <th>Son Düzenlenme Tarihi</th>
                  <th>İşlemler</th>
                </thead>
                <tbody>
                <?php 
                foreach ($dosyalar as $dosya) 
                {?>
                  <tr>
                    <td ><img class="" src="<?=base_url("uploads/$dosya->dosya_ismi")?>"></td>
                    <td ><?=round($dosya->dosya_boyut/1024,4)?> MB</td>
                    <td ><div><?=$dosya->dosya_ismi?></td>
                    <td ><?=$dosya->dosya_yukleyen?></td>
                    <td><?=$dosya->dosya_degisiklik_tarihi?></td>
                    <td >
                      <a type="button" class="btn btn-success btn-block" href="<?=base_url("dosyalar/indir/$dosya->dosya_ismi")?>">
                      <span class="glyphicon glyphicon-download-alt"></span></a>
                      <?php 
                      if($kullanici["kullanici_izin"]==2)
                      {?>
                      <a type="button" class="btn btn-danger btn-block" href="<?=base_url("dosyalar/sil/$dosya->dosya_id/$dosya->dosya_ismi")?>">
                      <span class="glyphicon glyphicon-trash"></span></a>
                      <?php 
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
  <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <p class="text-center">
              Bu sayfa <strong>{elapsed_time}</strong> saniyede oluşturuldu.</p>
          </div>
          <div class="col-md-6">
            <p class="text-center">
              Copyright © 2018<br>
              <a href="mailto:hhuseyincihangir@gmail.com">hhuseyincihangir@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  <?php 
	  $this->load->view("includes/scripts.php");
  ?>
  <script>
    $.get("Dosyalar",function(data){
      var veri=JSON.parse(data);
      console.log(veri);
    })
  </script>
</body>
</html>