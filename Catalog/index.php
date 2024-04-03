<html>
<style>
    body{
    background-color: #38bea9;
    }    
</style>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="height=device-height, initial-scale=1.0">
    <style>
        @media screen and (max-width:600) {
            img{
                width: 100%;
            }
            form{
                width: 100%;
            }
            p{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="logo">
        <center><img src="https://i.postimg.cc/NMFYJ4qw/icon1.png"></center>
        <center><p>Catalog Online</p></center>
        <style>
            img{
                margin-top: 0;
                width: 50%;
                max-width: 500px;
                min-width: 300;
                height: auto;
                margin-bottom: 0;
            }
            p{
                font-family: 'Pacifico';
                font-size: 47;
                color: white;
                margin-top: 0;
                width: 300;
            }
        </style>
    </div>  
    <div class="login">
        <center><form method="post"> 
            Nume utilizator: <br>
            <input type="text" name="uname"><br>
            Parola: <br>
            <input type="password" name="password"><br>
            <br>
            <input type="submit" value="Submit" name="submit">
        </form></center>
<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "catalog online";

//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
	if($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
		if(isset($_POST['uname'])&&isset($_POST['password']))
	{
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
		
	if(empty($uname))
	{
		echo "<script type='text/javascript'>alert('Nume utilizator lipsă!');</script>";
	}	
	else if(empty($pass))
		{
			echo "<script type='text/javascript'>alert('Parolă lipsă!');</script>";
		}
	else 
	{
		$uname = md5($uname);
		$pass = md5($pass);
	   $sql_elev = "SELECT * FROM elevi WHERE username='$uname' AND password='$pass'";	
	   $sql_admin = "SELECT * FROM admini WHERE username='$uname' AND password='$pass'";
	   $sql_profesor = "SELECT * FROM profesori WHERE username='$uname' AND password='$pass'";
	   
	   $result_elev = mysqli_query($conn, $sql_elev);
	   $result_admin = mysqli_query($conn, $sql_admin);
	   $result_profesor = mysqli_query($conn, $sql_profesor);
	   
	   if(mysqli_num_rows($result_elev) ===1)
	   {
		$row = mysqli_fetch_assoc($result_elev);
		if($row['username'] === $uname && $row['password'] === $pass)
		{
			header("Location: http://theboys.serveirc.com/main_elev.php?user=".$uname);
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	   }
	   else if(mysqli_num_rows($result_profesor) ===1)
	   {
		$row = mysqli_fetch_assoc($result_profesor);
		if($row['username'] === $uname && $row['password'] === $pass)
		{
			header("Location: http://theboys.serveirc.com/meniu_profesor.php?user=".$uname);
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }   
	   }
	   else if(mysqli_num_rows($result_admin) ===1)
	   {
		$row = mysqli_fetch_assoc($result_admin);
		$result = $row["password"];
		echo "<script type='text/javascript'>alert('$result');</script>";
		if($row['username'] === $uname && $row['password'] === $pass)
		{
			header("Location: http://theboys.serveirc.com/madmin.php?user=".$uname);
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	   } else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	}
	}
	echo "<script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}</script>";
	$conn->Close();
?>
<style>
            form{
                font-family: "Pacifico";
                color: white;
                font-size: 25;
                width: 300;
            }
            input{
                border: 2px solid white;
                border-radius: 8px;
                width: 300;
                height: 30;
                font-size: 25;
                margin-bottom: 10;
            }
            input[type="submit"]{
                    border: 2px solid white;
                    background-color: white;
                    border-radius: 8px;
                    width: 300;
                    height: 50;
                    font-family: "Pacifico";
                    font-size: 20;
                    margin-top: -30;
                }
        </style>
    </div>
</body>
</html>