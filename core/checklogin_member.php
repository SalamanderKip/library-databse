<?php
$loginError = false;
if (!isset($_SESSION['Sid']) || $_SESSION['Sid'] == "" || $_SESSION['Sid'] == '0' || 
	!isset($_SESSION['Semail']) || $_SESSION['Semail'] == "" || $_SESSION['Semail'] == '0' )
{
	$loginError = true;
}

if ($loginError) {
	exit('<meta http-equiv="refresh" content="2; URL=login.php">');
}
