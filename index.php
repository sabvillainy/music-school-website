<?php 
	session_start();
	$conn = new mysqli("localhost", "root", "","müzikproje");
	if(!isset($_SESSION["guest"])){
		$_SESSION["guest"] = true;
	}
?>

<?php
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

	<title>Pena Akademi</title>
	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet"
		type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Loading main css file -->
	<link rel="stylesheet" href="style.css">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>

<body class="header-collapse">

	<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a href="index.php" id="branding">
					<img src="dummy/logo.png" style="width:278px;height:48px" alt="Site Title">
				</a> <!-- #branding -->

				<nav class="main-navigation">
					<button type="button" class="toggle-menu"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.php">Ana Sayfa</a></li>
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

		<div class="hero">
			<div class="slider">
				<ul class="slides">
					<li class="lazy-bg" data-background="dummy/slide-1.jpg">
						<div class="container">
							<h2 class="slide-title">Pena Akademi'ye Hoş Geldiniz!</h2>
							<h3 class="slide-subtitle">Müzik eğitimine gönül vermiş bir merkez olarak, hayallerinizi gerçeğe dönüştürmek için buradayız.</h3>
							<p class="slide-desc">Müzik, sadece bir sanat değil; bir yaşam biçimidir. Biz, size bu yolculukta rehberlik etmek için buradayız. Deneyimli eğitmenlerimizle kaliteli bir eğitim sunuyoruz.</p>

							<a href="about.php" class="button cut-corner">Hakkımızda Daha Fazla</a>
						</div>
					</li>
					<li class="lazy-bg" data-background="dummy/slide-2.jpg">
						<div class="container">
							<h2 class="slide-title">Uzman Eğitmenlerimizle Tanışın</h2>
							<h3 class="slide-subtitle">Alanında uzman eğitmenlerimizle hedeflerinize daha hızlı ulaşın.</h3>
							<p class="slide-desc">Gitar, piyano, bateri ve daha fazlası... Her biri kendi alanında profesyonel olan eğitmenlerimiz size özel bir eğitim sunmak için burada. Müziği daha derinden öğrenmeye hazır olun.</p>

							<a href="teachers.php" class="button cut-corner">Öğretmenlerimizi Gör</a>
						</div>
					</li>
					<li class="lazy-bg" data-background="dummy/slide-3.jpg">
						<div class="container">
							<h2 class="slide-title">Sormak İstediğiniz Bir Şey Mi Var?</h2>
							<h3 class="slide-subtitle">Form aracılığıyla ekibimize ulaşarak sorularınıza yanıt bulabilirsiniz.</h3>
							<p class="slide-desc">Derslerimiz, kayıt süreci veya başka bir konuda bilgi almak için bizimle iletişime geçin. Size yardımcı olmaktan mutluluk duyarız.</p>

							<a href="contact.php" class="button cut-corner">İletişime Geçin</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<main class="main-content">

			





			<section class="lessons-section" id="lessons">
				<h2>Derslerimiz</h2>
				<p>Hayalinizdeki enstrümanı çalmaya başlamak için hiçbir engel yok! Teorik bilgiye ihtiyaç duymadan temel becerilerinizi geliştirin, isterseniz kapsamlı müzik teorisi eğitimlerimize katılın. Her seviyeye uygun derslerimizle, müzikle dolu bir yolculuğa çıkın.</p>
				
				<div class="lessons-grid">
				  <!-- Gitar -->
				  <div class="lesson-card" onclick="openLesson('guitar')">
					<img src="dummy/guitar1.jpg" alt="Guitar">
					<h3>Gitar</h3>
				  </div>
			
				  <!-- Piyano -->
				  <div class="lesson-card" onclick="openLesson('piano')">
					<img src="dummy/piano.jpg" alt="Piano">
					<h3>Piyano</h3>
				  </div>
			
				  <!-- Şarkı Söyleme -->
				  <div class="lesson-card" onclick="openLesson('singing')">
					<img src="dummy/singing.jpg" alt="Singing">
					<h3>Şan</h3>
				  </div>
			
				  <!-- Bas Gitar -->
				  <div class="lesson-card" onclick="openLesson('bass')">
					<img src="dummy/bass.jpg" alt="Bass">
					<h3>Bas</h3>
				  </div>
			
				  <!-- Davul -->
				  <div class="lesson-card" onclick="openLesson('drums')">
					<img src="dummy/drums.jpg" alt="Drums">
					<h3>Bateri</h3>
				  </div>
				</div>
				
			  </section>


			  <div class="fullwidth-block why-chooseus-section">
				<div class="container">
					<h2 class="section-title">Neden bizi seçmelisiniz?</h2>

					<div class="row">
						<div class="col-md-4">
							<div class="feature">
								<figure class="cut-corner">
									<img src="dummy/why1.jpg" alt="">
								</figure>
								<h3 class="feature-title">Uzman Eğitmenler</h3>
								<p>Her biri kendi alanında profesyonel olan eğitmenlerimiz, bireysel ihtiyaçlarınıza göre uyarlanmış bir eğitim sunar. Müzik tutkunuza rehberlik etmek için buradayız.</p>
							</div> <!-- .feature -->
						</div>
						<div class="col-md-4">
							<div class="feature">
								<figure class="cut-corner">
									<img src="dummy/why2.jpg" alt="">
								</figure>
								<h3 class="feature-title">Esnek Ders Programları</h3>
								<p>Yoğun tempoya uygun, kişiselleştirilmiş programlarla derslerinizi istediğiniz zaman ve şekilde planlayabilirsiniz. Dilerseniz, bireysel olarak program dışı bir saatte gelip enstrümanınıza çalışabilirsiniz.</p>
							</div> <!-- .feature -->
						</div>
						<div class="col-md-4">
							<div class="feature">
								<figure class="cut-corner">
									<img src="dummy/why3.jpg" alt="">
								</figure>
								<h3 class="feature-title">Geniş İçerik Yelpazesi</h3>
								<p>Farklı enstrümanlardan müzik teorisine kadar geniş bir eğitim içeriği sunuyoruz. Her yaş ve seviyeden öğrenciye uygun, zengin materyallerle dolu bir eğitim deneyimi sizleri bekliyor..</p>
							</div> <!-- .feature -->
						</div>
					</div>
				</div> <!-- .container -->
			</div> <!-- .why-chooseus-section -->

			
			<div class="fullwidth-block testimonial-section">
				<div class="container">
					<div class="quote-slider">
						<ul class="slides">
							<li>
								<blockquote>
									<p>"Bu merkez gerçekten müziğin ruhunu yansıtıyor. Eğitmenleri, atmosferi ve eğitim kalitesiyle harika bir yer. Eğer müziğe başlamak istiyorsanız, kesinlikle doğru adres burası!"</p>
									<cite>James Hetfield</cite>
									<span>Gitarist ve Vokalist, Metallica</span>
								</blockquote>
							</li>
							<li>
								<blockquote>
									<p>"Müzik eğitimi almayı hiç bu kadar keyifli bir hale getiren bir yer görmedim. Hem teoriyi hem de pratiği öğrenirken inanılmaz bir destek sağlıyorlar. Bu merkezde herkes için bir şey var."</p>
									<cite>Dave Mustaine</cite>
									<span>Gitarist ve Vokalist, Megadeth</span>
								</blockquote>
							</li>
						</ul>
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
	<script>
		function openLesson(lesson) {
			// Her enstrüman için ayrı bir sayfaya yönlendirme
			window.location.href = lesson + ".php";
  		}
	</script>

</body>

</html>