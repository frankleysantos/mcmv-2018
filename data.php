<?php  
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";

$principal = new Principal($pdo);

$info_principal = $principal->buscaData();

foreach ($info_principal as $dado_principal) {
	$id = $dado_principal['id'];
	$data = explode('/', $dado_principal['dt_nasc']);
	$nova_data = $data[2].'-'.$data[1].'-'.$data[0];
	$principal->converteData($id, $nova_data);
	echo "ok";
}
?>