<?php  
require "inc/cabecalho.php";
?>
<link href="resources/css/print.css" rel="stylesheet" media="print">
<!-- cdn for modernizr, if you haven't included it already -->
<!--<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>-->
<!-- polyfiller file to detect and load polyfills -->
<script type="text/javascript">
	function desativar(){
		 document.getElementById('idOverflow').style.overflow = 'hidden';
		 document.getElementById('idOverflow').style.height = 'auto';
		 document.getElementById('idOverflow').style.width = 'auto';
		 document.getElementById('idOverflow').style.padding= '80px 10px';
	}
</script>
<?php  
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";

$principal 	= new Principal($pdo);

?>
<div class="hidden-print">
<form action="" method="POST" role="form">
	<legend align="center">Filtro</legend>

	<div class="row">
		<div class="col-md">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" placeholder="Insira o Nome">
		</div>
		<div class="col-md">
			<label>Data Nascimento Inicial</label>
			<input type="date" name="dt_nasc" class="form-control" placeholder="00/00/0000">
		</div>
		<div class="col-md">
			<label>Data Nascimento Final</label>
			<input type="date" name="dt_nasc_final" class="form-control" placeholder="00/00/0000">
		</div>
	</div>
	<div class="row">
		<div class="col-md">
		<label>Estado Civil</label>
			<select name="est_civil" id="idEst_civil" class="form-control">
				<option value="" selected>Selecione...</option>
				<option value="Solteiro(a)">Solteiro(a)</option>
				<option value="Casado(a)">Casado(a)</option>
				<option value="União Estável">União Estável</option>
				<option value="Separado(a)">Separado(a)</option>
				<option value="Divorciado(a)">Divorciado(a)</option>
				<option value="Viúvo(a)">Viúvo(a)</option>
			</select>
		</div>
		<div class="col-md">
			<label>CPF</label>
			<input type="text" name="cpf" class="form-control" placeholder="000.000.000-00">
		</div>
		<div class="col-md form-group">
			<label>Identidade</label>
			<input type="text" name="rg" class="form-control input-group" placeholder="Identidade">
		</div>
	</div>

	<div class="row">
		<div class="col-md"><input type="hidden" name="val_filtro"></div>
	</div>

	<div class="row">
		<div class="col-md"><input type="hidden" name="val_filtro"></div>
		<div class="col-md d-flex justify-content-end"><button type="submit" class="btn btn-primary">Buscar</button></div>
	</div>
</form>
</div>
<?php
if (isset($_POST['val_filtro'])) {
	if (isset($_POST['dt_nasc']) && !empty($_POST['dt_nasc'])) {
		if (isset($_POST['dt_nasc_final']) && empty($_POST['dt_nasc_final'])) {
			echo('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  					<strong>Você preencheu a data inicial,</strong> obrigatoriamente deve preencher a data final!
				</div>');
			exit();
		}
	}
	if (isset($_POST['dt_nasc_final']) && !empty($_POST['dt_nasc_final'])) {
		if (isset($_POST['dt_nasc']) && empty($_POST['dt_nasc'])) {
			echo('<div class="alert alert-warning alert-dismissible fade show" role="alert">
  					<strong>Você preencheu a data final,</strong> obrigatoriamente deve preencher a data inicial!
				</div>');
			exit();
		}
	}
	$nome 			= utf8_decode($_POST['nome']);
	$est_civil 		= utf8_decode($_POST['est_civil']);
	$dt_nasc 		= $_POST['dt_nasc'];
	$dt_nasc_final 	= $_POST['dt_nasc_final'];
	$cpf 			= $_POST['cpf'];
	$rg 			= $_POST['rg'];

	$filtro 		= $principal->listaFiltro($nome, $est_civil, $dt_nasc, $dt_nasc_final, $cpf, $rg);
?>

<div style="overflow:auto;height:350px; width:auto" id="idOverflow">
 <table class="table table-hover table-bordered">
	<thead>
		<tr align="center">
			<th colspan="5">Resultado da Busca</th>
		</tr>
		<tr>
			<th>Nome</th>
			<th>Estado Civil</th>
			<th>Data Nascimento</th>
			<th>CPF</th>
			<th>Identidade</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($filtro as $info_filtro): ?>
		<tr>
			<td><?=utf8_encode($info_filtro['nome'])?></td>
			<td><?=utf8_encode($info_filtro['est_civil'])?></td>
			<td><?=date('d/m/Y', strtotime($info_filtro['dt_nasc']))?></td>
			<td><?=$info_filtro['cpf']?></td>
			<td><?=$info_filtro['rg']?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
<div class="hidden-print container">
    	<div class="row">
    		<div class="col-md d-flex justify-content-end">
            <a href="#" onclick="desativar(this); window.print();location.reload()" class="btn btn-warning">Imprimir</a>
            </div>
        </div>
    </div>
<?php
}
?>
<?php require "inc/rodape.php";?>