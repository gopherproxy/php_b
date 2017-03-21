<?php 

// en php variable typ string
$myVar = 'Marc';
// en variable type nummer
$myVar2 = 3;
// i PHP er \ den såkaldte escape-character
$book = 'The Hitchhiker\'s Guide to the Galaxy';
$author = 'Douglas Adams';
$book1 = "The Hitchhiker's Guide to the Galaxy";
// som udgangspunkt brug kun "single quotes" i string formatering pga HTML konflikter
echo '<h1 class="red">My Headline</h1>';


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Strings and variables</title>
</head>

<body>
<?php 
	// at vise inhold af en variable
	echo $myVar;
	echo '<br>';
	// concatenation (konkatenering) med . konkatenerings operatør
	echo '<h2>' . $book . ' by ' . $author . '</h2>';
?>
</body>
</html>