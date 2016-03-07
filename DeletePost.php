<?php

$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');
$min = $_POST["min"];
$max = $_POST["max"];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/**
*
* From min until max,
* if post_id at that index has a checked box,
* delete it and tell the user.
*
**/
for($i=$min;$i<=$max;$i++){
	if($_POST[$i]=="on"){
		$query = "DELETE FROM Posts WHERE post_id='$i'";
		if ($mysqli->query($query)===TRUE) {
			echo "Post ".$i." deleted successfully!<br>";
		}
	}
}
// close connection
$mysqli->close();

?> 

<html>
	<head>
		<title>Deleted Posts</title>
		<meta content="">
		<style></style>
	</head>
	<body>
		<br><br>
		<a href="http://people.eecs.ku.edu/~mneises/448/Lab5/DeletePostFront.php">Back</a>
	</body>
</html> 
