<?php
function Connection()
{
	$user = 'root';
	$passwd = '';
	$dsn = 'mysql:host=localhost;dbname=buvette';
	try
		{
			$dbh= new PDO($dsn, $user, $passwd);
			return $dbh;
		}
	catch (PDOException $e)
		{
			print "Erreur !:" .$e->getMessage()."<br/>";
			die();
			return null; 
		}
	
}	
?>