<?php
    session_start();
    if(isset($_POST["exitButton"])){
		$_SESSION["guest"] = true;
		header("Location: index.php");
	}

    
?>

<?php

if(isset($_POST["silButon"])){

    $conn = new mysqli("localhost", "root", "","müzikproje");

    $sql = "DELETE FROM lessons WHERE CONCAT(member_ID, teacher_ID)='" . $_POST['silButon']."'";
    $conn -> query($sql);
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

		.lesson-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #191919;
			margin-top: 20px;
			margin-left: 200px;
			margin-right: 200px;
            margin-bottom: 15px;
            padding: 15px 20px;
            border-radius: 6px;
            border: 1px solid #ddd;
			border-color: #fd5927;
        }

        .lesson-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .lesson-info h3 {
            margin: 0;
            color: #fd5927;
            font-size: 18px;
			padding:0px 0px 110px;
        }

        .lesson-info p {
            margin: 5px 10px;
            color: white;
            font-size: 14px;
        }

        .action-buttons button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .action-buttons .edit-btn {
            background-color: #4caf50;
            color: #fff;
            margin-right: 10px;
        }

        .action-buttons .edit-btn:hover {
            background-color: #45a049;
        }

        .action-buttons .delete-btn {
            background-color: #f44336;
            color: #fff;
        }

        .action-buttons .delete-btn:hover {
            background-color: #e53935;
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
            if(!$_SESSION["teacher"]){
                $conn = new mysqli("localhost", "root", "","müzikproje");

                $sql = "SELECT teachers.username AS 'hoca', teachers.brach AS 'ders', lessons.date as 'tarih', lessons.hour as 'saat', lessons.teacher_ID as 'tid'
                FROM members 
                INNER JOIN lessons ON members.member_ID 
                = lessons.member_ID INNER JOIN teachers ON teachers.ogretmen_ID = lessons.teacher_ID".   " WHERE members.member_ID = ".$_SESSION["id"];
                
                
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "
                    <div class='lesson-card'>
                    <div class='lesson-info'>
                    <br><br><br>
                        <h3> <pre>    " .$row['ders'] . "</pre></h3>
                        <p>Öğretmen: ". $row['hoca'] . "</p>
                        <p>Tarih: " .$row['tarih'] . "</p>
                        <p>Saat: ". $row['saat']."</p>
                        
                    </div>
                    <form method='POST', action=''>
                    <div class='action-buttons'>
                        <button type='submit' name='silButon' value='".$_SESSION['id'] . $row['tid'] ."' class='delete-btn'>Sil</button>
                    </div>
                    </form>
                </div>";
                }
            }
            else{
                $conn = new mysqli("localhost", "root", "","müzikproje");

                $sql = "SELECT members.username AS 'hoca', teachers.brach AS 'ders', lessons.date as 'tarih', lessons.hour as 'saat', lessons.teacher_ID as 'tid'
                FROM members 
                INNER JOIN lessons ON members.member_ID 
                = lessons.member_ID INNER JOIN teachers ON teachers.ogretmen_ID = lessons.teacher_ID".   " WHERE teachers.ogretmen_ID = ".$_SESSION["id"];
                
                
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "
                    <div class='lesson-card'>
                    <div class='lesson-info'>
                    <br><br><br>
                        <h3> <pre>    " .$row['ders'] . "</pre></h3>
                        <p>Öğrenci: ". $row['hoca'] . "</p>
                        <p>Tarih: " .$row['tarih'] . "</p>
                        <p>Saat: ". $row['saat']."</p>
                        
                    </div>
                    <form method='POST', action=''>
                    <div class='action-buttons'>
                        <button type='submit' name='silButon' value='".$_SESSION['id'] . $row['tid'] ."' class='delete-btn'>Sil</button>
                    </div>
                    </form>
                </div>";
                }
            }
            ?>
			
				
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