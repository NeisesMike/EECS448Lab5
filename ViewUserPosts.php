<html>
	<head>
		<title>User Posts</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<form id="myForm" action="ViewUserPosts2.php" method="post">
			<select name="user">
				<option>Select User</option>";
	
				<?php
					$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');
					/* check connection */
					if ($mysqli->connect_errno) {
					    printf("Connect failed: %s\n", $mysqli->connect_error);
					    exit();
					}
					$query = "SELECT user_id FROM Users";
					if ($result = $mysqli->query($query)) {
					    /* fetch associative array */
					    while ($row = $result->fetch_assoc()) {
					        printf ("<option name='user_id'>%s \n</option>", $row["user_id"]);
					    }
					    /* free result set */
					    $result->free();
					}
					/* close connection */
					$mysqli->close();
				?>
			
			</select><br>
			<input type="submit" class="button" name="submit" value="View Posts"><br>
		</form>

		<a href='http://people.eecs.ku.edu/~mneises/448/Lab5/AdminHome'>Home</a>
	</body>
</html> 

