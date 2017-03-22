<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
	
	function addNumbers($num1, $num2){
		return $num1+$num2;
	}

	function subNumbers($num1, $num2){
		return $num1-$num2;
	}
	
	

	$a = filter_input(INPUT_GET, 'a');
	$b = filter_input(INPUT_GET, 'b');
	$cmd = filter_input(INPUT_GET, 'cmd');
	
//	echo 'a='.$a.' b='.$b.' cmd='.$cmd;
//	echo 'add:'.(addNumbers($a,$b)-subNumbers($a,$a));
	
	switch($cmd) {
			
		case 'Add':
			$res = addNumbers($a,$b);
			break;
		case 'Sub':
			$res = subNumbers($a,$b);
			break;
		default:
			$res = 'Unknown cmd: '.$cmd;
	}
	
?>


<form action="<?=$_SERVER['PHP_SELF']?>" method="get">

	<label for="a">A:</label>
	<input id="a" type="number" name="a" value="<?=$a?>"><br>
	<label for="b">B:</label>
	<input id="b" type="number" name="b" value="<?=$b?>"><br>
	<hr>
	<input type="submit" name="cmd" value="Add">
	<input type="submit" name="cmd" value="Sub">
	<input type="submit" name="cmd" value="Mul">
	<input type="submit" name="cmd" value="Div"><br>
	Result: <?=$res?>
</form>

</body>
</html>