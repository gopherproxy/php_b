<?php 

// en php variable typ string
$myVar = 'Marc';
// en variable type nummer
$myVar2 = 3;
// i PHP er \ den såkaldte escape-character
$book = 'The Hitchhiker\'s Guide to the Galaxy';
$author = 'Dan Brown';
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
	// konkatenering kan kombinere variabler og strings
	// en "conditional statement" med tredoppelt lighedstegn tjekker for overenstemmelse i indhold + datatype!
	
	/* som h2: 
		Hvis author er Lars Løkke: Lars Løkke er dum
		Hvis det er en tredje author:
		Author er hverken Douglas Adams eller Lars Løkke, men [indhold af variablen $author]
	*/
	if($author === 'Douglas Adams'){
		echo '<h2>' . $book . ' by ' . $author . '</h2>';
	} else if($author === 'Lars Løkke'){
		echo '<h2>' . $author . ' er dum.' . '</h2>';
	} else {
		echo '<h2>' . 'Author er ikke Douglas Adams, men ' . $author . '</h2>';
	}
	
?>
</body>
</html>








