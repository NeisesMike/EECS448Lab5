<?php

$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

echo "<h2>Users:</h2>";

if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		$id = $row["user_id"];
        echo "<li>$id</li>";
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();

?> 

<html>
	<head>
		<title>Users</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<br><br>
		<a href="http://people.eecs.ku.edu/~mneises/448/Lab5/AdminHome">Home</a>
	</body>
</html>
