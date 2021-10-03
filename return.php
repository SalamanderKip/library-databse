<?php
include('core/header.php');
//user
$id = $_SESSION['Sid'];
// action van url
$action = $_GET["action"];

// delete from the database 
if ($action == "delete") {
    $deleteBookId = $_GET["bookid"];
    $query = "DELETE FROM `uitleen` WHERE book_id = $deleteBookId";

    $result = mysqli_query($con, $query) or die('Cannot delete data from database. ' . mysqli_error($con));


    if ($result) {
        echo ' <span style="color:Green;text-align:center;">' . "Book has been returned.<br>";
    } else {
        echo ' <span style="color:red;text-align:center;">' . "Error try again.";
    }
}

$sql = $con->prepare("select uitleen.book_id, uitleen.user_id, uitleen.datum, books.title, books.isbn13 FROM uitleen inner join books ON books.id = uitleen.book_id WHERE user_id = " . $_SESSION['Sid']);

if ($sql === false) {
    echo mysqli_error($con);
} else {
    $sql->bind_result($book_id, $user_id, $datum, $title, $isbn13);
    if ($sql->execute()) {
        $sql->store_result();
        while ($sql->fetch()) {

            echo "bookid: " . $book_id ;
            echo " date: " . $datum ;
            echo " title of book: " . $title ;
            echo "<button class='btn btn-default'><a href='return.php?action=delete&bookid=$book_id'>Return</a></button>";
            echo "<br>";
        }
    }
}