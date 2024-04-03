<html>
<head>
<link type="text/css" rel="stylesheet" href="designadmin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<style>
    .box{
        color: #000000;
        padding: 10px;
        display: none;
        margin-top: 20px;
		font-family: "Pacifico";
    font-size: 25;
    }
    .red{ background: #ffffff; }
    .green{ background: #ffffff; }
    .blue{ background: #ffffff; }
	.yellow{ background: #ffffff;}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $(".select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>
</head>
<body>
<div class="titlu"> Catalog Online</a> </div>
<center>
    <div>
	<br><br>
        <select class="select">
            <option>Alege o acțiune</option>
            <option value="red">Adaugă școală</option>
            <option value="green">Elimină școală</option>
            <option value="blue">Adaugă administrator</option>
			<option value="yellow">Elimină administrator</option>
        </select>
    </div>
    <div class="red box">
<form name="form_add" id="form_add" method="post" > 
        Nume școală: 
        <input type="text" name="nume_scoala"><br>
        Județ: 
        <input type="text" name="judet"><br>
        Localitate:
        <input type="text" name="localitate"><br>
        Strada:
        <input type="text" name="strada"><br>
		Număr:
        <input type="text" name="numar"><br>
        Telefon:
        <input type="text" name="telefon"><br>
        E-mail:
        <input type="text" name="email"><br>
        <input type="submit" value="Submit" name="submit">
    </form>	
	</div>
    <div class="green box">
	<form name="form_elim" id="form_elim" method="post" >
		id școală: 
        <input type="text" name="id_scoala_elim"><br>
		<input type="submit" value="Submit" name="submit">
	</form>
	</div>
    <div class="blue box">
	<form name="form_adauga_admin" id="form_adauga_admin" method="post" >
		id școală: 
        <input type="text" name="id_scoala_adauga_admin"><br>
		Cnp administrator:
		<input type="text" name="cnp_admin"><br>
		Nume administrator:
		<input type="text" name="nume_admin"><br>
		Prenume administrator:
		<input type="text" name="prenume_admin"><br>
		Telefon administrator:
		<input type="text" name="telefon_admin"><br>
		E-mail administrator:
		<input type="text" name="email_admin"><br>
		Județ: 
        <input type="text" name="judet_admin"><br>
        Localitate:
        <input type="text" name="localitate_admin"><br>
        Strada:
        <input type="text" name="strada_admin"><br>
		Număr:
        <input type="text" name="numar_admin"><br>
		<input type="submit" value="Submit" name="submit">
	</form>
	</div>
	<div class="yellow box">
	<form name="form_elim_admin" id="form_elim_admin" method="post">
		id școală: 
        <input type="text" name="id_scoala_elim_admin"><br>
		<input type="submit" value="Submit" name="submit">
	</form>
	</div>
</center>
<?php
	
	include "php_functions.php";
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "catalog online";

//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
	if($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
	
	if(isset($_POST['nume_scoala']) && isset($_POST['judet']) && isset($_POST['localitate']) && isset($_POST['strada']) && isset($_POST['telefon']) && isset($_POST['email']) && isset($_POST['numar']))
	{
		
		$numescoala = validate($_POST['nume_scoala']);
		$judetscoala = validate($_POST['judet']);
		$localitatescoala = validate($_POST['localitate']);
		$stradascoala = validate($_POST['strada']);
		$numar = $_POST['numar'];
		$telefonscoala = validate($_POST['telefon']);
		$emailscoala = validate($_POST['email']);
		
	if(empty($numescoala))
	{
		echo "<script type='text/javascript'>alert('Numele școlii lipsește!')</script>";
	} else if(empty($judetscoala))
	{
		echo "<script type='text/javascript'>alert('Județul școlii lipsește!')</script>";
	} else if(empty($localitatescoala))
	{
		echo "<script type='text/javascript'>alert('Localitatea școlii lipsește!')</script>";
	} else if(empty($stradascoala))
	{
		echo "<script type='text/javascript'>alert('Strada școlii lipsește!')</script>";
	} else if(empty($numar))
	{
		echo "<script type='text/javascript'>alert('Numărul școlii lipsește!')</script>";
	} else if(empty($telefonscoala))
	{
		echo "<script type='text/javascript'>alert('Numărul de telefon al școlii lipsește!')</script>";
	} else if(empty($emailscoala))
	{
		echo "<script type='text/javascript'>alert('Email-ul școlii lipsește!')</script>";
	}
	else 
	{
		$sql_scoala = "INSERT INTO `scoli` (`nume_scoala`, `telefon`, `email`) VALUES ('$numescoala', '$telefonscoala', '$emailscoala')";
		
		if($conn->query($sql_scoala) === TRUE)
		{
		$sql = "SELECT id_scoala FROM scoli WHERE telefon = '$telefonscoala'";
		$idscoala = intval(mysqli_fetch_assoc(mysqli_query($conn, $sql))['id_scoala']);
		$sql_adresa = "INSERT INTO `adrese` (`id_scoala`, `judet`, `localitate`, `strada`, `numar`) VALUES ('$idscoala', '$judetscoala', '$localitatescoala', '$stradascoala', '$numar')";
			if($conn->query($sql_adresa) ===TRUE)
				echo "<script type='text/javascript'>alert('$numescoala a fost adăugată cu succes!')</script>";
			else echo"<script type='text/javascript'>alert('Eroare!')</script>";
		} else echo"<script type='text/javascript'>alert('Eroare!')</script>";
	}
	}
	else if(isset($_POST['id_scoala_elim']))
	{
		$idscoalaelim = validate($_POST['id_scoala_elim']);
		if(empty($idscoalaelim))
			echo "<script type='text/javascript'>alert('Id-ul școlii lipsește!')</script>";
		else
		{
			$sql1 = "SELECT nume_scoala FROM scoli WHERE id_scoala = '$idscoalaelim'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_assoc($result1);
			
			if(isset($row1["nume_scoala"]))
			{
				$numescoalaelim = $row1["nume_scoala"];
				
				$sqlelims = "DELETE FROM `scoli` WHERE id_scoala = '$idscoalaelim'";
				$sqlelimas = "DELETE FROM `adrese` WHERE id_scoala = '$idscoalaelim'";
				
				if($conn->query($sqlelims) && $conn->query($sqlelimas))
				{
					$sql2 = "SELECT id_admin FROM admini WHERE id_scoala = '$idscoalaelim'";
					$result2 = mysqli_query($conn, $sql2);
					$row2 = mysqli_fetch_assoc($result2);
					$ok=1;
					if(isset($row2["id_admin"]))
					{
						
						$cnpadmin = $row2["id_admin"];
						$sqlelima = "DELETE FROM `admini` WHERE id_scoala = '$idscoalaelim'";
						$sqlelimaa = "DELETE FROM `adrese` WHERE cnp_admin = '$cnpadmin'";
						
						if($conn->query($sqlelima) && $conn->query($sqlelimaa))
						{
							$ok=2;
							echo "<script type='text/javascript'>alert('$numescoalaelim a fost eliminată cu succes!')</script>";
						}else echo"<script type='text/javascript'>alert('Eroare!')</script>";
					
					}
					if($ok === 1)
						echo "<script type='text/javascript'>alert('$numescoalaelim a fost eliminată cu succes!')</script>";
				}else echo"<script type='text/javascript'>alert('Eroare!')</script>";
				
			} else echo "<script type='text/javascript'>alert('Școala nu există!')</script>";
		}
	} else if(isset($_POST['id_scoala_adauga_admin']) && isset($_POST['cnp_admin']) && isset($_POST['nume_admin']) && isset($_POST['prenume_admin']) && isset($_POST['telefon_admin']) && isset($_POST['email_admin']) && isset($_POST['judet_admin']) && isset($_POST['localitate_admin']) && isset($_POST['strada_admin']) && isset($_POST['numar_admin']))
	{
		$idscoala = validate($_POST['id_scoala_adauga_admin']);
		$cnpadmin = validate($_POST['cnp_admin']);
		$numeadmin = validate($_POST['nume_admin']);
		$prenumeadmin = validate($_POST['prenume_admin']);
		$telefonadmin = validate($_POST['telefon_admin']);
		$emailadmin = validate($_POST['email_admin']);
		$judetadmin = validate($_POST['judet_admin']);
		$localitateadmin = validate($_POST['localitate_admin']);
		$stradaadmin = validate($_POST['strada_admin']);
		$numaradmin = validate($_POST['numar_admin']);
		
		if(empty($idscoala))
			echo "<script type='text/javascript'>alert('Id-ul școlii lipsește!')</script>";
		else if(empty($cnpadmin))
			echo "<script type='text/javascript'>alert('Cnp-ul administratorului lipsește!')</script>";
		else if(empty($numeadmin))
			echo "<script type='text/javascript'>alert('Numele administratorului lipsește!')</script>";
		else if(empty($prenumeadmin))
			echo "<script type='text/javascript'>alert('Prenumele administratorului lipsește!')</script>";
		else if(empty($telefonadmin))
			echo "<script type='text/javascript'>alert('Numărul de telefon al administratorului lipsește!')</script>";
		else if(empty($emailadmin))
			echo "<script type='text/javascript'>alert('Email-ul administratorului lipsește!')</script>";
		else if(empty($judetadmin))
			echo "<script type='text/javascript'>alert('Județul administratorului lipsește!')</script>";
		else if(empty($localitateadmin))
			echo "<script type='text/javascript'>alert('Localitatea administratorului lipsește!')</script>";
		else if(empty($stradaadmin))
			echo "<script type='text/javascript'>alert('Strada administratorului lipsește!')</script>";
		else if(empty($numaradmin))
			echo "<script type='text/javascript'>alert('Numărul casei administratorului lipsește!')</script>";
		else
		{
			$sql3 = "SELECT telefon FROM scoli WHERE id_scoala = '$idscoala'";
			$result3 = mysqli_query($conn,$sql3);
			$row3 = mysqli_fetch_assoc($result3);
			
			if(!isset($row3["telefon"]))
				echo "<script type='text/javascript'>alert('Școala nu există!')</script>";
			else if(empty($row3["telefon"]))
				echo "<script type='text/javascript'>alert('Școala nu există!')</script>";
			else 
			{
			$sql = "INSERT INTO `admini` (`cnp_admin`, `id_scoala`, `nume`, `prenume`, `telefon`, `email`) VALUES ($cnpadmin, $idscoala, '$numeadmin', '$prenumeadmin', '$telefonadmin', '$emailadmin')";
			if($conn->query($sql))
			{				
					$sqladmin = "SELECT id_admin FROM admini WHERE id_scoala = '$idscoala'";
					$resultadmin = mysqli_query($conn, $sqladmin);
					$rowadmin = mysqli_fetch_assoc($resultadmin);
					if(isset($rowadmin['id_admin']))
					{
					$idadmin = $rowadmin['id_admin'];
					$data1 = getusername($numeadmin, $idadmin.$idscoala.$idadmin);
					$data = md5($data1);
					$sql3 = "UPDATE admini set username = '$data', password = '$data' WHERE id_admin='$idadmin'";
					$sql2 = "INSERT INTO `adrese` (`id_admin`, `judet`, `localitate`, `strada`, `numar`) VALUES ($idadmin, '$judetadmin', '$localitateadmin', '$stradaadmin', '$numaradmin')";
					if($conn->query($sql2)&&$conn->query($sql3))
					{
						 $to_email = $emailadmin;
			$subject = 'Catalog Online';
			$body = "Nume utilizator:$data1 Parolă:$data1";
			$headers = 'From: Catalog Online';
			if(isset($to_email) && isset($subject) && isset($body) && isset($headers))
			{
			mail($to_email, $subject, $body, $headers);
			} 
    
						echo "<script type='text/javascript'>alert('Administrator adăugat cu succes!')</script>";
					}
					else echo"<script type='text/javascript'>alert('Eroare!')</script>";
					} else echo"<script type='text/javascript'>alert('Eroare!')</script>";
			} else echo"<script type='text/javascript'>alert('Eroare!')</script>";
			}
		}
	} else if(isset($_POST['id_scoala_elim_admin']))
	{
		$idscoalaelimadmin = validate($_POST['id_scoala_elim_admin']);
		if(empty($idscoalaelimadmin))
			echo "<script type='text/javascript'>alert('Id-ul școlii lipsește!')</script>";
		else 
		{
			$sqladmin = "SELECT id_admin FROM admini WHERE id_scoala = '$idscoalaelimadmin'";
			$resultadmin = mysqli_query($conn, $sqladmin);
			$rowadmin = mysqli_fetch_assoc($resultadmin);
			if(!isset($rowadmin["id_admin"]))
				echo "<script type='text/javascript'>alert('Această școală nu există sau nu are un administrator!')</script>";
			else if(empty($rowadmin["id_admin"]))
				echo "<script type='text/javascript'>alert('Această școală nu există sau nu are un administrator!')</script>";
			else
			{
				$sql1 = "DELETE FROM `admini` WHERE id_scoala = '$idscoalaelimadmin'";
				$idadmin = $rowadmin["id_admin"];
				$sqla1 = "DELETE FROM `adrese` WHERE id_admin = '$idadmin'";
				if($conn->query($sql1) && $conn->query($sqla1))
					echo "<script type='text/javascript'>alert('Administrator eliminat cu succes!')</script>";
				else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}
		}
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
?>
</body>
</html>