<?php

// onderstaand bestand wordt ingeladen
include('../core/header.php');
include('../core/checklogin_admin.php');
include('book-menu.php');
?>

<h1>books overview</h1>

<?php
$liqry = $con->prepare("SELECT `id`, `title`, `author`, `isbn13`, `format`, `publisher`, `pages`, `dimensions`, `overview` FROM `books`");
if ($liqry === false) {
    echo mysqli_error($con);
} else {
    $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
    if ($liqry->execute()) {
        $liqry->store_result();
        echo '<table border=1>
                        <tr>
                            <td>Book id</td>
                            <td>Title</td>
                            <td>Author</td>
                            <td>Isbn13</td>
                            <td>Format</td>
                            <td>Publisher</td>
                            <td>Pages</td>
                            <td>Dimensions</td>
                            <td>Overview</td>
                            <td>edit</td>
                        </tr>';
        while ($liqry->fetch()) { ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $title; ?></td>
                <td><?php echo $author; ?></td>
                <td><?php echo $isbn13; ?></td>
                <td><?php echo $format; ?></td>
                <td><?php echo $publisher; ?></td>
                <td><?php echo $pages; ?></td>
                <td><?php echo $dimensions; ?></td>
                <td><?php echo $overview; ?></td>
                <td><a href="edit_book.php?uid=<?php echo $id; ?>">edit</a></td>
            </tr>
<?php
        }

        echo '</table>';
    }

    $liqry->close();
}
include('../core/footer.php');
?>