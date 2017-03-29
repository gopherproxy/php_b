<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lommeregner med forbindelse til database</title>
<style type="text/css">
	table {border: 1px solid black; border-collapse: collapse;}
</style>
</head>

<body>

<?php
	
	// inkluderer alt indhold fra db_con filen
	require_once('db_con.php');
	
	function addNumbers($num1, $num2){
		return $num1+$num2;
	}

	function subNumbers($num1, $num2){
		return $num1-$num2;
	}
	
	function mulNumbers ($num1, $num2){
		return $num1*$num2;
	}
	
	function divNumbers ($num1, $num2){
		return $num1/$num2;
	}	
	
	// opsamling af form data via input felter
	/*
	$a = filter_input(INPUT_GET, 'a');
	$b = filter_input(INPUT_GET, 'b');
	$cmd = filter_input(INPUT_GET, 'cmd');
	*/
	
	// Input filter som array
	$filters = array('a'=>FILTER_VALIDATE_INT, 'b'=>FILTER_VALIDATE_INT, 'cmd'=>FILTER_SANITIZE_STRING);
	
	// opsamlingen af input som array (get metoden)
	$formArray = filter_input_array(INPUT_GET, $filters);
	//print_r($formArray);
	
	$a = $formArray['a'];
	$b = $formArray['b'];
	$cmd = $formArray['cmd'];
	
//	echo 'a='.$a.' b='.$b.' cmd='.$cmd;
//	echo 'add:'.(addNumbers($a,$b)-subNumbers($a,$a));
	
	switch($cmd) {
			
		case 'Add':
			$res = addNumbers($a,$b);
			break;
		case 'Sub':
			$res = subNumbers($a,$b);
			break;
		case 'Mul':
			$res = mulNumbers($a,$b);
			break;
		case 'Div':
			// runde op til 2 decimaler efter komma'en
			$res = round(divNumbers($a,$b), 2);
			break;
		default:
			$res = '...';
	}
	
	if($cmd){
		// insertion via såkaldte "prepared statements"
		
		// prepare statement: Skriv NOGET (?) i kolonnerne a, b,  result indenfor tabellen calculations
		$stmt = $con->prepare("INSERT INTO calculations (op, a, b, result) VALUES (?, ?, ?, ?)");
		// hvad er "noget"? datatyp + variabler
		// s=String, i=Integer, d=Double
		$stmt->bind_param('siid', $cmd, $a, $b, $res);
		// execute!
		$stmt->execute();
		echo 'New result added to databasse!';
		$stmt->close();
		
		// luk altid forbindelsen når du ikke har brug for den længere!!!!!!
		/*
		$con->close();
		*/
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
	Result: <?= $res ?>
</form>
<hr>
<?php 
	// SELECT statement
	$stmt = $con->prepare("SELECT id, op, a, b, result FROM calculations");
	// udfør SQL forespørgelse (SELECT)!
	$stmt->execute();
	// nu kan jeg binde værdierne fra kolonnerne til mine egne variabler:
	$stmt->bind_result($id, $op, $a1, $b1, $result);
	// for at få fat i ALLE records er jeg nødt til at gå på en løbetur - og bruge en løkke (loop)	
	// Dynamisk genereret HTML layout:
	// start på min tabel
	echo '<table border="1">';
	echo '<tr><th>ID</th><th>Nummer 1</th><th>OP</th><th>Nummer 2</th><th>Result</th></tr>';
	  // så længe du kan hente noget fra databasen ;-)
	  while($stmt->fetch())  {
		  // overskriver værdien af $op med den tilsvarende aritmetiske tegn til output i tabellen:
		  switch($op)  {
		case 'Add':
			$op = '+';
			break;
		case 'Sub':
			$op = '-';
			break;
		case 'Mul':
			$op = '*';
			break;
		case 'Div':
			$op = '/';
			break;
		default:
			$op = '';
	}
		echo '<tr>';
//		echo "<td>$id</td>" . "<td>$a1</td>" . "<td>$op</td>" . "<td>$b1</td>" . "<td>$result</td>";
//		echo '<td>'.$id.'</td><td>'.$a1.'</td><td>'.$op.'</td><td>'.$b1.'</td><td>'.$result.'</td>';
		echo "<td>$id</td><td>$a1</td><td>$op</td><td>$b1</td><td>$result</td>";

		  echo '</tr>';
	}
	// slut på min tabel
	echo '</table>';
	 // statement ($stmt) afsluttet)
	$stmt->close();
	// luk altid forbindelsen når du ikke har brug for den længere!
	$con->close();
?>
</body>
</html>