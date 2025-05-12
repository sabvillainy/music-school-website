<?php 

	session_start();
	
	$conn = new mysqli("localhost", "root", "","müzikproje");

?>

<?php
	if(isset($_POST["signupButton"])){
		$conn = new mysqli("localhost", "root", "","müzikproje");
		$sql = "SELECT * FROM members WHERE username='".$_POST["username"] . "' OR email='" . $_POST["email"]."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo '<script>alert("İstediğiniz kullanıcı adı zaten alınmış, lütfen başka bir tane seçin!")</script>';
		}
		else{
			$sql2 = "INSERT INTO members(username,name,surname,email,tel_No,password) VALUES ('". $_POST["username"] ."','" . $_POST["name"]."','". $_POST["surname"]."','" . $_POST["email"]."','". $_POST["telephone"]."','" . $_POST["password"] . "')";
			$conn->query($sql2);
			echo '<script>alert("Kaydınız Başarılı!")</script>';
		}
		$conn->close();
		}
?>

<?php
	if(isset($_POST["loginButton"])){
		if($_POST["user_type"] == "student"){
			$conn = new mysqli("localhost", "root", "","müzikproje");
			$sql = "SELECT * FROM members WHERE username='".$_POST["username"] . "' AND password='" . $_POST["password"]."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["id"] = $row["member_ID"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["guest"] = false;
				$_SESSION["teacher"] = false;
				}
				header("Location: index.php");
				exit();
			}
			else{
				$_SESSION["guest"] = true;
				echo '<script>alert("Hatalı kullanıcı adı veya şifre!")</script>';
				}
			}
		else{
			$conn = new mysqli("localhost", "root", "","müzikproje");
			$sql = "SELECT * FROM teachers WHERE username='".$_POST["username"] . "' AND password='" . $_POST["password"]."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION["id"] = $row["ogretmen_ID"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["guest"] = false;
				$_SESSION["teacher"] = true;
 				}
				header("Location: index.php");
				exit();
			}
			else{
				$_SESSION["guest"] = true;
				echo '<script>alert("Hatalı kullanıcı adı veya şifre!")</script>';
				}
			}
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Giriş Yap | Pena Akademi</title>
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
                        <div class="col-md-6">

                            <h2 class="page-title">Giriş Yap</h2>
                            <form action="" class="contact-form" method="POST">
                                <input type="text" name="username" placeholder="Kullanıcı adı" required>
                                <input type="password" name="password" placeholder="Şifre" required>
                                <select name="user_type" required>
                                    <option value="student">Öğrenci</option>
                                    <option value="teacher">Öğretmen</option>
                                </select>
                                <br><br>
                                <button type="submit" name="loginButton" class="button cut-corner">Giriş Yap</button>
                            </form>

                        </div>
                        <div class="col-md-6">
                            <p></p>
                            <h2 class="page-title">Kaydol</h2>
                            <form action="" class="contact-form" method="POST">
                                <input type="text" name="username" placeholder="Kullanıcı Adı" required>
								<input type="text" name="name" placeholder="Ad" required>
								<input type="text" name="surname" placeholder="Soyad" required>
                                <input type="email" name="email" placeholder="Email" required>
								<input type="telephone" name="telephone" placeholder="Telefon" required>
                                <input type="password" name="password" placeholder="Şifre" required>
                                <input type="password" name="passwordconfirm" placeholder="Tekrar Şifre" required>
                                <br>
                                <button type="submit" name="signupButton" class="button cut-corner">Kaydol</button>
								<button type="reset" class="button cut-corner">Temizle</button>
                            </form>

				
							
                        </div>
                    </div>
                </div>
            </div> <!-- .testimonial-section -->
            <script src="scripts.js"></script>

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