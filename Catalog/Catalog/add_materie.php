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
            <option value="red">Adaugă materie</option>
            <option value="green">Elimină materie</option>
        </select>
    </div>
	<div class = "red box">
<form method = "post">
        Nume materie: 
        <input type="text" name="denumire"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
	</div>
	<div class = "green box">
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
	$sqltable = "Select id_materie, nume_materie FROM materii WHERE id_scoala = '$id'";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Id </th><th> Nume </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		echo "<tr>";

  echo "<td>" . $row['id_materie'] . "</td>";

  echo "<td>" . $row['nume_materie'] . "</td>";

  echo "</tr>";
	}
	echo "</table>";
	}
	
	$conn->Close();
	
	?>
	<form method = "post">
	Id materie:
	<input type="text" name = "id_elim"><br>
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
		$numematerie = validate($_POST['denumire']);
		if(empty($numematerie))
			echo "<script type='text/javascript'>alert('Numele materiei lipsește!')</script>";
		else 
		{
			$sqlnume = "SELECT id_materie FROM materii WHERE LOWER(nume_materie)=LOWER('$numematerie')";
			$resultnume = mysqli_query($conn, $sqlnume);
			if(mysqli_num_rows($resultnume))
			{
				echo "<script type='text/javascript'>alert('Materia există deja!')</script>";
			}
			else
			{
			$idscoala =$id;
			$sql1 = "INSERT INTO `materii` (`id_scoala`, `nume_materie`) VALUES ($idscoala, '$numematerie')";
			if($conn->query($sql1) === TRUE)
			{
				echo "<script type='text/javascript'>alert('Materie adăugată cu succes!')</script>";
			header("Refresh:0");
			}
			else echo "<script type='text/javascript'>alert('Eroare!')</script>";
			}
		}
	}	
	else if(isset($_POST['id_elim']))
	{
		$idelim = validate($_POST['id_elim']);
		if(empty($idelim))
			echo "<script type='text/javascript'>alert('Id-ul materiei lipsește!!')</script>";
		else 
		{
			$sql = "DELETE FROM `materii` WHERE id_materie = '$idelim'";
			if($conn->query($sql) === TRUE)
			{
				echo "<script type='text/javascript'>alert('Materie eliminată cu succes!')</script>";
				header("Refresh:0");
			}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
		}
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
	?>
</body>
</html>