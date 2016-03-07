<?php

$post = $_POST["mypost"];
$user = $_POST["user"];
$here = false;

$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Posts (content, author_id) VALUES('$post', '$user')";
$exists = "SELECT user_id FROM Users";

if ($result = $mysqli->query($exists)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		if ($row["user_id"]==$user){
			$here = true;
		}
    }

    /* free result set */
    $result->free();
}

if($user==""){
	echo "Post not saved! Please enter a username!";
} else if($post==""){
	echo "Post not saved! Please enter a post!";
} else if(!$here) {
	echo "Post not saved! That username does not exist!";
} else if($mysqli->query($query)===TRUE) {
	echo "New post created successfully!";
} else {
	echo "Error: ".$query."<br>".$mysqli->error;
}

/* close connection */
$mysqli->close();

?> 

<html>
	<head>
		<title>Post Created</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<br><br>
		<a href="http://people.eecs.ku.edu/~mneises/448//Lab5/CreatePosts">Back</a>
	</body>
</html>
