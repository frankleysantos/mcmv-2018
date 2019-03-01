<?php
try {
	global $pdo; 
	$pdo = new PDO("mysql:dbname=db_new_mcmv; host=localhost", "root", "");
} catch (Exception $e) {
	echo "Erro".$e->getMessage();
}
?>
