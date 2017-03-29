<?php 
// forbindelse til mySQL server med mysqli metoden

// 1. Konstanter til forbindelsesdata TIL localhost

const HOSTNAME = 'localhost'; // servernavn
const MYSQLUSER = 'root'; // super bruger (remote har man særskilte database brugere)
const MYSQLPASS = 'root'; // bruger password
const MYSQLDB = 'mul_b'; // database navn

// 2. Oprette forbindelsen via mysqli objekt $con

$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

// definere et character-set (utf 8) for forbindelsen
$con->set_charset('utf8');

// 3. Forbindelses-tjek

// hvis forbindelsen ikke lykkedes
if($con->connect_error){
	die($con->connect_error);
}else {
	echo '<h2>Juhu - jeg kan se databassen!</h2>'; // flot Marc :-)
}


// hvis filen indeholder RENT PHP, kan slut tag undlades...