<?php
try {
	global $pdo; 
	$pdo = new PDO("mysql:dbname=db_new_mcmv; host=localhost", "suporte", "#N3wc0m2017.");
} catch (Exception $e) {
	echo "Erro".$e->getMessage();
}
?>