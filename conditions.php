<?php 
$studypoints = 75;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>If betingelse og switch statement</title>
<style type="text/css">
	.red {color: red;}
	.green {color: green;}
</style>
</head>

<body>
<!-- Output afhængig af antallet af study points-->
<!-- Når study points er under 80 skal der vises en rød tekst med advarsel: 'Kun [antallet af study points] er ikke nok! -->
<!-- Når study points er lige med eller over 80 en grøn tekst: Super, du kan gå op til din eksamen-->
<!-- Når study points er over 100: Du har formodentlig snydt -->
<!-- NO INLINE STYLES PLEAAAASE !-->
<?php 
	// mindre end 80
	if($studypoints<80){
		echo '<p class="red">';
		echo "Kun $studypoints study points er ikke nok!";
		echo '</p>';
		// med && kan man sætte 2 eller flere betingelser, her inkluderer den ALLE tal mellem 80 og 100
	} else if ($studypoints>=80 && $studypoints<=100){
		// alternativ kan bruges: else if ($studypoints<=100) - think simple, en if statement bliver bearbejdet linje for linje ;-)
		echo '<p class="green">';
		echo "Super, med $studypoints study points kan du gå op til din eksamen!";
		echo '</p>';
		// mere end 100 study points
	} else if ($studypoints>100){
		echo '<p class="red">';
		echo "$studypoints study points? Du har formodentlig snydt!";
		echo '</p>';
	}
	
	echo '<hr>';
		
	/* Nu det samme som switch statement:
	Switches bruges egentlig kun til at tjekke simple overenstemmelser (fx "... er lige med"), for lidt mere komplekse sammenligninger skal man derfor arbejde med return value'n true eller false ;-) 
	Se mere om switch statement: http://php.net/manual/en/control-structures.switch.php
	*/
	
	// if en "case" returnerer "true":
	switch (true) {
    case ($studypoints<80):
        echo '<p class="red">';
		echo "Kun $studypoints study points er ikke nok!";
		echo '</p>';
        break;
    case ($studypoints<=100):
        echo '<p class="green">';
		echo "Super, med $studypoints study points kan du gå op til din eksamen!";
		echo '</p>';
        break;
    case ($studypoints>100):
        echo '<p class="red">';
		echo "$studypoints study points? Du har formodentlig snydt!";
		echo '</p>';
        break;
	}
?>
</body>
</html>