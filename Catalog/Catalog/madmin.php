<html>
<link type="text/css" rel="stylesheet" href="main_admin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<head>
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
</head>
<body>

    <div class="titlu"> Catalog Online </div>
    <center>
        <div><a href=<?php echo "http://theboys.serveirc.com/add_materie.php?user=".$username;?> class="button">Meniu opțiuni materii</a></div>
        <div><a href=<?php echo "http://theboys.serveirc.com/add_clasa.php?user=".$username;?> class="button">Meniu opțiuni clase</a></div>
		<div><a href=<?php echo "http://theboys.serveirc.com/add_profesor.php?user=".$username;?> class="button">Meniu opțiuni profesori</a></div>
		<div><a href=<?php echo "http://theboys.serveirc.com/add_elev.php?user=".$username;?> class="button">Meniu opțiuni elevi</a></div>
    </center>
</body>
</html>