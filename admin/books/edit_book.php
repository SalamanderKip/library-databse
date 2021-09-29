<?php

// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');
include('book-menu.php');
?>

<h1>edit book</h1>

<?php
if (isset($_POST['submit']) && $_POST['submit'] != '') {
    $id = $con->real_escape_string($_GET['uid']);
    $title = $con->real_escape_string($_POST['title']);
    $author = $con->real_escape_string($_POST['author']);
    $isbn13 = $con->real_escape_string($_POST['isbn13']);
    $format = $con->real_escape_string($_POST['format']);
    $publisher = $con->real_escape_string($_POST['publisher']);
    $pages = $con->real_escape_string($_POST['pages']);
    $dimensions = $con->real_escape_string($_POST['dimensions']);
    $overview = $con->real_escape_string($_POST['overview']);
    
    
    // if (isset($_POST['active'])) {
    //     $active = $con->real_escape_string($_POST['active']);
    // } else {
    //     $active = 0; 
    // }

    $query1 = $con->prepare("UPDATE books SET title = ?, author = ?, isbn13 = ?, format = ?, publisher = ?, pages = ?, dimensions = ?, overview = ? WHERE id = ? LIMIT 1;");
    if ($query1 === false) {
        echo mysqli_error($con);
    }

    $query1->bind_param('ssississi', $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview, $id);
    if ($query1->execute() === false) {
        echo mysqli_error($con);
    } else {
        echo '<div style="border: 2px solid Green">book aangepast</div>';
    }
    $query1->close();
}
?>


<form action="" method="POST">
    <?php

    if (isset($_GET['uid']) && $_GET['uid'] != '') {
        $id = $con->real_escape_string($_GET['uid']);

        $liqry = $con->prepare("SELECT `id`, `title`, `author`, `isbn13`, `format`, `publisher`, `pages`, `dimensions`, `overview` FROM `books` where `id` = ? LIMIT 1;");
        if ($liqry === false) {
            echo mysqli_error($con);
        } else {
            $liqry->bind_param('i', $id);
            $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);

            if ($liqry->execute()) {
                $liqry->store_result();
                $liqry->fetch();

                if ($liqry->num_rows == '1') {
                    $columns = array('id', 'title', 'author', 'isbn13', 'publisher', 'pages', 'dimensions', 'overview');
                    foreach ($columns as $key) {
                        $dit_veld_moet_alleen_lezen_zijn = "";
                        if ($key == 'id') {
                            $dit_veld_moet_alleen_lezen_zijn = "disabled";
                        }
                        echo '<b>' . $key . '</b> :<input type="text" name="' . $key . '" value="' . $$key . '" ' . $dit_veld_moet_alleen_lezen_zijn . '><br>';
                    
                    }
                }
                echo '<b>format</b> :<select name="format" value="'. $format .'" required>';
                        $arr = array('paperback', 'library binding', 'hardcover');
                        foreach ($arr as $value) {
                         ?> <option value="<?php echo $value; ?>"><?php echo $value; ?></option><?php
                        }
                        echo '</select> <br>';
            }
        }
        $liqry->close();
    }
    ?>
    <br>
    <input type="submit" name="submit" value="Opslaan">
</form>

<?php
include('../core/footer.php');
?>