<?php
// Connect to database
require 'db_connect.php';
// Zet account in database
if (isset($_POST['submit'])) {
	// Get POST values
	$firstname = mysqli_real_escape_string($con, trim($_POST['firstname']));
	$lastname = mysqli_real_escape_string($con, trim($_POST['lastname']));
	$email = mysqli_real_escape_string($con, trim($_POST['email']));
	$password  = mysqli_real_escape_string($con, trim($_POST['password']));
	// Get current datetime
	$dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
	$datetime = $dt->format('d-m-Y H:i:s');
	// Keep track of validated values
	$valid = array('firstname' => false, 'lastname' => false, 'email' => false, 'password' => false);
	// Validate firstname
	if (!empty($firstname)) {
		if (strlen($firstname) >= 2 && strlen($firstname) <= 40) {
			if (!preg_match('/[^a-zA-Z\s]/', $firstname)) {
				$valid['firstname'] = true;
				echo 'Firstname is OK! <br/>';
			} else {
				echo 'Firstname can contain only letters!<br/>';
			}
		} else {
			echo 'Firstname must be between 2 and 40 characters long!<br/>';
		}
	} else {
		echo 'Firstname cannot be blank!<br/>';
	}
	// Validate lastname
	if (!empty($lastname)) {
		if (strlen($lastname) >= 2 && strlen($lastname) <= 40) {
			if (!preg_match('/[^a-zA-Z\s]/', $lastname)) {
				$valid['lastname'] = true;
				echo 'Lastname is OK! <br/>';
			} else {
				echo 'Lastname can contain only letters!<br/>';
			}
		} else {
			echo 'Lastname must be between 2 and 40 characters long!<br/>';
		}
	} else {
		echo 'Lastname cannot be blank!<br/>';
	}
	// Validate email
	if (!empty($email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$valid['email'] = true;
			echo 'E-mail is OK!<br/>';
		} else {
			echo 'E-mail is invalid!<br/>';
		}
	} else {
		echo 'E-mail cannot be blank!<br/>';
	}
	// Validate password
	if (!empty($password)) {
		if (strlen($password) >= 5 && strlen($password) <= 32) {
			$valid['password'] = true;
			$password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
			echo 'Password is OK!<br/>';
		} else {
			echo 'Password must be between 5 and 32 characters!<br/>';
		}
	} else {
		echo 'Password cannot be blank!<br/>';
	}
}

if ($valid['firstname'] && $valid['lastname'] && $valid['email'] && $valid['password']) {
	$query = "ALTER TABLE `user` CHANGE `registration` `registration` VARCHAR(50) NOT NULL";
	$query = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `registration`) VALUES ('$firstname','$lastname','$email','$password','$datetime')";
	$result = mysqli_query($con, $query) or die('Cannot insert data into database. ' . mysqli_error($con));
	if ($result) {
		echo 'Data inserted into database.';
		mysqli_free_result($result);
		header('Location:../login.php');
	}
}
// Kan iets deleten uit database
if (isset($_POST['btnupdate'])) {
	$id = $_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname  = $_POST['lastname'];
	$email     = $_POST['email'];
	$password  = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 8]);

	$query  = "UPDATE `user` SET firstname='$firstname', lastname='$lastname', email='$email', password='$password' WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot update data in database. ' . mysqli_error($con));
	// $user   = mysqli_fetch_assoc($result);
	// if ($result) header('Location: ../admin.php');
}
// Check if DELETE is requested
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	$query = "DELETE FROM `user` WHERE id=$id";
	$result = mysqli_query($con, $query) or die('Cannot delete data from database. ' . mysqli_error($con));
	if ($result) {
		echo 'Data deleted from database.';
		mysqli_free_result($result);
		header('Location: ../admin.php');
	}
}
