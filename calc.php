<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<form action="<?=$_SERVER['PHP_SELF']?>" method="get">

	<label for="a">A:</label>
	<input id="a" type="number" name="a"><br>
	<label for="b">B:</label>
	<input id="b" type="number" name="b"><br>
	<hr>
	<input type="submit" name="cmd" value="Add">
	<input type="submit" name="cmd" value="Sub">
	<input type="submit" name="cmd" value="Mul">
	<input type="submit" name="cmd" value="Div"><br>
	Result: xxxxxx
</form>

</body>
</html>