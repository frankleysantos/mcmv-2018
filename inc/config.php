<?php
try {
	global $pdo; 
	$pdo = new PDO("mysql:dbname=db_mcmv; host=localhost", "root", "");
} catch (Exception $e) {
	echo "Erro".$e->getMessage();
}
?>