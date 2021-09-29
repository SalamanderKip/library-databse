<?php

// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');
include('book-menu.php');
?>

<h1>add book</h1>

<?php
if (isset($_POST['submit']) && $_POST['submit'] != "") {
    $title = $con->real_escape_string($_POST['title']);
    $author = $con->real_escape_string($_POST['author']);
    $isbn13 = $con->real_escape_string($_POST['isbn13']);
    $format = $con->real_escape_string($_POST['format']);
    $publisher = $con->real_escape_string($_POST['publisher']);
    $pages = $con->real_escape_string($_POST['pages']);
    $dimensions = $con->real_escape_string($_POST['dimensions']);
    $overview = $con->real_escape_string($_POST['overview']);

    echo "dit is mijn title" . ($_POST['format']);
    // if (isset($_POST['active'])) {
    //     $active = $con->real_escape_string($_POST['active']);
    // } else {
    //     $active = 0; 
    // }

    $liqry = $con->prepare("INSERT INTO books (title, author, isbn13, format, publisher, pages, dimensions, overview) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($liqry === false) {
        echo mysqli_error($con);
    } else {
        $liqry->bind_param('ssississ', $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
        if ($liqry->execute()) {
            echo "The book " . $title . " is toegevoegd.";
        }
    }
    $liqry->close();
}
?>

<form action="" method="POST">
    <?php
                $columns = array('title', 'author', 'isbn13', 'publisher', 'pages', 'dimensions', 'overview');
                foreach ($columns as $key) {
                    echo '<b>' . $key . '</b>: <input type="text" name="' . $key . '"><br>';
                }
                    echo '<b>format</b> :<select name="format" value="format" required>';
                    $arr = array('paperback', 'library binding', 'hardcover');
                    foreach ($arr as $value) {
                       ?> <option value="<?php echo $value; ?>"><?php echo $value; ?></option><?php
                    }
                    echo '</select> <br>';
    ?>
    <br>
    <input type="submit" name="submit" value="Toevoegen">
</form>

<?php
include('../core/footer.php');
?>