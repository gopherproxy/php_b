<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	
	$i = 1;
	
	while($i <= 5) {
		echo $i.'<br>'.PHP_EOL;
		$i++;
	}

	echo '<hr>';
	
	for($x = 2; $x<=10; $x=$x+2){
		echo $x.'<br>'.PHP_EOL;
	}
	
	
	$students = array('Peter', 'Jan', 'Ib');
	foreach($students as $stud){
		echo 'Student name is '.$stud.'<br>'.PHP_EOL;
	}
	
?>


</body>
</html>