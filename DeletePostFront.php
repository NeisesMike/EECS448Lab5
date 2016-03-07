<html>
	<head>
		<title>Delete Posts</title>
		<link rel="stylesheet" type="text/css" href="http://people.eecs.ku.edu/~mneises/general.css">
		<style></style>
	</head>
	<body>
		<form id="myForm" action="DeletePost.php" method="post">
			<table>
				<tr>
					<td>Post Number</td>
					<td>Author Name</td>
					<td>Content</td>
					<td>Delete?</td>
				</tr>
	
				<?php
					$mysqli = new mysqli('mysql.eecs.ku.edu', 'mneises', 'greetings', 'mneises');
					$min = 9999;
					$max = 0;
					/* check connection */
					if ($mysqli->connect_errno) {
					    printf("Connect failed: %s\n", $mysqli->connect_error);
					    exit();
					}
					$query = "SELECT * FROM Posts";
					if ($result = $mysqli->query($query)) {
					    /* fetch associative array */
					    while ($row = $result->fetch_assoc()) {
							printf ("<td> %s </td> \n", $row["post_id"]);

							printf ("<td> %s </td> \n", $row["author_id"]);

							printf ("<td> %s </td> \n", $row["content"]);
							
							$postnum = $row["post_id"];
							echo "<td><input type='checkbox' name='$postnum'></td>";
							echo "</tr>";

							//Keep track of min and max post_id for iterating usage in DeletePost.php
							if($postnum < $min){
								$min=$postnum;
							}
							if($postnum > $max){
								$max=$postnum;
							}
					    }
						//Use hidden elements to post min and max variables
						echo "<input name='min' value=$min hidden=true>";
						echo "<input name='max' value=$max hidden=true>";
					    /* free result set */
					    $result->free();
					}
					if($min==9999 && $max==0){
						//If there are no elements, wipe the page, and tell the user.
						ob_end_clean();
						echo "There are no posts to delete!<br><br>";
					}
					/* close connection */
					$mysqli->close();
				?>
			
			</table><br>
			<input type="submit" class="button" name="submit" value="Delete Posts"><br>
		</form>

		<a href='http://people.eecs.ku.edu/~mneises/448/Lab5/AdminHome'>Back</a>
	</body>
</html> 
 
