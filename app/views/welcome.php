<?php 
	session_start();
	
	require "../model/User.php";

	if (!isset($_SESSION['hasLoggedIn'])) {
		header("Location: login.php");
		exit();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$keys=getKeys();
		foreach($keys as $pri_key){
			$i="delete_".$pri_key;
    	if (isset($_POST[$i])) {
        	$delete_id = $pri_key; 
        	removeRow($delete_id);
    	}
	}
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$keys=getKeys();
		foreach($keys as $pri_key){
			$i="confirm_".$pri_key;
    	if (isset($_POST[$i])) {
        	$update_id = $pri_key; 
        	$update_username = $_POST["update_username"]; 
        	$update_password = $_POST["update_password"]; 
        	updateUser($update_id, $update_username, $update_password);
			unset($_POST[$i]);
    	}
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome | App</title>
</head>
<body>

	<h3>Welcome <?php echo $_SESSION['hasLoggedIn']; ?> to my app</h3>

	<hr>
	<p><?php  
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$keys=getKeys();
		foreach($keys as $k  ){
			$i="update_".$k;
    	if (isset($_POST[$i])) {
        	$id = $k; 
        	$res=getUser($id);
			echo "<h1>Update </h1>";
			echo "<form action= {$_SERVER['PHP_SELF']} method='post'><table border=1>";
			echo "<tr>";
			echo "<th>id</th>";
			echo "<th>Username</th>";
			echo "<th>Password</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			while ($row = $res->fetch_assoc()) {
				echo "<tr><td>" . $row['id'] . "</td><td><input type='text' name='update_username' value='" . $row['username'] . "'</td><td><input type='text' name='update_password' value='" . $row['password'] . "'</td><td>". "<input type='submit' id='confirm' name='confirm_" . $row['id'] . "' value='Confirm'><input type='hidden' name='update_'" . $row['id'] . "' value='" . $row['id'] . "'></td><tr>";
			}
			echo "</table></form>";
    	}
	}
}
	
	$result=alluser();
	echo "<h1> All users </h1>";

	echo "<form action= {$_SERVER['PHP_SELF']} method='post'><table border=1>";
	echo "<tr>";
	echo "<th>id</th>";
	echo "<th>Username</th>";
	echo "<th>Password</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	while ($row = $result->fetch_assoc()) {
    	echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td><td>". "<input type='submit' id='delete' name='delete_" . $row['id'] . "' value='Delete'><input type='submit' id='update' name='update_" . $row['id'] . "' value='Update'><input type='hidden' name='delete_'" . $row['id'] . "' value='" . $row['id'] . "'></td><tr>";
	}


	echo "</table></form>";
?>
</p>

	<a href="../controllers/Logout.php">Logout</a>

</body>
</html>