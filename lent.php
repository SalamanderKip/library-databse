<?php
include('core/header.php');
// include 'core/checklogin_member.php';
// require('core/db_connect.php');
// $book_id = $datum = $user_id = "";
//book
$book_id = $_GET['id'];
//user
$user_id = $_SESSION['Sid'];

// echo $bookid;
// echo $_SESSION['id'];
// exit;
$date = date("Y-m-d");
// $dt = new DateTime(null, new DateTimeZone('Europe/Amsterdam'));
//     $datetime = $dt->format('d-m-Y H:i:s');

$sql = "INSERT INTO `uitleen` (`book_id`,`user_id`, `datum`) VALUES ('" . $book_id . "','" . $user_id . "', '". $date ."')";
$result = mysqli_query($con, $sql);
if ($result) {
	echo "gelukt";
} else {
	echo " ";
	echo " Je hebt dit boek geleent je kunt met deze knop inleveren";
}

echo '<button type="button"><a href="return.php?action=delete&bookid=' . $book_id . '">inleverbook</a></button>';