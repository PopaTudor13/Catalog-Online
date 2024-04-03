<?php

	include "php_functions.php";
	
	if(isset($_POST['uname'])&&isset($_POST['password']))
	{
	
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
			echo "<script type='text/javascript'>alert('Logged in as elev');</script>";
			$_SESSION['username'] = $row['username'];
			//header
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	   }
	   else if(mysqli_num_rows($result_profesor) ===1)
	   {
		$row = mysqli_fetch_assoc($result_profesor);
		if($row['username'] === $uname && $row['password'] === $pass)
		{
			echo "<script type='text/javascript'>alert('Logged in as profesor');</script>";
			$_SESSION['username'] = $row['username'];
			//header
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }   
	   }
	   else if(mysqli_num_rows($result_admin) ===1)
	   {
		$row = mysqli_fetch_assoc($result_admin);
		$result = $row["password"];
		echo "<script type='text/javascript'>alert('$result');</script>";
		if($row['username'] === $uname && $row['password'] === $pass)
		{
			header("Location: http://localhost/catalog_online/madmin.php?user=".$uname);
		} else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	   } else { echo "<script type='text/javascript'>alert('Nume de utilizator greșit sau parolă greșită!');</script>"; }
	}
	}
?>