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
<script type="functions.js"></script>
 <?php if (!isset($_POST['val_filtro'])) {
    ?>
    <script type="text/javascript">
    	window.onload = function(){
    		document.getElementById('collapseOne').className = 'collapse show';
    	}  	
    </script>
    <?php	
    } ?>
<?php  
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";
require "classes/TipoCadastro.class.php";

$bairro = new Bairros($pdo);
$principal 	= new Principal($pdo);
$tipo_cadastro 		= new TipoCadastro($pdo);
$tipo = $tipo_cadastro->listar();
$count = 0;
?>
<div class="accordion hidden-print" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne" align="center">
      <h2 class="mb-0">
        <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Filtros
        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
<div class="hidden-print">
<form action="" method="POST" role="form">
	<div class="row">
		<div class="col-md">
			<label>Tipo de Cadastro</label>
			<select name="tipoformulario" id="idPPME" class="form-control">
				<option value="">Selecione o tipo</option>
				<?php foreach ($tipo as $info_tipo):?>
				<option value="<?=$info_tipo['id']?>"><?=$info_tipo['tipo']?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
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
			<input type="text" name="cpf" id="idCpf" placeholder="000.000.000-00" name="cpf" class="form-control" maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);">
		</div>
		<div class="col-md form-group">
			<label>Identidade</label>
			<input type="text" name="rg" class="form-control input-group" placeholder="Identidade">
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md">
			<label>Endereco</label>
			<input type="text" name="endereco" class="form-control" placeholder="Digite o nome da Rua">
		</div>
		<div class="col-md">
			<label>Bairro</label> <?php $bairro = $bairro->listaBairros(); ?>
			<select class="form-control" name="bairro" id="idBairro">
				<option value="">Escolha...</option>
				<?php foreach ($bairro as $dado_bairro): ?>
				<option value="<?=utf8_decode($dado_bairro['nome']);?>"><?=utf8_encode($dado_bairro['nome']);?></option>	
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-md">
			<label>Zona</label>
			<select name="zona" id="idZona" class="form-control">
				<option value="">Selecione...</option>
				<option value="0">Urbana</option>
				<option value="1">Rural</option>
			</select>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md">
			<label>Deficiência</label>
			<select name="deficiencia" id="idDeficiencia" class="form-control">
				<option value="">Selecione...</option>
				<option value="Nenhuma">Nenhuma</option>
				<option value="Motora (cadeirante)">Motora (cadeirante)</option>
				<option value="Motora (não cadeirante)">Motora (não cadeirante)</option>
				<option value="Visual">Visual</option>
				<option value="Auditiva">Auditiva</option>
				<option value="Mental">Mental</option>
				Motora (não cadeirante)
			</select>
		</div>
		<div class="col-md">
			<label>Escolaridade</label>
			<select name="escolaridade" id="idEscolaridade" class="form-control">
				<option value="">Selecione...</option>
				<option value="Sem escolaridade">Sem escolaridade</option>
				<option value="Ensino fundamental">Ensino fundamental</option>
				<option value="Ensino médio">Ensino médio</option>
				<option value="Superior imcompleto">Superior imcompleto</option>
				<option value="Superior completo">Superior completo</option>
				<option value="Pós-graduado">Pós-graduado</option>
				<option value="Mestrado">Mestrado</option>
				<option value="Doutorado">Doutorado</option>
			</select>
		</div>
		<div class="col-md">
			<label>Bolsa Familia</label>
			<select name="bolsa_familia" id="idBolsa_familia" class="form-control">
				<option value="">Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="col-md">
			<label>BPC</label>
			<select name="bpc" id="idBpc" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>CadÚnico</label>
			<select name="cadunico" id="idCadunico" class="form-control">
				<option value="">Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="col-md">
			<label>NIS</label>
			<input type="text" id="idNis" placeholder="111.11111.11-1" name="nis" class="form-control" maxlength="14" minlength="14" onkeypress="formataNIS(this);">
		</div>
		<div class="col-md">
			<label>Sexo</label>
			<select name="sexo" id="idSexo" class="form-control">
				<option value="">Selecione...</option>
				<option value="0">Masculino</option>
				<option value="1">Feminino</option>
			</select>
		</div>
	</div>
		<div class="row" id="idCampoPPME">
		<div class="col-md">
			<label>Existe rede de elétrica no logradouro?</label>
			<select name="rede_eletrica" id="idRede_eletrica" class="form-control">
				<option value="" selected>Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="col-md">
			<label>Existe rede de água no logradouro?</label>
			<select name="rede_agua" id="idRede_agua" class="form-control">
				<option value="" selected>Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="col-md">
			<label>Existe rede de esgoto no logradouro?</label>
			<select name="rede_esgoto" id="idRede_esgoto" class="form-control">
				<option value="" selected>Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="w-100"></div>
		<div class="col-md">
			<label>Situação Lote?</label>
			<select name="situacao_lote" id="idSit_Lote" class="form-control">
				<option value="" selected>Selecione...</option>
				<option value="0">Casa Construída</option>
				<option value="1">Lote Vago</option>
			</select>
		</div>
		<div class="col-md">
			<label>Quantidade de imóveis no mesmo terreno?</label>
			<input type="number" name="qnt_imovel" class="form-control" id="idQnt_imovel">
		</div>
	</div>

	<div class="row">
		<div class="col-md"><input type="hidden" name="val_filtro"></div>
		<div class="col-md d-flex justify-content-end"><button type="submit" class="btn btn-primary">Buscar</button></div>
	</div>
