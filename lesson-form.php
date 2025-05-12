<?php
    session_start();
    
    if($_SESSION["guest"]){
        echo '<script>alert("Ders almak için lütfen giriş yapınız!")</script>';
        header("Location: sign-in.php");
    }
    else{
        if(isset($_POST["lessonButton"])){

            $conn = new mysqli("localhost", "root", "","müzikproje");
            $sql = "INSERT INTO lessons(member_ID,teacher_ID,date,hour) VALUES(" . $_SESSION["id"] . "," . $_POST["teacher"] . ",'" . $_POST["lesson_date"] . "','" . $_POST["lesson_time"] . ":00')";
            
            if ($conn->query($sql) === TRUE) {
                
            }
            else{
                echo "<script>alert('Seçtiğiniz hoca istediğiniz saatlerde doludur, lütfen başka bir tarih ya da hoca seçiniz!')</script>";
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
				<div class="fullwidth-block inner-content">
					<div class="container">
                    <h2 class="page-title">Ders Alım Formu</h2>
                    <p>Lütfen ders alım detaylarını dikkatlice doldurunuz.</p>
        <form action="" method="post">

            <!-- Kullanıcının öğretmen seçtiği kısım -->
            <div class="form-group">
                <label for="teacher">Öğretmen Seçimi</label>
                <select name="teacher" id="teacher" required>
                    <option value="" disabled selected>Öğretmen seçin</option>
                    <?php
                        $conn = new mysqli("localhost", "root", "","müzikproje");
                        $sql1 = "SELECT * FROM teachers WHERE brach ='" . $_SESSION["insturment"] ."'"; 
                        $result = $conn->query($sql1);
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["ogretmen_ID"] ."'>". $row["username"]."</option>";
                            }             
                    ?>
                </select>
            </div>
                        <!-- Kullanıcının tarih seçtiği kısım -->
                        <div class="form-group">
                <label for="lesson-date">Ders Tarihi</label>
                <input type="date" name="lesson_date" id="lesson-date" required>
            </div>

            <!-- Kullanıcının ders saatini seçtiği kısım -->
            <div class="form-group">
                <label for="lesson-time">Ders Saati</label>
                <input type="time" name="lesson_time" id="lesson-time" required>
            </div>

            <!-- Form gönderme butonu -->
            <div class="form-group">
                <button type="submit" name="lessonButton">Dersi Ayarla</button>
            </div>
        </form>
        <p class="note">Ders ve öğretmen bilgileri seçiminize göre yüklenecektir.</p>
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
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>