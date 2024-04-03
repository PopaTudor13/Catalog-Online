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
	<div class="titlu"> <a href=<?php echo "http://theboys.serveirc.com/add_elev.php?user=".$username;?>>Catalog Online</a> </div>
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
		
	$sqlid = "Select id_scoala FROM admini WHERE username = '$username'";
	$resultid = mysqli_query($conn, $sqlid);
	$rowid = mysqli_fetch_assoc($resultid);
	if(isset($rowid["id_scoala"]))
	{
	$id = $rowid["id_scoala"];
	$sqltable = "Select id_elev, nume_elev, prenume_elev, id_clasa FROM elevi WHERE id_scoala = '$id' ORDER BY nume_elev ASC, prenume_elev ASC";
	$resulttable = mysqli_query($conn, $sqltable);
	
	echo "<table border='1'><tr><th> Nume </th><th> Id elev </th> <th> Id clasă </th></tr>";
	while($row = mysqli_fetch_array($resulttable))
	{
		echo "<tr>";

  echo "<td>" . $row['nume_elev'] . " " . $row['prenume_elev'] . "</td>";

  echo "<td>" . $row['id_elev'] . "</td>";
  
  echo "<td>" . $row['id_clasa'] . "</td>";

  echo "</tr>";
	}
	echo "</table>";
	}
	
	$conn->Close();
	
	?>
	</center>
</body>
</html>