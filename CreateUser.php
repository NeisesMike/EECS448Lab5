<?php

$user = $_POST["user"];



$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users (user_id) VALUES('$user')";

if($user==""){
	echo "Please enter a username";
} else if ($mysqli->query($query)===TRUE) {
	echo "New user created successfully";   
} else {
	echo "Error: ".$query."<br>".$mysqli->error;
}

/* close connection */
$mysqli->close();
?>

<html>
	<head>
		<title>User Created</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<br><br>
		<a href="http://people.eecs.ku.edu/~mneises/448//Lab5/CreateUser">Back</a>
	</body>
</html>
