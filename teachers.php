<?php

	session_start();
	if(isset($_POST["exitButton"])){
		$_SESSION["guest"] = true;
		header("Location: index.php");
	}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Öğretmenlerimiz | Pena Akademi</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>

	<body>
		
		<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a href="index.php" id="branding">
					<img src="dummy/logo.png" style="width:278px;height:48px" alt="Site Title">
				</a> <!-- #branding -->

				<nav class="main-navigation">
					<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item"><a href="index.php">Ana Sayfa</a></li>
						<li class="menu-item"><a href="about.php">Hakkımızda</a></li>
						<li class="menu-item dropdown">
							<a href="index.php #lessons">Dersler</a>
							<ul class="dropdown-menu">
							  <li><a href="guitar.php">Gitar</a></li>
							  <li><a href="piano.php">Piyano</a></li>
							  <li><a href="singing.php">Şan</a></li>
							  <li><a href="bass.php">Bas</a></li>
							  <li><a href="drums.php">Bateri</a></li>
							</ul>
						  </li>
						<li class="menu-item current-menu-item"><a href="teachers.php">Öğretmenler</a></li>
						<li class="menu-item"><a href="contact.php">İletişim</a></li>
						<?php
						
						if($_SESSION["guest"]){
						echo '<li class="menu-item" id="sign-in"><a href="sign-in.php" class="button cut-corner">Giriş Yap</a></li>';
						}
						else{
							echo "<li class='menu-item dropdown' id='signed-in'>
							<a href=''>Hoş geldin " . $_SESSION['username'] . "!</a>
							<ul class='dropdown-menu' id=sign-in-dropdown>
							  <li><a href='profile.php'>Profilim</a></li>
							  <li><a href='my-lessons.php'>Derslerim</a></li>
							  <li><form method='POST' action=''>
							 	 <button type='submit' name='exitButton' class='button cut-corner'>Çıkış Yap</button>
							  </form></li>
							</ul>
							</li>";
						}
						?>
						
						</ul> <!-- .menu -->
				</nav> <!-- .main-navigation -->
				<div class="mobile-menu"></div>
			</div>
		</header> <!-- .site-header -->
			
			<main class="main-content">
				<div class="fullwidth-block gallery">
					<div class="container">
						<div class="content fullwidth">
							<h2 class="entry-title">Öğretmenlerimiz</h2>
							<div class="filter-links filterable-nav">
								<select class="mobile-filter">
									<option value="*">Hepsi</option>
									<option value=".guitar">Gitar</option>
									<option value=".drums">Bateri</option>
									<option value=".piano">Piyano</option>
									<option value=".singing">Şan</option>
									<option value=".bass">Bas</option>
								</select>
								<a href="#" class="current" data-filter="*">Hepsi</a>
								<a href="#" data-filter=".guitar">Gitar</a>
								<a href="#" data-filter=".piano">Piyano</a>
								<a href="#" data-filter=".bass">Bas</a>
								<a href="#" data-filter=".singing">Şan</a>
								<a href="#" data-filter=".drums">Bateri</a>
							</div>
							<div class="filterable-items">
								<div class="filterable-item guitar">
									<a href="guitar.php"><figure><img src="dummy/guitar-teacher1.jpg"></figure></a>
									<a href="guitar.php"><h3 id="teacher">Mehmet Yılmaz</h3></a>
									<span class="year">Rock</span><br>
									<span class="track">Başlangıç Seviyesi</span>
								</div>
								<div class="filterable-item guitar">
								<a href="guitar.php"><figure><img src="dummy/guitar-teacher2.jpg"></figure></a>
								<a href="guitar.php"><h3 id="teacher">Yiğit Elmalı</h3></a>
													<span class="year">Rock / Blues</span><br>
													<span class="track">Orta Seviye</span>
								</div>
								<div class="filterable-item guitar">
								<a href="guitar.php"><figure><img src="dummy/guitar-teacher3.jpg"></figure></a>
								<a href="guitar.php"><h3 id="teacher">Can Öztürk</h3></a>
													<span class="year">Metal / Hard Rock</span><br>
													<span class="track">İleri Seviye</span>
								</div>
								<div class="filterable-item piano">
								<a href="piano.php"><figure><img src="dummy/piano-teacher1.jpg"></figure></a>
								<a href="piano.php"><h3 id="teacher">Ezgi Arslan</h3></a>
													<span class="year">Pop</span><br>
													<span class="track">Başlangıç Seviyesi</span>
								</div>
								<div class="filterable-item piano">
								<a href="piano.php"><figure><img src="dummy/piano-teacher2.jpeg"></figure></a>
								<a href="piano.php"><h3 id="teacher">Deniz Özdemir</h3></a>
													<span class="year">Klasik</span><br>
													<span class="track">Orta Seviye</span>
								</div>
								<div class="filterable-item piano">
								<a href="piano.php"><figure><img src="dummy/piano-teacher3.jpg"></figure></a>
								<a href="piano.php"><h3 id="teacher">Hakan Erdem</h3></a>
													<span class="year">Caz</span><br>
													<span class="track">İleri Seviye</span>
								</div>
								<div class="filterable-item bass">
								<a href="bass.php"><figure><img src="dummy/bass-teacher1.png"></figure></a>
								<a href="bass.php"><h3 id="teacher">Tuna Aksoy</h3></a>
													<span class="year">Rock</span><br>
													<span class="track">Başlangıç Seviyesi</span>
								</div>
								<div class="filterable-item bass">
								<a href="bass.php"><figure><img src="dummy/bass-teacher2.jpg"></figure></a>
								<a href="bass.php"><h3 id="teacher">Oğuzhan Canpolat</h3></a>
													<span class="year">Klasik</span><br>
													<span class="track">Orta Seviye</span>
								</div>
								<div class="filterable-item bass">
								<a href="bass.php"><figure><img src="dummy/bass-teacher3.jpg"></figure></a>
								<a href="bass.php"><h3 id="teacher">Kaan Şener</h3></a>
													<span class="year">Caz</span><br>
													<span class="track">İleri Seviye</span>
								</div>
								<div class="filterable-item singing">
								<a href="singing.php"><figure><img src="dummy/vocal-teacher1.jpeg"></figure></a>
								<a href="singing.php"><h3 id="teacher">Ahmet Yalçın</h3></a>
													<span class="year">Pop Şan</span><br>
													<span class="track">Başlangıç Seviyesi</span>
								</div>
								<div class="filterable-item singing">
								<a href="singing.php"><figure><img src="dummy/vocal-teacher2.jpg"></figure></a>
								<a href="singing.php"><h3 id="teacher">Zeynep Soylu</h3></a>
													<span class="year">Klasik Şan</span><br>
													<span class="track">Orta Seviye</span>
								</div>
								<div class="filterable-item singing">
								<a href="singing.php"><figure><img src="dummy/vocal-teacher3.jpg"></figure></a>
								<a href="singing.php"><h3 id="teacher">Elif Tanrıverdi</h3></a>
													<span class="year">Opera Şan</span><br>
													<span class="track">İleri Seviye</span>
								</div>
								<div class="filterable-item drums">
								<a href="drums.php"><figure><img src="dummy/drum-teacher1.jpg"></figure></a>
								<a href="drums.php"><h3 id="teacher">Evren Gündüz</h3></a>
													<span class="year">Rock</span><br>
													<span class="track">Başlangıç Seviyesi</span>
								</div>
								<div class="filterable-item drums">
								<a href="drums.php"><figure><img src="dummy/drum-teacher2.jpg"></figure></a>
								<a href="drums.php"><h3 id="teacher">Yavuz Çetin</h3></a>
													<span class="year">Metal / Hard Rock</span><br>
													<span class="track">Orta Seviye</span>
								</div>
								<div class="filterable-item drums">
								<a href="drums.php"><figure><img src="dummy/drum-teacher3.jpg"></figure></a>
								<a href="drums.php"><h3 id="teacher">Berkay Demir</h3></a>
													<span class="year">Caz</span><br>
													<span class="track">İleri Seviye</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .testimonial-section -->

				
			</main> <!-- .main-content -->

			<footer class="site-footer">
			<div class="container">
				<img src="dummy/logo-footer.png" style="width:130px;height:130px" alt="Site Name">

				<address>
					<p>Fevzi Çakmak, Sakarya Cd. No:156, 35330 Balçova/İzmir<br><a href="tel:354543543">(552) 221 35 03</a> <br> <a
							href="mailto:info@penaakademi.com">info@penaakademi.com</a></p>
				</address>


				<div class="social-links">
					<a href="#"><i class="fa fa-facebook-square"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
				</div> <!-- .social-links -->

				<p class="copy">Copyright 2024 Pena Akademi. Tüm hakları saklıdır.</p>
			</div>
		</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->

		<script src="js/jquery-1.11.1.min.js"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>