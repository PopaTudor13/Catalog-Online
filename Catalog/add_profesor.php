<html>
<link type="text/css" rel="stylesheet" href="designadmin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<head>
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
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
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
  	<?php
		if($_GET)
		{
	$username = $_GET['user'];
	
	$servername1 = "localhost";
	$username1 = "root";
	$password1 = "";
	$dbname1 = "catalog online";

//create connection
	$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

//check connection
	if($conn1->connect_error)
		{
			die("Connection failed: " . $conn1->connect_error);
		}
		
		$sqlsql = "SELECT id_admin FROM admini WHERE username = '$username'";
		$resultresult = mysqli_query($conn1, $sqlsql);
		if(mysqli_num_rows($resultresult) !==1)
		{
			header("Location: http://theboys.serveirc.com");
		}
		} else header("Location: http://theboys.serveirc.com");
		$conn1->Close();
	?>  
	<div class="titlu"> <a href=<?php echo "http://theboys.serveirc.com/madmin.php?user=".$username;?>>Catalog Online</a> </div>
    <center>
	<div>
	<br><br>
        <select>
            <option>Alege o acțiune</option>
            <option value="red">Adaugă profesor</option>
            <option value="green">Elimină profesor</option>
        </select>
    </div>
	<div class="red box">
		<form method="post"> 
		Cnp:
		<input type="text" name="cnp"><br>
        Nume: 
        <input type="text" name="nume"><br>
        Prenume: 
        <input type="text" name="prenume"><br>
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
		*Configurare:
		<input type="text" name="config"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
	<div class="comentariu">
		*în acest câmp se va completa astfel:<br>
		id_clasa 'spațiu' id_materie 'spațiu'<br>
		ex: 1 2 1 4 5 2 (profesorul predă la clasa 1 materia 2, etc.)<br>
	</div>
	<br>
	<style>
	.comentariu{
		display: block;
		width:	300px;
		height: auto;
		background-color: #38bea9;
		color: black;
		font-size: 20;
		border: 3px solid black;
		border-radius: 8px;
	}
	</style>
	<?php
	
		$servername = "localhost";
		$usernam = "root";
		$password = "";
		$dbname = "catalog online";

	//create connection
		$conn = new mysqli($servername, $usernam, $password, $dbname);

	//check connection
		if($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
		
	$sqlid = "Select id_scoala FROM admini WHERE username = '$username'";
	$resultid = mysqli_query($conn, $sqlid);
	$rowid = mysqli_fetch_assoc($resultid);
	if(isset($rowid["id_scoala"]))
	{
	$id = $rowid["id_scoala"];
	$sqltable1 = "Select id_materie,nume_materie FROM materii WHERE id_scoala = '$id'";
	$resulttable1 = mysqli_query($conn, $sqltable1);
	$sqltable2 = "Select id_clasa,nume_clasa FROM clase WHERE id_scoala = '$id'";
	$resulttable2 = mysqli_query($conn, $sqltable2);
	echo "<table><tr><th> Id clasa </th><th> Nume clasa </th></tr>";
	while($row2 = mysqli_fetch_array($resulttable2))
	{
  echo "<tr>";
  echo "<td>" . $row2['id_clasa'] . "</td>";
  echo "<td>" . $row2['nume_clasa'] . "</td>";
  echo "</tr>";
	}
	echo "</table>";
	}
	echo "<br><table ><tr><th> Id materie </th><th> Nume materie </th></tr>";
	while($row1 = mysqli_fetch_array($resulttable1))
	{
  echo "<tr>";
  echo "<td>" . $row1['id_materie'] . "</td>";
  echo "<td>" . $row1['nume_materie'] . "</td>";
  echo "</tr>";
	}
	echo "</table>";
	$conn->Close();
	
	?>
	</div>
	<div class="green box">
	<?php
	
	$servername = "localhost";
	$usernam = "root";
	$password = "";
	$dbname = "catalog online";

//create connection
	$conn = new mysqli($servername, $usernam, $password, $dbname);

//check connection
	if($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	$sqlid = "Select id_scoala FROM admini WHERE username = '$username'";
	$resultid = mysqli_query($conn, $sqlid);
	$rowid = mysqli_fetch_assoc($resultid);
	if(isset($rowid["id_scoala"]))
	{
	$id = $rowid["id_scoala"];
	$sqltable = "Select id_profesor, nume_profesor, prenume_profesor FROM profesori WHERE id_scoala = '$id'";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Id </th><th> Nume </th><th> Prenume </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		echo "<tr>";

  echo "<td>" . $row['id_profesor'] . "</td>";

  echo "<td>" . $row['nume_profesor'] . "</td>";
  
  echo "<td>" . $row['prenume_profesor'] . "</td>";

  echo "</tr>";
	}
	echo "</table>";
	}
	
	$conn->Close();
	
	?>
	<form method="post"> 
        Id profesor:
        <input type="text" name="id_elim"><br>
        <input type="submit" value="Submit" name="submit">
	</form>
	</div>
	</center>
	
	<?php
	
	include "php_functions.php";
	
	$servername = "localhost";
	$usernam = "root";
	$password = "";
	$dbname = "catalog online";

//create connection
	$conn = new mysqli($servername, $usernam, $password, $dbname);

//check connection
	if($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		
	if(isset($_POST['cnp']) && isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['judet']) && isset($_POST['localitate']) && isset($_POST['strada']) && isset($_POST['numar']) && isset($_POST['telefon']) && isset($_POST['email']) && isset($_POST['config']))
	{
		$cnpprof = validate($_POST['cnp']);
		$numeprof = validate($_POST['nume']);
		$prenumeprof = validate($_POST['prenume']);
		$judetprof = validate($_POST['judet']);
		$localitateprof = validate($_POST['localitate']);
		$stradaprof = validate($_POST['strada']);
		$numarprof = validate($_POST['numar']);
		$telefonprof = validate($_POST['telefon']);
		$emailprof = validate($_POST['email']);
		$config = validate($_POST['config']);
	
	if(empty($cnpprof))
	{
		echo "<script type='text/javascript'>alert('Cnp-ul profesorului lipsește!')</script>";
	} else if(empty($numeprof))
	{
		echo "<script type='text/javascript'>alert('Numele profesorului lipsește!')</script>";
	} else if(empty($prenumeprof))
	{
		echo "<script type='text/javascript'>alert('Prenumele profesorului lipsește!')</script>";
	} else if(empty($judetprof))
	{
		echo "<script type='text/javascript'>alert('Județul profesorului lipsește!')</script>";
	} else if(empty($localitateprof))
	{
		echo "<script type='text/javascript'>alert('Localitatea profesorului lipsește!')</script>";
	} else if(empty($stradaprof))
	{
		echo "<script type='text/javascript'>alert('Strada profesorului lipsește!')</script>";
	}else if(empty($numarprof))
	{
		echo "<script type='text/javascript'>alert('Numărul casei profesorului lipsește!')</script>";
	}else if(empty($telefonprof))
	{
		echo "<script type='text/javascript'>alert('Numărul de telefon al profesorului lipsește!')</script>";
	} else if(empty($emailprof))
	{
		echo "<script type='text/javascript'>alert('Email-ul profesorului lipsește!')</script>";
	} else if(empty($config))
	{
		echo "<script type='text/javascript'>alert('Datele de configurare ale profesorului lipsesc!')</script>";
	}
	{
		$sqlidscoala = "SELECT id_scoala FROM admini WHERE username = '$username'";
		$resultidscoala = mysqli_query($conn, $sqlidscoala);
		$rowidscoala = mysqli_fetch_assoc($resultidscoala);
		if(isset($rowidscoala['id_scoala']))
		{
			$idscoala = $rowidscoala["id_scoala"];
			$sql1 = "INSERT INTO `profesori` (`id_scoala`, `cnp`, `nume_profesor`, `prenume_profesor`, `telefon`, `email`) VALUES ($idscoala, $cnpprof, '$numeprof', '$prenumeprof', '$telefonprof', '$emailprof')";
			if($conn->query($sql1) === TRUE)
			{
				$sqlidprof = "SELECT id_profesor FROM profesori WHERE telefon = '$telefonprof'";
				$resultidprof = mysqli_query($conn, $sqlidprof);
				$rowidprof = mysqli_fetch_assoc($resultidprof);
				if(isset($rowidprof['id_profesor']))
				{
					$idprof = $rowidprof["id_profesor"];
					$sql2 = "INSERT INTO `adrese` (`id_profesor`, `judet`, `localitate`, `strada`, `numar`) VALUES ($idprof, '$judetprof', '$localitateprof', '$stradaprof', '$numarprof')";
					$data1 = getusername($numeprof,$idprof.$idscoala);
					$data = md5($data1);
					$sqluser = "UPDATE profesori set username = '$data', password = '$data' WHERE id_profesor='$idprof'";
					if($conn->query($sql2) === TRUE && $conn->query($sqluser) === TRUE)
					{
						$tok = strtok($config," ");
						$var = $tok;
						while($tok!==false)
						{	$var=$tok;
							$tok = strtok(" ");	
							$sql3 = "INSERT INTO `legatura` (`id_profesor`, `id_clasa`, `id_materie`) VALUES ($idprof, $var, $tok)";
							$conn->query($sql3);
							$tok = strtok(" ");
						}
			$to_email = $emailprof;
			$subject = 'Catalog Online';
			$body = "Nume utilizator:$data1 Parolă:$data1";
			$headers = 'From: Catalog Online';
			if(isset($to_email) && isset($subject) && isset($body) && isset($headers))
			{
			mail($to_email, $subject, $body, $headers);
			} 						
					echo "<script type='text/javascript'>alert('Profesorul $prenumeprof $numeprof a fost adăugat cu succes!')</script>";
					header("Refresh:0");
					} else echo "<script type='text/javascript'>alert('Eroare1!')</script>";
				} else echo "<script type='text/javascript'>alert('Eroare2!')</script>";
			} else echo "<script type='text/javascript'>alert('Eroare3!')</script>";
		} else echo "<script type='text/javascript'>alert('Eroare4!')</script>";

	}	
	}
	else if(isset($_POST['id_elim']))
	{
		$idelim = validate($_POST['id_elim']);
		if(empty($idelim))
			echo "<script type='text/javascript'>alert('Id-ul profesorului lipsește!')</script>";
		else
		{
			$sql = "DELETE FROM `profesori` WHERE id_profesor = '$idelim'";
			$sql4 = "SELECT diriginte FROM profesori WHERE id_profesor = '$idelim'";
			$result4 = mysqli_query($conn, $sql4);
			$row4 = mysqli_fetch_assoc($result4);
			if(isset($row4['diriginte']))
			{
			$diriginte = $row4['diriginte'];
			$sql3 = "UPDATE clase set nume_diriginte = NULL, prenume_diriginte = NULL WHERE id_clasa = '$diriginte'";
			if($conn->query($sql) === TRUE)
			{
				$sql2 = "DELETE FROM `adrese` WHERE id_profesor = '$idelim'";
				
				if($conn->query($sql2) === TRUE)
				{
					if($conn->query($sql3) === TRUE)
					{
					echo "<script type='text/javascript'>alert('Profesor eliminat cu succes!')</script>";
					header("Refresh:0");
					} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
	?>
</body>
</html>