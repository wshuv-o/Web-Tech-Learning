<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<fieldset>
		<form action="../controllers/Login.php" method="post">
			<label for="username">Username</label>
			<input type="text" name="username" id="username">
			<br><br>

			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			<br><br>

			<input type="submit">
		</form>
	</fieldset>

	<?php
		echo isset($_SESSION['error']) ? $_SESSION['error'] : "";
	?>
</body>
</html>