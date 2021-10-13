<?php
session_start();

// Variablen aanmaken voor de databaseconnectie
$dbhost = "localhost";
$dbuser = "xvwolkne_library";
$dbpass = "library123!";
$dbname = "xvwolkne_library";

// Connectie instellen
$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Wanneer er een error optreed, geef een error en stop de code
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","https://salamanderkip.nl/library/");
define("BASEURL_CMS","https://salamanderkip.nl/library/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}