<?php

$user = $_POST["user"];

echo $user."'s posts:<br>";

$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT content FROM Posts WHERE author_id='$user'";

if ($result = $mysqli->query($query)) {
    /* fetch associative array */
	echo "<ul>";
    while ($row = $result->fetch_assoc()) {
		echo "<li>";
        printf ("%s \n", $row["content"]);
		echo "</li>";
    }
	echo "</ul>";

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();

?> 

<html>
	<head>
		<title>User Posts</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<br><br>
		<a href="http://people.eecs.ku.edu/~mneises/448/Lab5/ViewUserPosts.php">Back</a>
	</body>
</html> 
