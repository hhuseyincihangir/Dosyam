<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Giriş | Dosyam</title>
	<?php 
		$this->load->view("includes/styles.php");
	?>
</head>
<body>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading">
						<div class="row">
							<h1 class="text-center" style="color:white">DOSYAM</h1>	
						</div>
				</div>
				<div class="panel-body">
					<form action="<?=base_url("Giris/girisYap")?>" method="POST">
						<div class="row">
							<?php 
							$error=$this->session->userdata("error"); 
							if(isset($error)){
							?>
								<div class="alert alert-danger alert-dismissible">
									<h6 class="text-center"><?=$error?></h6>
								</div>
							<?php }?>	
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="kadi" class="sr-only">Email address</label>
									<input type="text" id="kadi" name="kadi" class="form-control" placeholder="Kullanıcı Adı" required autofocus>			
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="inputPassword" class="sr-only">Şifre</label>
									<input type="password" id="inputPassword"  name="sifre" class="form-control" placeholder="Şifre" required>
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									&nbsp;<input id="remember" type="checkbox" value="beni_hatirla" disabled />
									<label for="remember" class="text-danger">Beni Hatırla( *Aktif Değildir. )</label>
								</div>	
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-md btn-primary btn-block" type="submit">Giriş Yap</button>	
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<footer class="footer">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<p class="text-center">
										Bu sayfa <strong>{elapsed_time}</strong> saniyede oluşturuldu.</p>
								</div>
								<div class="col-md-6">
									<p class="text-center">
									Copyright © 2018<br>
									<a href="mailto:hashusfb@gmail.com">hashusfb@gmail.com</a>
									</p>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
</div>
<?php 
	$this->load->view("includes/scripts.php");
?>
</body>
</html>