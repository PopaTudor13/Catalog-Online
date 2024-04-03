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
  	<?php
		if($_GET)
		{
	$username = $_GET['user'];
	$idclasa = $_GET['clasa'];
	
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
		$conn1->Close();
	?>
<body>
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
	<a href=<?php echo "http://theboys.serveirc.com/clase.php?user=".$username;?>>Catalog Online</a> 
	</div>	
	<center>
	<br>
	<a class="button" href=<?php echo "http://theboys.serveirc.com/vizualizare.php?user=$username&clasa=$idclasa";?>>Listă elevi</a>
	<style>
	a.button {
		-webkit-appearance: button;
		-moz-appearance: button;
		appearance: button;
		background-color: #38bea9;
		border: 2px solid #38bea9;
		border-radius: 8px;
		text-decoration: none;
		color: white;
		width: 325px;
		height: 50px;
		font-family: "Pacifico";
		margin-top: 100px;
		font-size: 25;
	}
	</style>
	<form method = "post">
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
	echo "<select name='elev'>";
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
	echo "<select name='materie'>";
	echo "<option  value=0>Materii</option>";
		$sql2 = "SELECT DISTINCT id_materie FROM legatura WHERE id_clasa = $idclasa ORDER BY id_materie";
		$result2 = mysqli_query($conn, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$idmaterie = $row2['id_materie'];
			$sqls = "SELECT nume_materie FROM materii WHERE id_materie = '$idmaterie'";
			$results = mysqli_query($conn, $sqls);
			$rows = mysqli_fetch_assoc($results);
			$numematerie = $rows['nume_materie'];
			echo "<option value=$idmaterie>$numematerie</option>";
		}
	echo "</select>";
		$conn->Close();
		?>
	<br>
	
	<select class="select" name="ok">
	 <option>Alegeți o acțiune</option>
	 <option value="red">Motivează absență</option>
	 <option value="green">Adăugă nota la purtare</option>
	</select>
	<div class = "red box">
	Data:
	<input type="date" name="dataam"><br><br>
	<input type="submit" value="Submit" name="submit">
	</div>
	<div class = "green box">
	Nota:
	<input type="number" name="notap" min="1" max="10"><br>
	Data:
	<input type="date" name="datap"><br><br>
	<input type="submit" value="Submit" name="submit">
	</div>
	</form>
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
		if($_POST['elev'] ==0)
			echo "<script type='text/javascript'>alert('Selectați un elev!')</script>";
		else if($_POST['materie'] == 0)
		{
			if(isset($_POST['notap']) && isset($_POST['datap']) && $_POST['ok']==='green')
				{
					$data = validate($_POST['datap']);
					$nota = validate($_POST['notap']);
					$idmaterie1 = $_POST['materie'];
					$idelev1 = $_POST['elev'];
					if(empty($nota))
					 echo "<script type='text/javascript'>alert('Adăugați o notă!')</script>";
				else if(empty($data))
					 echo "<script type='text/javascript'>alert('Selectați o dată!')</script>";
				else 
				{
					$sql = "INSERT INTO `note` (`purtare`, `id_elev`, `id_materie`, `data`) VALUES ($nota, $idelev1, '0', '$data')";
					if($conn->query($sql) === TRUE)
					{
						echo "<script type='text/javascript'>alert('Notă la purtare adăugată cu succes!')</script>";	
					}else echo "<script type='text/javascript'>alert('Eroare!')</script>";
				}
				}
			else echo "<script type='text/javascript'>alert('Selectați o materie!')</script>";
		}
		else
			{
				if(isset($_POST['dataam']) && $_POST['ok']==='red')
				{
					$data = validate($_POST['dataam']);
					$idmaterie1 = $_POST['materie'];
					$idelev1 = $_POST['elev'];
					if(empty($data))
						echo "<script type='text/javascript'>alert('Selectați o dată!')</script>";
					else
					{
					$sql = "UPDATE absente set motivata = 1 WHERE id_materie = $idmaterie1 AND id_elev=$idelev1 AND data='$data'";
					if($conn->query($sql) === TRUE)
						echo "<script type='text/javascript'>alert('Absență motivată cu succes!')</script>";
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