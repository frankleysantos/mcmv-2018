<?php  
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";

$principal  = new Principal($pdo);
$dependente = new Dependentes($pdo);
$class_bairro     = new Bairros($pdo);
?>
<h4 align="center">Prefeitura Municipal de Teófilo Otoni</h4>
<h4 align="center">Sistema Minha Casa Minha Vida</h4>
<?php
if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
	$cpf = $_POST['cpf'];
	$info_principal = $principal->listaPrincipal($cpf);
	if (!empty($info_principal)) {
		$dependente_id = $info_principal['id'];
		$info_dependente = $dependente->listaDependentes($dependente_id);
?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th colspan="4"><?=$info_principal['nome'];?></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($info_dependente)): ?>
		<?php foreach ($info_dependente as $dado_dependente): ?>
		<tr>
			<td></td>
			<td><i class="fas fa-check"></i><?=$dado_dependente['nome'];?></td>
			<td><b>Idade:</b> <?=utf8_encode($dado_dependente['idade']);?></td>
			<td><b>Parentesco:</b> <?=utf8_encode($dado_dependente['parentesco']);?></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
		<tr>
			<td>Nenhum dependente Cadastrado!</td>
		</tr>
		<?php endif;  ?>
	</tbody>
</table>
<?php
	}else{
?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
  		<strong>Nenhum resultado encontrado para o CPF: <?=$_POST['cpf']?>! </strong><a href="index.php">Clique aqui para cadastrar!</a>
	</div>
<?php
	}
}
if (!isset($_POST['cpf'])) {
	header("Location: index.php");
}
require "inc/rodape.php";
?>