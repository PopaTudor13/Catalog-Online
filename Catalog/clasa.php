<html>
<link type="text/css" rel="stylesheet" href="clasa.css">
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
<script>
        var ok=0, n=0;
        function openNav() {
            document.getElementById("meniu").style.width = "250px";
            document.body.style.backgroundColor = "rgba(0,0,0,0)";
            ok=1;
        }
        function closeNav() {
            document.getElementById("meniu").style.width = "0";
            document.body.style.backgroundColor = "white";
            ok=0;
        }
        function myFunction(x) {
            x.classList.toggle("change");
            if(ok==0)
                openNav();
            else
                closeNav();
        }
        function resetElement() {
            if(n==0)
            {
                document.getElementById("hidden").style.display = "block";
                n=1;
            }
            else
            {
                document.getElementById("hidden").style.display = "none";
                n=0;
            }
        }
</script>
</head>
<body>
  	<?php
		if($_GET)
		{
	$username = $_GET['user'];
	$idclasa = $_GET['clasa'];
	$idmaterie = $_GET['materie'];
	
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
		
		$sqlsql = "SELECT id_profesor FROM profesori WHERE username = '$username'";
		$resultresult = mysqli_query($conn1, $sqlsql);
		if(mysqli_num_rows($resultresult) !==1)
		{
			header("Location: http://theboys.serveirc.com");
		}
		} else header("Location: http://theboys.serveirc.com");
		$sql = "SELECT diriginte FROM profesori WHERE username = '$username'";
		$result = mysqli_query($conn1, $sql);
		$row = mysqli_fetch_assoc($result);
		$data = $row['diriginte'];
		if($data === $idclasa)
			$ok=1;
		else $ok=0;
		
		$conn1->Close();
	?>
	<div id="meniu" class="meniu">
        <a href=<?php echo "http://theboys.serveirc.com/clase.php?user=".$username;?>>Clase</a>
       <?php
	   if($idclasa)
		   echo "<a href=http://theboys.serveirc.com/clasa_dirigentie.php?user=$username&clasa=$data>Clasă diriginte</a>";
	   ?>
    </div>
    <div class="titlu"> 
        <div class="container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
     </div>	
	<a href=<?php echo "http://theboys.serveirc.com/clase.php?user=".$username;?>>Catalog Online</a> 
	</div>
	
	<center>
	<form method="post">
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
	echo "<select name='artificial'>";
	echo "<option  value=0>Alegeți un elev</option>";
	$sql1 = "SELECT id_profesor FROM profesori WHERE username = '$username'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
	if(isset($row1['id_profesor']))
	{
		$idprof = $row1['id_profesor'];
		$sql2 = "SELECT nume_elev, prenume_elev, id_elev FROM elevi WHERE id_clasa = $idclasa ORDER BY nume_elev, prenume_elev";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$numeelev = $row2['nume_elev'];
			$prenumeelev = $row2['prenume_elev'];
			$idelev = $row2['id_elev'];
			$idelev = $row2['id_elev'];
			echo "<option value=$idelev>$numeelev $prenumeelev</option>";
		}
	}
	echo "</select>";
		$conn->Close();
		?><br>
	<select class="select" name="ok">
	 <option>Alegeți o acțiune</option>
	 <option value="red">Adăugă notă</option>
	 <option value="green">Adăugă absență</option>
	 <option value="yellow">Adăugă teză</option>
	</select>
	<div class="red box">
	Nota:
	<input type="number" name="nota" min="1" max="10"><br>
	Data:
	<input type="date" name="datan"><br><br>
	<input type="submit" value="Submit" name="submit">
	
	</div>
	<div class="green box">

	Data:
	<input type="date" name="dataa"><br><br>
	<input type="submit" value="Submit" name="submit">
	
	</div>
	<div class="yellow box">

	Nota:
	<input type="number" name="notat" min="1" max="10"><br>
	Data:
	<input type="date" name="datant"><br><br>
	<input type="submit" value="Submit" name="submit">

	</div>
	</form>
	<br>
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
		
	$sqltable = "Select id_elev, nume_elev, prenume_elev FROM elevi WHERE id_clasa = '$idclasa' ORDER BY nume_elev ASC, prenume_elev ASC";
	$resulttable = mysqli_query($conn, $sqltable);
	echo "<table border='1'><tr><th> Nume </th><th> Note </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		$ide = $row['id_elev'];
		$sqlsql = "SELECT nota, purtare, teza FROM note where id_materie='$idmaterie' AND id_elev='$ide' ORDER BY data";
		$resultsqlsql = mysqli_query($conn, $sqlsql);
	echo "<tr>";

  echo "<td>" . $row['nume_elev'] . " " . $row['prenume_elev'] . "</td>"; echo "<td>";
		while($rowrow = mysqli_fetch_array($resultsqlsql))
		{
 	if($rowrow['nota'] == null && $rowrow['purtare']!= null)
  echo $rowrow['purtare']."(purtare) ";
			else if($rowrow['nota'] == null && $rowrow['teza']!= null)
				echo $rowrow['teza']."(teza) ";
			else echo $rowrow['nota']." ";
		} 
	echo "</td>";
  echo "</tr>";
	}
	echo "</table>";
	
	$conn->Close();
	
	?>
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
	if(isset($_POST['submit']))
		{
		if($_POST['artificial']==0)
			echo "<script type='text/javascript'>alert('Selectați un elev!')</script>";
		else
		{
			$idelev = $_POST['artificial'];
			if(isset($_POST['nota']) && isset($_POST['datan']) && $_POST['ok']==='red')
			{
				$nota = validate($_POST['nota']);
				$data = validate($_POST['datan']);
				if(empty($nota))
					 echo "<script type='text/javascript'>alert('Adăugați o notă!')</script>";
				else if(empty($data))
					 echo "<script type='text/javascript'>alert('Selectați o dată!')</script>";
				else 
				{
					$sql = "INSERT INTO `note` (`id_elev`, `id_materie`, `nota`, `data`) VALUES ($idelev, $idmaterie, $nota, '$data')";
					if($conn->query($sql) === TRUE)
					{echo "<script type='text/javascript'>alert('Notă adăugată cu succes!')</script>";header("Refresh:0");}
					else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}
			}else if(isset($_POST['dataa']) && $_POST['ok']==='green')
			{
				$data = validate($_POST['dataa']);
				if(empty($data))
					 echo "<script type='text/javascript'>alert('Selectați o dată!')</script>";
				else 
				{
					$sql = "INSERT INTO `absente` (`id_elev`, `id_materie`, `data`) VALUES ($idelev, $idmaterie, '$data')";
					if($conn->query($sql) === TRUE)
					{echo "<script type='text/javascript'>alert('Absență adăugată cu succes!')</script>";header("Refresh:0");}
					else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}
			}else if(isset($_POST['notat']) && isset($_POST['datant']) && $_POST['ok']==='yellow')
			{
				$nota = validate($_POST['notat']);
				$data = validate($_POST['datant']);
				if(empty($nota))
					 echo "<script type='text/javascript'>alert('Adăugați o notă!')</script>";
				else if(empty($data))
					 echo "<script type='text/javascript'>alert('Selectați o dată!')</script>";
				else 
				{
					$sql = "INSERT INTO `note` (`id_elev`, `id_materie`,`teza`, `data`) VALUES ($idelev, $idmaterie, $nota, '$data')";
					if($conn->query($sql) === TRUE)
					{echo "<script type='text/javascript'>alert('Notă teză adăugată cu succes!')</script>";header("Refresh:0");}
					else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}
			}
		} 
		}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
	?>

</body>
</html>