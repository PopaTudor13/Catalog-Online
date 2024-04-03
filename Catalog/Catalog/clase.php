<html>
<link type="text/css" rel="stylesheet" href="clase.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
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
		
		$sqlsql = "SELECT id_profesor FROM profesori WHERE username = '$username'";
		$resultresult = mysqli_query($conn1, $sqlsql);
		if(mysqli_num_rows($resultresult) !==1)
		{
			header("Location: http://theboys.serveirc.com");
		}
		} else header("Location: http://theboys.serveirc.com");
		$sqlsqlsql = "SELECT diriginte FROM profesori WHERE username = '$username'";
		$resultresultresult = mysqli_query($conn1,$sqlsqlsql);
		$rowrowrow = mysqli_fetch_assoc($resultresultresult);
		$idclasa = $rowrowrow['diriginte'];
		$conn1->Close();
	?>
	<div id="meniu" class="meniu">
        <a href=<?php echo "http://theboys.serveirc.com/clase.php?user=".$username;?>>Clase</a>
       <?php
	   if($idclasa)
		   echo "<a href=http://theboys.serveirc.com/clasa_dirigentie.php?user=$username&clasa=$idclasa>Clasă diriginte</a>";
	   ?>
    </div>
    <div class="titlu"> 
        <div class="container" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>	
	<a href=<?php echo "http://theboys.serveirc.com/meniu_profesor.php?user=".$username;?>>Catalog Online</a> </div>
	<center>
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
	$sql1 = "SELECT id_profesor FROM profesori WHERE username = '$username'";
	$result1 = mysqli_query($conn, $sql1);
	if(mysqli_num_rows($result1) ===1)
	{
		$row1 = mysqli_fetch_assoc($result1);
		$idprof = $row1['id_profesor'];
		$sql2 = "SELECT id_clasa,id_materie FROM legatura WHERE id_profesor = $idprof ORDER BY id_clasa";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$valuec = $row2['id_clasa'];
			$valuem = $row2['id_materie'];
			$sql3 = "SELECT nume_clasa FROM clase WHERE id_clasa = $valuec";
			$result3 = mysqli_query($conn, $sql3);
			$row3 = mysqli_fetch_assoc($result3);
			$sql4 = "SELECT nume_materie FROM materii WHERE id_materie = $valuem";
			$result4 = mysqli_query($conn, $sql4);
			$row4 = mysqli_fetch_assoc($result4);
			if(isset($row3['nume_clasa']) && isset($row4['nume_materie']))
			{
				$data2 = $row3['nume_clasa'];
				$data3 = $row4['nume_materie'];
				$sql5 = "SELECT diriginte FROM profesori WHERE diriginte = $valuec AND id_profesor = $idprof";
				$result5 = mysqli_query($conn, $sql5);
				if(mysqli_num_rows($result5) === 1)
				{
			echo "<a href=http://theboys.serveirc.com/clasa.php?user=$username&clasa=$valuec&materie=$valuem class='buttond'>$data2 <div class=materie>$data3</div></a>";
				} else echo "<a href=http://theboys.serveirc.com/clasa.php?user=$username&clasa=$valuec&materie=$valuem class='button'>$data2 <div class=materie>$data3</div></a>";
				}
			}
			
		}
	
	$conn->Close();
	?>
	<br>
	<script>
        var ok=0;
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
    </script>
	</center>
</body>
</html>