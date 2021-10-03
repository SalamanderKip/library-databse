<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='assets/css/style.css' rel='stylesheet'>
</head>
<!-- SELECT author FROM `books` where author like 'an%' -->
<body>
    <?php
    include 'core/header.php';
    include 'core/checklogin_member.php';
    echo $_SESSION["Sid"];
    ?>
    <div class="container">
        <div class="card-group">
            <div class='row'>
                <?php
                $liqry = $con->prepare("SELECT id, title, author, isbn13, format, publisher, pages, dimensions, overview FROM books");
                if ($liqry === false) {
                    echo mysqli_error($con);
                } else {
                    $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
                    if ($liqry->execute()) {
                        $liqry->store_result();
                        while ($liqry->fetch()) { 
                            if ($pages == "") {
                                $pages = "undefined";
                            }
                            ?>
                            
                            <?php
                            $locationonclick = "' onclick='location.href=\"lent.php?id=" . $id . "\"'";
                            ?>
                            <div class='col-md-3 '>
                                <div class='mr-2'>
                                    <div class='card' <?php echo $locationonclick  ?>>
                                        <!-- <img class='card-img-top' src='assets/img/product.png' alt='Card image cap'> -->
                                        <div class='card-body'>
                                            <h5 class='text-center'><?php echo $title ?></h5>
                                            <p class='card-text'>Author: <?php echo $author?></p>
                                            <p class='card-text'>Pages: <?php echo $pages?></p>
                                        </div>
                                        <div class='read-more-place'>
                                            <button class='btn btn-outline-success mb-2 mr-4 float-right'><b>lent</b></button>
                                        </div>
                                        <!-- <div class='card-footer'>
                                            <small class='text-muted float-right'>dit zijn producten xD</small>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                <?php
                        }
                    }

                    $liqry->close();
                }

                ?>
            </div>
        </div>
    </div>


    <?php
    include 'core/footer.php';
    ?>

    <script src="https://kit.fontawesome.com/41c29a8a8f.js" crossorigin="anonymous"></script>
</body>

</html>