<?php
include 'core/config.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name='description' content='Basic loginsystem'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta http-equiv='x-ua-compatible' content='ie=edge'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href='assets/css/style.css' rel='stylesheet'>
	<title>Register</title>
</head>
<body>
	<?php
	include 'core/header.php';
	?>
	<div class="container">
		<h3>Register</h3>
		<hr />
		<form name='signup' id='signup' action='core/actions.php' method='post'>
			<div class='form-group'>
				<label for='firstname'>Firstname*</label>
				<input name='firstname' id='firstname' type='text' class='form-control' placeholder='firstname' required />
			</div>
			<div class='form-group'>
				<label for='lastname'>Lastname*</label>
				<input name='lastname' id='lastname' type='text' class='form-control' placeholder='lastname' required />
			</div>
			<div class='form-group'>
				<label for='email'>E-mail*</label>
				<input name='email' id='email' type='text' class='form-control' placeholder='email' required />
			</div>
			<div class='form-group'>
				<label for='password'>Password*</label>
				<input name='password' id='password' type='password' class='form-control' placeholder='password' style='cursor:text; background-color:#fff;' onfocus='this.removeAttribute("readonly");' readonly required />
			</div>
			<div class='form-group'>
				<button name='submit' id='submit' class='btn btn-warning btn-block'>Register</button>
			</div>
		</form>
	</div>
	<?php
    include 'core/footer.php';
    ?>
</body>

</html>