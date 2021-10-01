<?php
include('core/header.php');

if (isset($_POST['submit']) && $_POST['submit'] != '') {
    //default user: test@test.nl
    //default password: test123
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    $liqry = $con->prepare("SELECT id,email,password FROM user WHERE email = ? LIMIT 1;");
    if ($liqry === false) {
        trigger_error(mysqli_error($con));
    } else {
        $liqry->bind_param('s', $email);
        $liqry->bind_result($id, $email, $dbHashPassword);
        if ($liqry->execute()) {
            $liqry->store_result();
            $liqry->fetch();
            if ($liqry->num_rows == '1' && password_verify($password, $dbHashPassword)) {
                    $_SESSION['Sid'] = $id;
                    $_SESSION['Semail'] = stripslashes($email);
                    echo "Bezig met inloggen... <meta http-equiv=\"refresh\" content=\"2; URL=index.php\">";
                    exit();
                } else {
                    echo "wachtwoord niet";
                }
            } else {
                echo "email niet gevonden";
            }
        }
        $liqry->close();
    }
?>
<form action="login.php" method="post">
    <input type="email" name="email" id="" placeholder="Email">
    <input type="password" name="password" id="" placeholder="Password">
    <input type="submit" name="submit" value="Login">
    <a href="forgot_password.php">Forgot Password?</a>
</form>
<?php
include('core/footer.php');
?>