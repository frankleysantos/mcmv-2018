<?php 
require "inc/config.php";
require "classes/Principal.class.php";
$principal  = new Principal($pdo);
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id_imagem = $_GET['id'];
	$principal->excluirImagem($id_imagem);
	header('Location: consulta_principal.php?cpf='.$_GET['cpf']);
}
?>