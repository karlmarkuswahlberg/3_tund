<?php

	
	//user_form.php
	//jutumärkide vahele GET-ile, see mida tahame kätte saada input elemendist NAME HTMLis.
	//olulised on <form action="user_form.php" method="get">
	//ja inputile panna name=""
	
	//echo $_POST["email"];
	//echo $_POST["password"];
	
	
	//muutuja "email_error"
	
	$email_error = "";
	$password_error ="";
	$password1 = "";
	
	$password1_error ="";
	
	$name = "";
	$name_error = "";
	$surname = "";
	$surname_error = "";
	$newemail = "";
	$newemail_error = "";
	$comment ="";
	
	
	//kontrolli ainult siis kui kasutaja vajutab "Logi sisse" nuppu.
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		//kontrollime kasutaja e-posti, et see poleks tühi.
		if(empty($_POST["email"])){
		$email_error = "Sisesta e-mail";
		
		}
		//kontrollime kasutaja parooli, et see poleks tühi.
		if(empty($_POST["password"])){
		$password_error = "Sisesta parool!";
		
		}else{
			//parool ei ole tühi, kontrollime parooli pikkust.
			//strlen on string lenght
			if(strlen($_POST["password"]) >= 8){
				
			}else{
				$password_error ="Parool peab olema vähemalt 8 sümbolit pikk!";
			}
			
		}
		
	}
	//siit algab kasutaja loomise osa.
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if (empty($_POST["name"])) {
			$name_error = "Eesnime väli on kohustuslik!";
		}else{
			$name = ($_POST["name"]);
		}	
		
		if (empty($_POST["name"])) {
			$surname_error = "Perekonnanime väli on kohustuslik!";
		}else{
			$surname = ($_POST["surname"]);
		}	
		
		if(empty($_POST["newemail"])){
			$newemail_error = "e-maili väli on kohustuslik!";
		}else{
			$newemail = ($_POST["newemail"]);
		}
		
		
		if(empty($_POST["password1"])){
            $password1_error="Ei saa olla tühi";
        }else{
            
            //parool ei ole tühi, kontrollime pikkust
            if(strlen($_POST["password1"]) < 8){
                $password1_error="Peab olema vähemalt 8 sümbolit!";
                
            }
            
        }
		
	
	}
	
	
?>
<html>
	<head>
		<title>User login page</title>
	</head>
	
	<body>
		<p>Veebilehele sisselogides saaks sisestada andmeid/pääseks ligi kogutud andmetele/neid analüüsida, mis on saadud välitööde käigus. Tegu on NATURA 2000 rannikuelupaikade kaardistamisega (GPS-punktid, pildid, kommentaarid).
		Edasi graafikud, joonised nende andmete analüüsil. Geoökoloogia.
	
		<h2>Log in</h2>
		<!--selleks, et -->
			<form action="user_form.php" method="post">
			
				<input name="email" type="email" placeholder="e-post">* <?php echo $email_error; ?> <br><br>
				<input name="password" type="password" placeholder="parool">* <?php echo $password_error; ?><br><br>
				<input type="submit" value="Logi sisse">
			
			</form>
			
			
		<h2>Create user</h2>
			
			<form action="user_form.php" method="post">
			
				<input type="text" name="name" placeholder="Eesnimi">* <?php echo $name_error;?><br><br>
				<input type="text" name="surname" placeholder="Perekonnanimi">* <?php echo $surname_error;?><br><br>
				<input name="newemail" type="email" placeholder="e-post">* <?php echo $newemail_error; ?> <br><br>
				<input name="password1" type="password" placeholder="Sisesta soovitud parool">* <?php echo $password1_error; ?><br><br>
				
				
				
				Biograafia<textarea name="comment" rows="5" cols="30"><?php echo $comment;?></textarea><br>
				
				<p>Sünniaeg: <input type="text" name="dob" placeholder="nt. 01.01.1993" /></p>
				
				<input type="radio" name="gender" value="female">Naine
				<input type="radio" name="gender" value="male">Mees <br><br>
				
	
				<input type="submit" value="Registreeri kasutajaks!">
			
			
			</form>
					
		
	</body>

</html>