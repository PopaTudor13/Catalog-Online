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
	.blue{ background: #ffffff; }
	.yellow{ background: #ffffff; }
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

        <select class="select">
            <option>Alege o acțiune</option>
            <option value="red">Adaugă clasă</option>
            <option value="green">Elimină clasă</option>
			<option value="blue">Adaugă diriginte</option>
			<option value="yellow">Elimină diriginte</option>
        </select>
    </div>
	<div class="red box">
	<form method="post"> 
        Nume clasă: 
        <input type="text" name="denumire"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
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
	<input type="text" name="id_elim"><br>
	<input type="submit" value="Submit" name="submit">
	</form>	
	</div>
	<div class="blue box">
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
	$sqltable = "Select id_clasa, nume_clasa, nume_diriginte, prenume_diriginte FROM clase WHERE id_scoala = '$id'";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Id </th><th> Nume clasă </th><th> Profesor diriginte </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		echo "<tr>";

  echo "<td>" . $row['id_clasa'] . "</td>";

  echo "<td>" . $row['nume_clasa'] . "</td>";
  
  echo "<td>" . $row['nume_diriginte'] . " " . $row['prenume_diriginte'];

  echo "</tr>";
	}
	echo "</table>"; echo "<br>";
	$id1 = $rowid["id_scoala"];
	$sqltable1 = "Select id_profesor, nume_profesor, prenume_profesor FROM profesori WHERE id_scoala = '$id'";
	$resulttable1 = mysqli_query($conn, $sqltable1);	
	echo "<table border='1'><tr><th> Id </th><th> Nume </th><th> Prenume </th></tr>";
	while($row1 = mysqli_fetch_array($resulttable1))
	{
		echo "<tr>";

  echo "<td>" . $row1['id_profesor'] . "</td>";

  echo "<td>" . $row1['nume_profesor'] . "</td>";
  
  echo "<td>" . $row1['prenume_profesor'] . "</td>";

  echo "</tr>";
	}
	echo "</table>";
	}
	$conn->Close();
	
	?>
	<form method="post">
	Id clasa:
	<input type="text" name="id_clasa_adauga"><br>
	Id profesor:
	<input type="text" name="id_prof_adauga"><br>
	<input type="submit" value="Submit" name="submit">
	</form>
	</div>
	<div class="yellow box">
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
	$sqltable = "Select id_clasa, nume_clasa, nume_diriginte, prenume_diriginte FROM clase WHERE id_scoala = '$id'";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Id </th><th> Nume clasă 	</th><th> Profesor diriginte </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
  echo "<tr>";

  echo "<td>" . $row['id_clasa'] . "</td>";

  echo "<td>" . $row['nume_clasa'] . "</td>";
  
  echo "<td>" . $row['nume_diriginte'] . " " . $row['prenume_diriginte'];

  echo "</tr>";
	}
	echo "</table>";
	}
	
	$conn->Close();
	
	?><br>
	<form method="post">
	Id clasa:
	<input type="text" name="id_clasa_elim"><br>
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
	
	if(isset($_POST['denumire']))
	{
		$numeclasa = validate($_POST['denumire']);
		
		if(empty($numeclasa))
			echo "<script type='text/javascript'>alert('Numele clasei lipsește!')</script>";
		else
		{
			$sql1 = "SELECT id_scoala FROM admini WHERE username = '$username'";
			$result1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_assoc($result1);
			
			if(isset($row1["id_scoala"]))
			{
				$idscoala = $row1["id_scoala"];
				$sql2 = "INSERT INTO `clase` (`id_scoala`, `nume_clasa`) VALUES ($idscoala, '$numeclasa')";
				if($conn->query($sql2) === TRUE)
				{
					echo "<script type='text/javascript'>alert('Clasa $numeclasa a fost adăugată cu succes!')</script>";
					header("Refresh:0");
				} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}
		}
	} else if(isset($_POST['id_elim']))
	{
		
		$idelim = validate($_POST['id_elim']);
	
		if(empty($idelim))
		{
			echo "<script type='text/javascript'>alert('Id-ul clasei lipsește!')</script>";
		}
		else
		{
			$sqldirig = "UPDATE profesori set diriginte = NULL WHERE diriginte = '$idelim'";
			if($conn->query($sqldirig) === TRUE)
			{
				$sqlclasa = "DELETE FROM `clase` WHERE id_clasa = '$idelim'";
				if($conn->query($sqlclasa) === TRUE)
				{
					echo "<script type='text/javascript'>alert('Clasă eliminată cu succes!')</script>";
					header("Refresh:0");
				} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
		}
	} else if(isset($_POST['id_clasa_adauga']) && isset($_POST['id_prof_adauga']))
	{
		$idclasa = validate($_POST['id_clasa_adauga']);
		$idprof = validate($_POST['id_prof_adauga']);
		if(empty($idclasa))
		{
			echo "<script type='text/javascript'>alert('Id-ul clasei lipsește!')</script>";
		} else if(empty($idprof))
		{
			echo "<script type='text/javascript'>alert('Id-ul profesorului lipsește!')</script>";
		}
		else 
		{
			$sql123 = "SELECT nume_profesor, prenume_profesor FROM profesori WHERE id_profesor = '$idprof'";
			$result123 = mysqli_query($conn, $sql123);
			$row123 = mysqli_fetch_assoc($result123);
			if(isset($row123['nume_profesor']) && isset($row123['prenume_profesor']))
			{
				$numedirig = $row123['nume_profesor'];
				$prenumedirig = $row123['prenume_profesor'];
				$select = "SELECT id_clasa FROM clase WHERE LOWER(nume_diriginte) = LOWER('$numedirig') AND LOWER(prenume_diriginte) = LOWER('$prenumedirig')";
				$resultselect = mysqli_query($conn, $select);
				if(mysqli_num_rows($resultselect) === 0)
				{
				$sql2 = "UPDATE clase set nume_diriginte='$numedirig', prenume_diriginte='$prenumedirig' WHERE id_clasa = '$idclasa'";
				$sql3 = "UPDATE profesori set diriginte = $idclasa WHERE id_profesor = $idprof";
				if($conn->query($sql2) && $conn->query($sql3))
				{
					echo "<script type='text/javascript'>alert('Diriginte adăugat cu succes!')</script>";
					header("Refresh:0");
				} else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}else echo "<script type='text/javascript'>alert('Profesorul este deja diriginte!')</script>";
			} else echo "<script type='text/javascript'>alert('Profesorul nu există!')</script>";
		}
	} else if(isset($_POST['id_clasa_elim']))
	{
		$idclasa = validate($_POST['id_clasa_elim']);
		if(empty($idclasa))
		{
			echo "<script type='text/javascript'>alert('Id-ul clasei lipsește!')</script>";
		} else
		{
			$sql1 = "UPDATE clase set nume_diriginte = NULL, prenume_diriginte = NULL WHERE id_clasa = '$idclasa'";
			$sql2 = "UPDATE profesori set diriginte = NULL WHERE diriginte = '$idclasa'";
			if($conn->query($sql1))
			{
				$conn->query($sql2);
				echo "<script type='text/javascript'>alert('Diriginte eliminat cu succes!')</script>";
				header("Refresh:0");
			}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
		} 
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
	
	?>
</body>
</html>