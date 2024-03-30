<?php

function credentials($username, $password) {
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT id, username, password FROM Users WHERE username = ? and password = ?");
	$stmt->bind_param("ss", $username, $password);

	$username=$username;
	$password=$password;

	if ($stmt->execute()) {
		return true;
	}

	return false;
}
function getUser($id){
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$stmt = $conn->prepare("SELECT id, username, password FROM Users WHERE id=?");
	$stmt->bind_param("s", $id);

	$id=$id;
	$stmt->execute();
	$result=$stmt->get_result();
	return $result;
}
function updateUser($id, $username, $password){
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$stmt = $conn->prepare("UPDATE users set username=?,password=? WHERE id=?");
	$stmt->bind_param("sss", $username, $password, $id);

	$id=$id;
	$username=$username;
	$password=$password;
	$stmt->execute();
}
function alluser(){
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$stmt = $conn->prepare("SELECT id, username, password FROM Users ");
	
	$stmt->execute();
	$result=$stmt->get_result();

	return $result;
}
function removeRow($delete_id){
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$stmt = $conn->prepare("DELETE FROM Users WHERE id = ?");
	$stmt->bind_param("s", $id);

	$id=$delete_id;
	if ($stmt->execute()) {
		return true;
	}
	return false;
}
function getKeys(){
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "my_app";

	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	$stmt = $conn->prepare("SELECT id FROM users");

	$stmt->execute();
	$stmt->bind_result($id);
	$primaryKeys = [];
    while ($stmt->fetch()) {
        $primaryKeys[] = $id;
    }

    $stmt->close();
    $conn->close();

    return $primaryKeys;
}
?>