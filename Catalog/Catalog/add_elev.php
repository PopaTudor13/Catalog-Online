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
        <select class = "select">
            <option>Alege o acțiune</option>
            <option value="red">Adaugă elev</option>
            <option value="green">Elimină elev</option>
        </select>
    </div>
	<div class="red box">
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
	$sqltable = "Select id_clasa, nume_clasa FROM clase WHERE id_scoala = '$id'";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Id </th><th> Nume </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		echo "<tr>";

  echo "<td>" . $row['id_clasa'] . "</td>";

  echo "<td>" . $row['nume_clasa'] . "</td>";

  echo "</tr>";
	}
	echo "</table>";
	}
	
	$conn->Close();
	
	?>
	<form method="post">
	Id clasă:
	<input type="text" name="id_clasa"><br>
	Cnp:
	<input type="text" name="cnp"><br>
	Număr matricol:
	<input type="text" name="nr_matricol"><br>
	Nume:
	<input type="text" name="nume"><br>
	Prenume:
	<input type="text" name="prenume"><br>
	Nume părinte:
	<input type="text" name="numep"><br>
	Prenume părinte:
	<input type="text" name="prenumep"><br>
	Telefon elev:
	<input type="text" name="telefon"><br>
	Telefon părinte:
	<input type="text" name="telefonp"><br>
	Email elev:
	<input type="text" name="email"><br>
	Email părinte:
	<input type="text" name="emailp"><br>
	Județ:
	<input type="text" name="judet"><br>
	Localitate:
	<input type="text" name="localitate"><br>
	Strada:
	<input type="text" name="strada"><br>
	Număr:
	<input type="text" name="numar"><br>
	<input type="submit" value="Submit" name="submit">
	</form>
	</div>
	<div class="green box">
	<a href=<?php echo "http://theboys.serveirc.com/listaelevi.php?user=".$username;?> class="button">Listă elevi</a> 
	<form method="post">
	Id elev:
	<input type="text" name="id_elim"><br>
	<input type="submit" value="Submit" name="submit">
	</form>
	</div>
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
	if(isset($_POST['id_clasa']) && isset($_POST['cnp']) && isset($_POST['nr_matricol']) && isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['numep']) && isset($_POST['prenumep']) && isset($_POST['telefon']) && isset($_POST['telefonp']) && isset($_POST['email']) && isset($_POST['emailp']) && isset($_POST['judet']) && isset($_POST['localitate']) && isset($_POST['strada']) && isset($_POST['numar']))
	{
		$idclasa = validate($_POST['id_clasa']);
		$cnpelev = validate($_POST['cnp']);
		$nrmatelev = validate($_POST['nr_matricol']);
		$numeelev = validate($_POST['nume']);
		$prenumeelev = validate($_POST['prenume']);
		$numeparinte = validate($_POST['numep']);
		$prenumeparinte = validate($_POST['prenumep']);
		$telefonelev = validate($_POST['telefon']);
		$telefonparinte = validate($_POST['telefonp']);
		$emailelev = validate($_POST['email']);
		$emailparinte = validate($_POST['emailp']);
		$judet = validate($_POST['judet']);
		$localitate = validate($_POST['localitate']);
		$strada = validate($_POST['strada']);
		$numar = validate($_POST['numar']);
		if(empty($idclasa))
		{
			echo "<script type='text/javascript'>alert('Id-ul clasei lipsește!')</script>";
		} else if(empty($cnpelev))
		{
			echo "<script type='text/javascript'>alert('CNP-ul elevului lipsește!')</script>";
		} else if(empty($nrmatelev))
		{
			echo "<script type='text/javascript'>alert('Numărul matricol al elevului lipsește!')</script>";
		} else if(empty($numeelev))
		{
			echo "<script type='text/javascript'>alert('Numele elevului lipsește!')</script>";
		} else if(empty($prenumeelev))
		{
			echo "<script type='text/javascript'>alert('Prenumele elevului lipsește!')</script>";
		} else if(empty($numeparinte))
		{
			echo "<script type='text/javascript'>alert('Numele părintelui lipsește!')</script>";
		} else if(empty($prenumeparinte))
		{
			echo "<script type='text/javascript'>alert('Prenumele părintelui lipsește!')</script>";
		} else if(empty($telefonelev))
		{
			echo "<script type='text/javascript'>alert('Numărul de telefon al elevului lipsește!')</script>";
		} else if(empty($telefonparinte))
		{
			echo "<script type='text/javascript'>alert('Numărul de telefon al părintelui lipsește!')</script>";
		} else if(empty($emailelev))
		{
			echo "<script type='text/javascript'>alert('Email-ul elevului lipsește!')</script>";
		} else if(empty($emailparinte))
		{
			echo "<script type='text/javascript'>alert('Email-ul părintelui lipsește!')</script>";
		} else if(empty($judet))
		{
			echo "<script type='text/javascript'>alert('Județul	elevului lipsește!')</script>";
		} else if(empty($localitate))
		{
			echo "<script type='text/javascript'>alert('Localitatea	elevului lipsește!')</script>";
		} else if(empty($strada))
		{
			echo "<script type='text/javascript'>alert('Strada elevului lipsește!')</script>";
		} else if(empty($numar))
		{
			echo "<script type='text/javascript'>alert('Numărul casei elevului lipsește!')</script>";
		} else
		{
			$sql = "SELECT id_scoala FROM admini WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			if(isset($row['id_scoala']))
			{
				$idscoala = $row['id_scoala'];
				$sql2 = "INSERT INTO `elevi` (`id_scoala`, `id_clasa`,`cnp`,`nr_matricol`,`nume_elev`,`prenume_elev`,`nume_parinte`,`prenume_parinte`,`telefon`,`telefon_parinte`,`email`,`email_parinte`) VALUES ($idscoala,$idclasa, $cnpelev, '$nrmatelev','$numeelev','$prenumeelev','$numeparinte','$prenumeparinte','$telefonelev','$telefonparinte','$emailelev','$emailparinte')";
				if($conn->query($sql2) === true)
				{
					$sql3 = "SELECT id_elev FROM elevi WHERE telefon = '$telefonelev'";
					$result3 = mysqli_query($conn, $sql3);
					$row3 = mysqli_fetch_assoc($result3);
					if(isset($row3['id_elev']))
					{
						$idelev = $row3['id_elev'];
						$sql4 = "INSERT INTO `adrese` (`id_elev`,`judet`,`localitate`,`strada`,`numar`) VALUES ($idelev, '$judet','$localitate','$strada','$numar')";
						if($conn->query($sql4) === true)
						{
							$data1 = getusername($numeelev, $idelev);
							$data = md5($data1);
							$sql5 = "UPDATE elevi SET username = '$data', password = '$data' WHERE id_elev = $idelev";
							if($conn->query($sql5) === true)
							{
			$to_email = $emailelev;
			$subject = 'Catalog Online';
			$body = "Nume utilizator:$data1 Parolă:$data1";
			$headers = 'From: Catalog Online';
			if(isset($to_email) && isset($subject) && isset($body) && isset($headers))
			{
			mail($to_email, $subject, $body, $headers);
			} 
			$to_email = $emailparinte;
			$subject = 'Catalog Online';
			$body = "Nume utilizator:$data1 Parolă:$data1";
			$headers = 'From: Catalog Online';
			if(isset($to_email) && isset($subject) && isset($body) && isset($headers))
			{
			mail($to_email, $subject, $body, $headers);
			} 
								echo "<script type='text/javascript'>alert('Elevul $prenumeelev $numeelev a fost adăugat cu succes!')</script>";
								header("Refresh:0");
							}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
						}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
					}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}
		}
	} else if(isset($_POST['id_elim']))
	{
		$idelim = validate($_POST['id_elim']);
		if(empty($idelim))
		{
			echo "<script type='text/javascript'>alert('Id-ul elevului lipsește!')</script>";
		} else
		{
			$sql1 = "DELETE FROM `elevi` WHERE id_elev='$idelim'";
			$sql2 = "DELETE FROM `adrese` WHERE id_elev = '$idelim'";
			if($conn->query($sql1) && $conn->query($sql2))
			{
				echo "<script type='text/javascript'>alert('Elev eliminat cu succes!')</script>";
			}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
		}
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
	?>
	</center>
</body>
</html>