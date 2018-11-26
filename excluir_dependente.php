<?php  
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Dependentes.class.php";

$dependente = new Dependentes($pdo);

$id = $_GET['id'];
$dependente->excluirDependentes($id);
header("Location: consulta_principal.php");
?>