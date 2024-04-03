<html>
<link type="text/css" rel="stylesheet" href="meniuprofesor.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
<head>
    
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
		
		$sqlsql = "SELECT id_profesor FROM profesori WHERE username = '$username'";
		$resultresult = mysqli_query($conn1, $sqlsql);
		if(mysqli_num_rows($resultresult) !==1)
		{
			header("Location: http://theboys.serveirc.com");
		}
		} else header("Location: http://theboys.serveirc.com");
		$sqll = "SELECT diriginte FROM profesori WHERE username = '$username'";
		$resultt = mysqli_query($conn1, $sqll);
		$roww = mysqli_fetch_assoc($resultt);
		$idclasa = $roww['diriginte'];
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
    Catalog Online </div>
    <div class="nori">
        <img id="nor1" src="https://i.postimg.cc/Sx6yBd20/gionutganditor.png" alt="nortext">
        <div class="text">
            <div>Bine ai revenit</div>
            <div><?php 
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
		$sql = "SELECT nume_profesor, prenume_profesor FROM profesori WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($row['prenume_profesor']) && isset($row['nume_profesor']))
		{
			$nume = $row['nume_profesor'];
			$prenume = $row['prenume_profesor'];
			echo "$prenume $nume!";
		}
		$conn->Close();
			?></div>
        </div>
    </div>
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
</body>

</html>