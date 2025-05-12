<?php 

	session_start();
	if(!isset($_SESSION["guest"])){
		$_SESSION["guest"] = true;
	}

?>

<?php 

    $conn = new mysqli("localhost", "root", "","müzikproje");
    $mid = $_SESSION["id"];

    if(isset($_POST['silButon'])){
        $sql = "DELETE FROM members WHERE member_ID = $mid";
        $conn->query($sql);
    }
    else if(isset($_POST['gonderButon'])){

        $ad = $_POST["first_name"];
        $soyad = $_POST["last_name"];
        $mail = $_POST["email"];
        $telNo = $_POST["phone"];
        $sifre = $_POST["password"];

        $sql = "UPDATE members SET name = '$ad', surname = '$soyad', email ='$mail', tel_No = '$telNo', password = '$sifre' WHERE member_ID = $mid";
        $conn->query($sql);
    }
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>İletişim | Pena Akademi</title>
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
        <style>
        body {
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select, input[type="text"], input[type="time"], input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #fd5927;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #e14e1f;
        }

        .note {
            font-size: 0.9em;
            color: #555;
            margin-top: 10px;
            text-align: center;
        }

		body {
            margin: 0;
            padding: 0;
        }
        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #191919;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
		.profile-container p {
			color:white;
		}
        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
			background-color:#141414;
			color:white;
        }
        .form-group input:disabled {
            background-color: gray;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
			margin:20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn.update {
            background-color: #28a745;
            color: #fff;
        }
        .btn.delete {
            background-color: #dc3545;
            color: #fff;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>

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
				
            <?php 
			
			$conn = new mysqli("localhost", "root", "","müzikproje");
			$sql = "SELECT * FROM members WHERE username='".$_SESSION["username"] ."'" 
			?>

<div class="profile-container">
        <h2>Profilim</h2>
        <?php 

        $conn = new mysqli("localhost", "root", "","müzikproje");
        $sql = "SELECT * FROM members WHERE member_ID=".$_SESSION["id"];
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $user = $row["username"];
            $isim = $row["name"];
            $soy = $row["surname"];
            $email = $row["email"];
            $phone = $row["tel_No"];
            $pass = $row["password"];
            }


        echo "
        <form id='profile-form', method='POST', action=''>
            <div class='form-group'>
                <label for='username'>Kullanıcı Adı:</label>
                <input type='text' id='username ' name='username' value='$user' disabled>
            </div>
            <div class='form-group'>
                <label for='first-name'>Ad:</label>
                <input type='text' id='first-name' name='first_name' value='$isim'>
            </div>
            <div class='form-group'>
                <label for='last-name'>Soyad:</label>
                <input type='text' id='last-name' name='last_name' value='$soy'>
            </div>
            <div class='form-group'>
                <label for='email'>E-posta:</label>
                <input type='email' id='email' name='email' value='$email'>
            </div>
            <div class='form-group'>
                <label for='phone'>Telefon:</label>
                <input type='text' id='phone' name='phone' value='$phone'>
            </div>
            <div class='form-group'>
                <label for='password'>Şifre:</label>
                <input type='password' id='password' name='password' value='$pass'>
            </div>
            <div class='btn-container'>
                <button type='submit' name ='gonderButon' class='btn update'>Profili Güncelle</button>
                <button type='submit' name ='silButon' class='btn delete'>Hesabı Sil</button>
            </div>
        </form> "
        ?>
    </div>
				
			</main>

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
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>