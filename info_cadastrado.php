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
<h4 align="center">Sistema de Gestão de Recursos Sociais.</h4>
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
			<th colspan="4"><?=$info_principal['nome'];?> - <span class="far fa-calendar">Data Cadastro: <?php $data = $info_principal['insercao']; if($data >= '01/01/2018'): echo date('d/m/Y', strtotime($data)); else: echo "Cadastro Antigo."; endif;?></span></th>
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
$principal_id = $info_principal['id']; 
$sql = $principal->listaImagem($principal_id);
?>
Documentos Cadastrados:
<table class="table table-striped table-hover">
	<tbody>
<?php foreach ($sql as $foto): ?>
	<tr>
		<td>
			<a href="viewimagens.php?id=<?=$foto['id']?>"><img src="data:image/png;image/jpeg;base64,<?= base64_encode($foto["imageData"]) ?>" class="img-responsive img-fluid img-thumbnail" style="width: 50px; height: 50px;"/><br></a>
		</td>
		<td><?=$foto['name']?></td>
	</tr>
<?php endforeach; ?>
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