</form>
</div>
</div>
    </div>
  </div>
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
	$endereco		= $_POST['endereco'];
	$bairro 		= $_POST['bairro'];
	$zona 			= $_POST['zona'];
	$escolaridade 	= $_POST['escolaridade'];
	$deficiencia 	= $_POST['deficiencia'];
	$bolsa_familia 	= $_POST['bolsa_familia'];
	$bpc 			= $_POST['bpc'];
	$cadunico		= $_POST['cadunico'];
	$nis 			= $_POST['nis'];
	$sexo 			= $_POST['sexo'];
	$tipoformulario = $_POST['tipoformulario'];
	$rede_eletrica 	= $_POST['rede_eletrica'];
	$rede_esgoto 	= $_POST['rede_esgoto'];
	$rede_agua 		= $_POST['rede_agua'];
	$situacao_lote 	= $_POST['situacao_lote'];
	$qnt_imovel 	= $_POST['qnt_imovel'];

	$filtro 		= $principal->listaFiltro($nome, $est_civil, $dt_nasc, $dt_nasc_final, $cpf, $rg, $endereco, $bairro, $zona, $escolaridade, $deficiencia, $bolsa_familia, $bpc, $cadunico, $nis, $sexo, $tipoformulario, $rede_eletrica, $rede_esgoto, $rede_agua, $situacao_lote, $qnt_imovel);
?>

<div style="overflow:auto;height:350px; width:auto" id="idOverflow">
 <table class="table table-hover table-bordered">
	<thead>
		<tr align="left">
			<th colspan="25">Resultado da Busca</th>
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
		<?php foreach ($filtro as $info_filtro): 
			$count+=1;
		?>
		<tr>
			<td><?=$_SESSION['DADOS']['nome'.$count] 		= utf8_encode($info_filtro['nome'])?></td>
			<td><?=$_SESSION['DADOS']['est_civil'.$count] = utf8_encode($info_filtro['est_civil'])?></td>
			<td><?=$_SESSION['DADOS']['dt_nasc'.$count] 	= date('d/m/Y', strtotime($info_filtro['dt_nasc']))?></td>
			<td><?=$_SESSION['DADOS']['cpf'.$count] 		= $info_filtro['cpf']?></td>
			<td><?=$_SESSION['DADOS']['rg'.$count] = $info_filtro['rg']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['endereco'.$count] = utf8_encode($info_filtro['endereco']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['bairro'.$count] = utf8_encode($info_filtro['bairro']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['zona'.$count] = $info_filtro['zona']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['telefone'.$count] = $info_filtro['telefone'];?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['email'.$count] = utf8_encode($info_filtro['email']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['naturalidade'.$count] = utf8_encode($info_filtro['naturalidade']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['tempo'.$count] = $info_filtro['tempo'];?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['ocupacao'.$count] = utf8_encode($info_filtro['ocupacao']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['remuneracao'.$count] = $info_filtro['remuneracao'];?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['outras_rendas'.$count] = $info_filtro['outras_rendas'];?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['cadunico'.$count] = $info_filtro['cadunico']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['nis'.$count] = $info_filtro['nis'];?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['bolsa_familia'.$count] = $info_filtro['bolsa_familia']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['bpc'.$count] = $info_filtro['bpc']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['escolaridade'.$count] = utf8_encode($info_filtro['escolaridade']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['imovel'.$count] = utf8_encode($info_filtro['imovel']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['comodos'.$count] = utf8_encode($info_filtro['comodos']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['aluguel'.$count] = utf8_encode($info_filtro['aluguel']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['risco'.$count] = $info_filtro['risco']?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['deficiencia'.$count] = utf8_encode($info_filtro['deficiencia']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['rede_eletrica'.$count] = utf8_encode($info_filtro['rede_eletrica']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['rede_agua'.$count] = utf8_encode($info_filtro['rede_agua']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['rede_esgoto'.$count] = utf8_encode($info_filtro['rede_esgoto']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['situacao_lote'.$count] = utf8_encode($info_filtro['situacao_lote']);?></td>
			<td style="display: none;"><?=$_SESSION['DADOS']['qnt_imovel'.$count] = utf8_encode($info_filtro['qnt_imovel']);?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
<?php $_SESSION['DADOS']['count'] = $count; ?>
<div class="hidden-print container">
    	<div class="row">
    		<div class="col-md d-flex justify-content-right">
            <a href="filtro_excel.php" class="btn btn-danger">Gerar Excel</a>
            </div>
    		<div class="col-md d-flex justify-content-end">
            <a href="#" onclick="desativar(this); window.print();location.reload()" class="btn btn-warning">Imprimir</a>
            </div>
        </div>
    </div>
<?php
}
?>
<?php require "inc/rodape.php";?>