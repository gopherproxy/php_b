<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
/*
1) SignUp -> gem email og dato/tid i db
- oprette en "newsletter" tabel i en database
- lav SQL til at indsætte testdata
- ny php fil "newsletter.php" med formular
- in php: get email parameter
- connect to db
- form prepared statement
- bind email param
- execute
- test!!!

2) Husk serverside validation
3) Deploy til webhost
4) SignOut -> slet email fra db
5) Deploy til webhost
6) Lav side der viser emails fra db i html tabel (sorter nyeste først)
7) Deploy til webhost
8) Implement clientside validation  
9) Deploy til webhost
*/

	$cmd = filter_input(INPUT_POST, 'cmd', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	
	switch($cmd) {
		case 'SignUp':
			echo 'will add '.$email.' to the db...';
			require_once('db_con.php');
			$sql = 'INSERT INTO newsletter (email) VALUES (?)';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();			

			if ($stmt->affected_rows > 0) {
				echo 'Email added to the list :-)';
			}
			else {
				echo 'Could not add email - its propably already there....';
			}
			break;
		case 'SignOut':
			echo 'will remove '.$email.' to the db...';
			require_once('db_con.php');
			$sql = 'DELETE FROM newsletter WHERE email=?';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();			

			if ($stmt->affected_rows > 0) {
				echo 'Email removed from the list :-)';
			}
			else {
				echo 'Could not delete email - its propably not there....';
			}
			break;
		default: 
			?>
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<fieldset>
					<legend>Newsletter</legend>
					<input type="email" placeholder="Email" name="email" required><br>
					<input type="submit" name="cmd" value="SignUp">
					<input type="submit" name="cmd" value="SignOut">
				</fieldset>
			</form>
			<?php
	}
	

	

?>



</body>
</html>