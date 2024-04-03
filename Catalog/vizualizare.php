<html>
<link type="text/css" rel="stylesheet" href="clasa.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<head>

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
} 
</script>
</head>	

  	<?php
		if($_GET)
		{
		$idclasa = $_GET['clasa'];
		$username = $_GET['user'];$servername1 = "localhost";
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
		
	?>	
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
	echo "<style>
	.box{
        color: #000000;
        padding: 10px;
        display: none;
        margin-top: 20px;
		font-family: 'Pacifico';
		font-size: 25;
    }
	";
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
		echo ".red$idelev { background: #ffffff; }\n";
		}
	}
	echo "</style>";
		$conn->Close();
		?>
<body>
	<div class="titlu"> <a href=<?php echo "http://theboys.serveirc.com/clasa_dirigentie.php?user=$username&clasa=$idclasa"; ?>>Catalog Online</a> </div>
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
	echo "<select class='select' name='elev' id='elev''>";
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
			echo "<option value=red$idelev>$numeelev $prenumeelev</option>";
		}
	}
	echo "</select>";
		$conn->Close();
		?>
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
	
	$sqltable = "Select id_elev, nume_elev, prenume_elev FROM elevi WHERE id_clasa=$idclasa ORDER BY nume_elev ASC, prenume_elev ASC";
	$resulttable = mysqli_query($conn, $sqltable);
	$summedie=0;
	$cntmedie = 0;
	while($row = mysqli_fetch_array($resulttable))
	{
		$idelev = $row['id_elev'];
		echo "<div class='red$idelev box'>";
		echo "<table border='1'>";
		$sql1 = "SELECT DISTINCT id_materie FROM legatura WHERE id_clasa=$idclasa";
		$result1 = mysqli_query($conn, $sql1);
		echo "<tr>";
		while($row1 = mysqli_fetch_array($result1))
		{
			$idmaterie = $row1['id_materie'];
			$sql2 = "SELECT nume_materie FROM materii WHERE id_materie = '$idmaterie'";
			$result2 = mysqli_query($conn, $sql2);
			$row2 = mysqli_fetch_assoc($result2);
			echo "<td><table border='1'>";
			
			if(isset($row2['nume_materie']))
			{
				$numematerie = $row2['nume_materie'];
				echo "<h4 align='center'>$numematerie</h4>";
				echo "<tr><th>Note</th><th>Teza</th><th>Medie</th><th>Absente</th></tr></td></tr>";
				$sql3 = "SELECT nota FROM note WHERE id_elev=$idelev AND id_materie=$idmaterie ORDER BY data";
				$result3 = mysqli_query($conn, $sql3);
				echo "<tr>";echo "<th>";
				$sum=0;$cnt=0;
				while($row3 = mysqli_fetch_array($result3))
				{
					$nota = $row3['nota'];
					if($nota!=null)
					{
					$sum = $sum+ $nota;
					$cnt++;
					echo $nota; echo"<br/>";
					}
				}echo "</th>";
				$sql4 = "SELECT teza FROM note WHERE id_elev=$idelev AND id_materie=$idmaterie";
				$result4 = mysqli_query($conn, $sql4);
				$ok=0;
				while($row4 = mysqli_fetch_array($result4))
				{
					$teza = $row4['teza'];
					if($teza!==null)
					{
						$ok=$teza;	
					}
				} 
				if($ok===0)
					echo "<th>-</th>";
				else echo "<th>$ok</th>";
				$medie = 0;
				if($cnt>0)
				{
					$medie = $sum/$cnt;
					if($ok!==0)
					{
						$medie = 3*$medie + $ok;
						$medie = $medie/4;
					}
				}
				$medie = round($medie);
				if($medie == 0)
					echo "<th>-</th>";
				else 
				{
					echo "<th>$medie</th>";
					$summedie +=$medie;
					$cntmedie++;
				}
				$sql5 = "SELECT data,motivata FROM absente WHERE id_materie = $idmaterie AND id_elev=$idelev ORDER BY data";
				$result5 = mysqli_query($conn, $sql5);
				echo "<th>";
				while($row5 = mysqli_fetch_array($result5))
				{
					$motiv = $row5['motivata'];
					$data = $row5['data'];
					if($motiv == null)
					{
						echo "$data<br>";	
					} else
					{
						echo "<p style='color:#38bea9'>$data</p>";
					}	
				}
				echo "</th>";
				echo "</tr>";
				echo "</table>";
			}
			
		}
		$sql6 = "SELECT purtare FROM note WHERE id_elev = $idelev AND id_materie = 0";
		$result6 = mysqli_query($conn, $sql6);
		$row6 = mysqli_fetch_assoc($result6);
		$purtare =0;
		if(isset($row6['purtare']))
		{
			$purtare = $row6['purtare'];
			if(!empty($purtare))
			{
			echo "<th>Purtare";
			echo "<br>$purtare</th>";
			}
		}
		
		if($cntmedie>0 && $purtare)
		{
			echo "<th> Medie generală<br>";
			$cntmedie = $cntmedie+1;
			$summedie= $summedie+$purtare;
			$mediegenerala = number_format($summedie/$cntmedie,2);
			echo "$mediegenerala";echo "</th>";
		}
		
		echo "</tr>";
		
  echo "</table>";
echo "</div>";
	}
	$conn->Close();
	
	?>
	</center>
	</body>
</html>