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
		
		<title>Hakkımızda | Pena Akademi</title>
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
						<li class="menu-item current-menu-item"><a href="about.php">Hakkımızda</a></li>
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
						<li class="menu-item"><a href="teachers.php">Öğretmenler</a></li>
						<li class="menu-item"><a href="contact.php">İletişim</a></li>
						<?php
						
						if($_SESSION["guest"]){
						echo '<li class="menu-item" id="sign-in"><a href="sign-in.php" class="button cut-corner">Giriş Yap</a></li>';
						}
						else{
							echo "<li class='menu-item dropdown' id='signed-in'>
							<a href=''>Hoş geldin " . $_SESSION['username'] . "!</a>
							<ul class='dropdown-menu' id=sign-in-dropdown>";
							if(!$_SESSION["teacher"]){
							 echo  "<li><a href='profile.php'>Profilim</a></li>";
							}
							  echo "
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
				<div class="fullwidth-block inner-content">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<div class="content">
									<h2 class="entry-title">Hakkımızda</h2>
									<figure class="featured-image">
										<img src="dummy/about-us.jpg" alt="post image">
									</figure>
									<p class="leading">Müziğin birleştirici gücüne inanan ve her bireyin kendi melodisini yaratabileceği bir ortam sunmayı amaçlayan bir eğitim merkeziyiz. Alanında uzman eğitmen kadromuz ve modern eğitim yöntemlerimizle, hem hobi olarak müzikle ilgilenenlere hem de profesyonel bir kariyer hedefleyenlere hizmet vermekteyiz. Müziği öğrenmek ve öğretmek, bizim için bir tutku ve bu tutkuyu öğrencilerimize aktarmaktan büyük mutluluk duyuyoruz.</p>
									<p>Kurslarımız; gitar, piyano, bateri, şan ve daha pek çok alanda kapsamlı içerikler sunar. Her yaş grubuna hitap eden eğitim programlarımız, hem teorik hem de pratik bilgiyi dengeli bir şekilde harmanlayarak sunar. Ayrıca bireysel ihtiyaçlara uygun özel ders seçenekleriyle, her öğrencinin müzik yolculuğunda en iyi şekilde desteklenmesini hedefliyoruz.</p>

									<p>Müzik eğitimine olan bağlılığımızla, sadece teknik bilgi sunmakla kalmıyor, aynı zamanda müzik sevgisini aşılıyoruz. Eğitim merkezimiz, sıcak ve samimi atmosferiyle öğrencilerimize kendilerini geliştirebilecekleri, yaratıcı bir alan sağlar. Sanatla dolu bu yolculukta, birlikte ilerlemekten ve her adımda size rehberlik etmekten onur duyuyoruz.</p>
								</div>
							</div>
							<div class="col-md-4 col-md-push-1">
								<aside class="sidebar">
									<div class="widget">
										<h3 class="widget-title">Derslerimiz</h3>
										<ul class="discography-list">
											<li>
												<figure class="cover"><img src="dummy/thumbnail-3.jpg" alt="thumbnail 1"></figure>
												<div class="detail">
													<h3><a href="guitar.php">Gitar</a></h3>
													<span class="track">Akustik, klasik ya da elektro... Gitar çalmayı öğrenmek artık çok kolay!</span>
												</div>
											</li>
											<li>
												<figure class="cover"><img src="dummy/piano-square.jpg" alt="thumbnail 2"></figure>
												<div class="detail">
													<h3><a href="piano.php">Piyano</a></h3>
													<span class="track">Müziğin evrensel diliyle tanışın. Temel ve ileri düzey piyano derslerimizle keyifli bir deneyim yaşayın.</span>
												</div>
											</li>
											<li>
												<figure class="cover"><img src="dummy/thumbnail-1.jpg" alt="thumbnail 3"></figure>
												<div class="detail">
													<h3><a href="bass.php">Bas Gitar</a></h3>
													<span class="track">Ritmin derinliğini hissetmek ve müziğin temelini oluşturmak için bas gitar dersleri.</span>
												</div>
											</li>
											<li>
												<figure class="cover"><img src="dummy/vocal-square.png" alt="thumbnail 4"></figure>
												<div class="detail">
													<h3><a href="singing.php">Şan</a></h3>
													<span class="track">Sesinizi bir enstrüman gibi kullanmayı öğrenin, şarkı söyleme yeteneğinizi geliştirin.</span>
												</div>
											</li>
											<li>
												<figure class="cover"><img src="dummy/drums-square.jpg" alt="thumbnail 5"></figure>
												<div class="detail">
													<h3><a href="drums.php">Bateri</a></h3>
													<span class="track">Müziğin nabzını tutun! Dinamik ve eğlenceli davul dersleriyle ritmi keşfedin.</span>
												</div>
											</li>
										</ul>
									</div>
								</aside>
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