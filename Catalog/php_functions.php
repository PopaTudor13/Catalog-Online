<?php
		function validate($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		
		function getusername($nume, $id)
		{
			$nume = strtolower($nume);
			$user = $nume.$id;
			
			return $user;
		}
?>