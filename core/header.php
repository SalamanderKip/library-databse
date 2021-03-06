<?php
    include($_SERVER['DOCUMENT_ROOT'].'/leerjaar2/periode1/Database/webdev-base-webshop/core/db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop met een leuke naam</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mt-2">
                    <a href="index.php" type="button" class="btn btn-outline-warning mr-2">Home</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="/library/admin" type="button" class="btn btn-outline-warning mr-2">Admin CRUD</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="/library/register.php" type="button" class="btn btn-outline-warning mr-2">Register</a>
                </li>
                <li class="nav-item mt-2">
                    <a href="/library/logout.php" type="button" class="btn btn-outline-warning mr-2">Logout</a>
                </li>
            </ul>
            <?php
            ?>
        </div>
</nav>