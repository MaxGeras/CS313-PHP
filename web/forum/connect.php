<?php

function get_db() {

	$dbUrl = getenv('DATABASE_URL');
	if (empty($dbUrl)) {
		$dbUser = "note_user";
		$dbPassword = "orange";
		$dbPort = "5432";
		$dbHost = "localhost";
		$dbName = "db_forum";
	} else {
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
	}
	try {
	 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
	catch (PDOException $ex) {
	 print "<p>error: $ex->getMessage() </p>\n\n";
	 die();
	}
	return $db;
}



/*
// It would be better to store these in a different file
function get_db() {

$db = NULL;
$dbUser = 'postgres';
$dbPassword = 'geras';
$dbName = 'db_forum';
$dbHost = 'localhost';
$dbPort = '5432';
try
{
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex)
{
	// If this were in production, you would not want to echo
	// the details of the exception.
	echo "Error connecting to DB. Details: $ex";
	die();
}


return $db;

}
*/
?>