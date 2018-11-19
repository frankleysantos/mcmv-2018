	<script type="text/javascript">
	function adicionarLinha(){
    var local=document.getElementById('TabComposicao');
    var tblBody = local.tBodies[0];
    var newRow = tblBody.insertRow(-1);  
    var total  = document.getElementById('composicaototal').value;
    var newCell0 = newRow.insertCell(0);
    newCell0.innerHTML = '<td><input type="text" name="nome'+total+'"  value="" class="form-control" placeholder="Nome"></td>';
    var newCell1 = newRow.insertCell(1);
    newCell1.innerHTML = '<td><input type="text" name="idade'+total+'"  value="" class="form-control" placeholder="Idade"></td>';
    var newCell2 = newRow.insertCell(2);
    newCell2.innerHTML = '<td><input type="text" name="parentesco'+total+'"  value="" class="form-control" placeholder="Parentesco"></td>';
    var newCell3 = newRow.insertCell(3);
    newCell3.innerHTML = '<td><input type="text" name="documentacao'+total+'"  value="" class="form-control" placeholder="Documentação"></td>';
    var newCell4 = newRow.insertCell(4);
    newCell4.innerHTML = '<td><input type="text" name="ocupacao'+total+'"  value="" class="form-control" placeholder="Ocupacao"></td>';
    var newCell5 = newRow.insertCell(5);
    newCell5.innerHTML = '<td><input type="text" id="idRemuneracao'+total+'" name="remuneracao'+total+'"  value="" class="form-control" placeholder="Remuneração" onkeyup="somar(this)"></td>';
    var newCell6 = newRow.insertCell(6);
    newCell6.innerHTML = '<td><input type="text" name="outras_rendas'+total+'"  value="" class="form-control" placeholder="Outras Rendas"></td>';
    var newCell7 = newRow.insertCell(7);
    newCell7.innerHTML = '<td><button class="btn btn-large btn-danger" onclick="deleteRow(this.parentNode.parentNode.rowIndex);">Excluir</button></td>';
    var total=document.getElementById('composicaototal').value++;

}
function deleteRow(i){
	document.getElementById('TabComposicao').deleteRow(i);
}

function somar(){
    var soma = 0;
    
    if (document.getElementById('idRemuneracao').value == '') {
        var remuneracao = 0;
    }else{
        var remuneracao = document.getElementById('idRemuneracao').value;
    }

    if (document.getElementById('idOutras_rendas').value == '') {
        var outra_renda = 0;
    }else{
        var outra_renda = document.getElementById('idOutras_rendas').value;
    }

    var totaldep = document.getElementById('composicaototal').value;
    for (var i = 0; i < totaldep; i++) {
      var tmpidRemuneracao = document.getElementById('idRemuneracao'+i+'').value;
      if (document.getElementById('idRemuneracao'+i+'').value == '') {
        var tmpidRemuneracao = 0;
      }
      soma = parseFloat(tmpidRemuneracao) + parseFloat(soma);
   }
    var resultado = parseFloat(soma) + parseFloat(remuneracao) + parseFloat(outra_renda);
    document.getElementById('idSoma').value = resultado; 
}

function optionCheck(){
        var option = document.getElementById("idBairro").value;
        if(option == "Outros"){
            document.getElementById("idOutro_bairro").style.visibility ="visible";
        }else{
        	document.getElementById("idOutro_bairro").style.visibility ="hidden";
        }
    }

    function change() {
    	var option = document.getElementById("idBairro").value;
    	if(option == "Outros"){
         var x = document.getElementById("nameBairro").name = "bairro";
         var x = document.getElementById("idBairro").name = "bairro";
        }else{
          var x = document.getElementById("idBairro").name = "bairro";
        }
    }

window.onload = function(){
somar(1); 
};
</script>

<form action="" method="POST" role="form">
	<div class="row">
		<div class="col-md">
			<label>Nome</label>
			<input type="text" id="idNome" placeholder="Nome" name="nome" class="form-control" value="<?=$_SESSION['PRINCIPAL']['nome'] = utf8_encode($principal['nome']);?>" required>
		</div>
		<div class="col-md">
			<label>Sexo</label>
			<select name="sexo" id="idSexo" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['sexo'] == 0) echo "selected";?>>Masculino</option>
				<option value="1" <?php if($principal['sexo'] == 1) echo "selected";?>>Feminino</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['sexo'] = $principal['sexo'];?>
		</div>
		<div class="col-md">
			<label>Estado Civil</label>
			<select name="est_civil" id="idEst_civil" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="Solteiro(a)" <?php if(utf8_encode($principal['est_civil']) == "Solteiro(a)") echo "selected";?>>Solteiro(a)</option>
				<option value="Casado(a)" <?php if(utf8_encode($principal['est_civil']) == "Casado(a)") echo "selected";?>>Casado(a)</option>
				<option value="União Estável" <?php if(utf8_encode($principal['est_civil']) == "União Estável") echo "selected";?>>União Estável</option>
				<option value="Separado(a)" <?php if(utf8_encode($principal['est_civil']) == "Separado(a)") echo "selected";?>>Separado(a)</option>
				<option value="Divorciado(a)" <?php if(utf8_encode($principal['est_civil']) == "Divorciado(a)") echo "selected";?>>Divorciado(a)</option>
				<option value="Viúvo(a)" <?php if(utf8_encode($principal['est_civil']) == "Viúvo(a)") echo "selected";?>>Viúvo(a)</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['est_civil'] = $principal['est_civil'];?>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Data Nascimento</label>
			<input type="text" id="idDt_nasc" placeholder="00/00/0000" name="dt_nasc" class="form-control" value="<?=$_SESSION['PRINCIPAL']['dt_nasc'] = $principal['dt_nasc']?>" required>
		</div>
		<div class="col-md-4 mb-3">
			<label for="validationTooltipUsername">CPF</label>
			<input type="text" class="form-control" id="idCpf" placeholder="000.000.000-00" name="cpf" class="form-control" value="<?=$_SESSION['PRINCIPAL']['cpf'] = $principal['cpf']?>" readonly required>
		</div>
		<div class="col-md">
			<label>RG</label>
			<input type="text" id="idRg" placeholder="RG" name="rg" class="form-control" value="<?=$_SESSION['PRINCIPAL']['rg'] = $principal['rg']?>" required>
		</div>
		<div class="col-md">
			<label>Telefone(Fixo)</label>
			<input type="text" id="idTelefone" placeholder="telefone" name="telefone" class="form-control" value="<?=$_SESSION['PRINCIPAL']['telefone'] = $principal['telefone']?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<label>Endereço</label>
			<input type="text" id="idEndereco" placeholder="Endereço" name="endereco" class="form-control" value="<?=$_SESSION['PRINCIPAL']['endereco'] = utf8_encode($principal['endereco']);?>">
		</div>
		<div class="col-md">
			<label>Bairro</label>
			<?php $class_bairro = $class_bairro->listaBairros(); ?>
			<select class="form-control" name="bairro" id="idBairro"  onchange="optionCheck(this); change(this)">
				<option value="">Escolha...</option>
				<?php foreach ($class_bairro as $dado_bairro): ?>
				<option value="<?=utf8_decode($dado_bairro['nome']);?>" <?php if($dado_bairro['nome'] == $principal['bairro']) echo "selected" ?>><?=utf8_encode($dado_bairro['nome']);?></option>
				<?php endforeach; ?>
			</select>
			<?php $_SESSION['PRINCIPAL']['bairro'] = utf8_encode($principal['bairro']);?>
		</div>
		<div class="col-md" style="visibility:hidden;" id="idOutro_bairro">
			<label>Outro Bairro</label>
			<input type="text" id="nameBairro" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<label>Zona</label>
			<select name="zona" id="idZona" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['zona'] == '0') echo "selected"; ?>>Urbana</option>
				<option value="1" <?php if($principal['zona'] == '1') echo "selected"; ?>>Rural</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['zona'] = $principal['zona']?>
		</div>
		<div class="col-md-3">
			<label>Naturalidade</label>
			<input type="text" id="idNaturalidade" placeholder="naturalidade" name="naturalidade" class="form-control" value="<?=$_SESSION['PRINCIPAL']['naturalidade'] = utf8_encode($principal['naturalidade'])?>">
		</div>
		<div class="col-md">
			<label>Tempo de moradia em Teófilo Otoni(em anos)</label>
			<input type="text" id="idTempo" placeholder="tempo" name="tempo" class="form-control" value="<?=$_SESSION['PRINCIPAL']['tempo'] = $principal['tempo']?>" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Ocupação</label>
			<input type="text" id="idOcupacao" placeholder="Ocupação" name="ocupacao" class="form-control" value="<?=$_SESSION['PRINCIPAL']['ocupacao'] = utf8_encode($principal['ocupacao']);?>">
		</div>
		<div class="col-md">
			<label>Remuneração</label>
			<input type="text" id="idRemuneracao" placeholder="Remuneração" name="remuneracao" class="form-control" onkeyup="somar(this)" value="<?=$_SESSION['PRINCIPAL']['remuneracao'] = number_format((float)$principal['remuneracao'], 2, '.', '')?>" onkeypress="moeda(this)">
		</div>
		<div class="col-md">
			<label>Outras Rendas</label>
			<input type="text" id="idOutras_rendas" placeholder="Outras Rendas" name="outras_rendas" class="form-control" onkeyup="somar(this)" value="<?=$_SESSION['PRINCIPAL']['outras_rendas'] = number_format((float)$principal['outras_rendas'],2, '.', '')?>" onkeypress="moeda(this)">
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>CadÚnico</label>
			<select name="cadunico" id="idCadunico" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['cadunico'] == '0') echo "selected"; ?>>Sim</option>
				<option value="1" <?php if($principal['cadunico'] == '1') echo "selected"; ?>>Não</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['cadunico'] =  $principal['cadunico']?>
		</div>
		<div class="col-md">
			<label>NIS</label>
			<input type="text" id="idNis" placeholder="111.11111.11-1" name="nis" class="form-control" value="<?=$_SESSION['PRINCIPAL']['nis'] = $principal['nis']?>" maxlength="14" minlength="14" onkeypress="formataNIS(this);" required>
		</div>
		<div class="col-md">
			<label>Bolsa Familia</label>
			<select name="bolsa_familia" id="idBolsa_familia" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['bolsa_familia'] == '0') echo "selected"; ?>>Sim</option>
				<option value="1" <?php if($principal['bolsa_familia'] == '1') echo "selected"; ?>>Não</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['bolsa_familia'] =  $principal['bolsa_familia'];?>
		</div>
		<div class="col-md">
			<label>BPC</label>
			<select name="bpc" id="idBpc" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['bpc'] == '0') echo "selected"; ?>>Sim</option>
				<option value="1" <?php if($principal['bpc'] == '1') echo "selected"; ?>>Não</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['bpc'] =  $principal['bpc'];?>
		</div>
		<div class="col-md">
			<label>Escolaridade</label>
			<select name="escolaridade" id="idEscolaridade" class="form-control" >
				<option value="">Selecione...</option>
				<option value="Sem escolaridade" <?php if($principal['escolaridade'] == 'Sem escolaridade') echo "selected"; ?>>Sem escolaridade</option>
				<option value="Ensino fundamental" <?php if($principal['escolaridade'] == 'Ensino fundamental') echo "selected"; ?>>Ensino fundamental</option>
				<option value="Ensino médio" <?php if($principal['escolaridade'] == 'Ensino médio') echo "selected"; ?>>Ensino médio</option>
				<option value="Superior imcompleto" <?php if($principal['escolaridade'] == 'Superior imcompleto') echo "selected"; ?>>Superior imcompleto</option>
				<option value="Superior completo" <?php if($principal['escolaridade'] == 'Superior completo') echo "selected"; ?>>Superior completo</option>
				<option value="Pós-graduado" <?php if($principal['escolaridade'] == 'Pós-graduado') echo "selected"; ?>>Pós-graduado</option>
				<option value="Mestrado" <?php if($principal['escolaridade'] == 'Mestrado') echo "selected"; ?>>Mestrado</option>
				<option value="Doutorado" <?php if($principal['escolaridade'] == 'Doutorado') echo "selected"; ?>>Doutorado</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['escolaridade'] =  $principal['escolaridade'];?>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Situação Imóvel</label>
			<select name="imovel" id="idImovel" class="form-control" >
				<option value="">Selecione...</option>
				<option value="Cedido" <?php if($principal['imovel'] == 'Cedido') echo "selected" ?>>Cedido</option>
				<option value="Com familiares" <?php if($principal['imovel'] == 'Com familiares') echo "selected" ?>>Com familiares</option>
				<option value="Invadido" <?php if($principal['imovel'] == 'Invadido') echo "selected" ?>>Invadido</option>
				<option value="Alugado" <?php if($principal['imovel'] == 'Alugado') echo "selected" ?>>Alugado</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['imovel'] =  $principal['imovel'];?>
		</div>
		<div class="col-md">
			<label>Quantidade de Cômodos</label>
			<input type="text" id="idComodos" placeholder="comodos" name="comodos" class="form-control" value="<?=$_SESSION['PRINCIPAL']['comodos'] = $principal['comodos']?>">
		</div>
		<div class="col-md">
			<label>Aluguel</label>
			<input type="text" id="idAluguel" placeholder="aluguel" name="aluguel" class="form-control" value="<?=$_SESSION['PRINCIPAL']['aluguel'] = number_format((float)$principal['aluguel'],2, '.', '')?>" onkeypress="moeda(this)">
		</div>
		<div class="col-md">
			<label>Área de Risco</label>
			<select name="risco" id="idRisco" class="form-control" >
				<option value="">Selecione...</option>
				<option value="0" <?php if($principal['risco'] == '0') echo "selected" ?>>Sim</option>
				<option value="1" <?php if($principal['risco'] == '1') echo "selected" ?>>Não</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['risco'] = $principal['risco']?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Email</label>
			<input type="text" id="idEmail" placeholder="email" name="email" class="form-control" value="<?=$_SESSION['PRINCIPAL']['email'] = $principal['email']?>">
		</div>
		<div class="col-md">
			<label>Tipo de deficiência encontrado em membro da família</label>
			<select name="deficiencia" id="idDeficiencia" class="form-control" >
				<option value="">Selecione...</option>
				<option value="Nenhuma" <?php if($principal['deficiencia'] == 'Nenhuma') echo "selected" ?>>Nenhuma</option>
				<option value="Motora (cadeirante)" <?php if($principal['deficiencia'] == 'Motora (cadeirante)') echo "selected" ?>>Motora (cadeirante)</option>
				<option value="Visual" <?php if($principal['deficiencia'] == 'Visual') echo "selected" ?>>Visual</option>
				<option value="Auditiva" <?php if($principal['deficiencia'] == 'Auditiva') echo "selected" ?>>Auditiva</option>
				<option value="Mental" <?php if($principal['deficiencia'] == 'Mental') echo "selected" ?>>Mental</option>
			</select>
			<?php $_SESSION['PRINCIPAL']['deficiencia'] = $principal['deficiencia']?>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Observação</label>
			<textarea name="observ" id="inputObserv" class="form-control" rows="3"><?=$_SESSION['PRINCIPAL']['observ'] = $principal['observ']?></textarea>
		</div>
	</div>
	<?php include "view_consultar_dependentes.php"; ?>
    <input type="hidden" name="id" id="id" value="<?=$principal['id']?>">
	<div class="row" style="padding-top: 30px;">
		<div class="col-md">
			<a href="imprimir.php" class="btn btn-warning">Imprimir</a>
		</div>
		<div class="col-md" align="right">
		   <button type="submit" class="btn btn-primary">Atualizar</button>
		</div>
	</div>
</form>

<?php 
if (isset($_POST['id']) && !empty($_POST['id'])) {

$princ = new Principal($pdo);
$class_bairro     = new Bairros($pdo);
//$dependente = new Dependentes($pdo);
    $id           = $_POST['id'];
	$nome         = $_POST['nome'];
	$sexo         = $_POST['sexo'];;
	$est_civil    = $_POST['est_civil'];
	$dt_nasc      = $_POST['dt_nasc'];
	$rg           = $_POST['rg'];
	$endereco     = $_POST['endereco']; 
	$bairro       = $_POST['bairro']; 
	$zona         = $_POST['zona'];
	$telefone     = $_POST['telefone'];
	$email        = $_POST['email'];
	$naturalidade = $_POST['naturalidade'];
	$tempo        = $_POST['tempo'];
	$ocupacao     = $_POST['ocupacao'];
	$remuneracao  = $_POST['remuneracao'];
	$outras_rendas= $_POST['outras_rendas'];
	$cadunico     = $_POST['cadunico'];
	$nis          = $_POST['nis']; 
	$bolsa_familia= $_POST['bolsa_familia']; 
	$bpc          = $_POST['bpc'];
	$escolaridade = $_POST['escolaridade']; 
	$imovel       = $_POST['imovel'];
	$comodos      = $_POST['comodos']; 
	$aluguel      = $_POST['aluguel'];
	$risco        = $_POST['risco'];
	$deficiencia  = $_POST['deficiencia'];
	$observ       = $_POST['observ'];
    
    if (isset($_POST['bairro']) && !empty($_POST['bairro'])) {
    	$lista_bairro = $class_bairro ->listaBairroID($bairro);
    	if (count($lista_bairro) < 1) {
	        $princ->updatePrincipal($id, $nome, $sexo, $est_civil, $dt_nasc, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ);
	        $class_bairro->inserirBairro($bairro);
	    }else{
	    	$princ->updatePrincipal($id, $nome, $sexo, $est_civil, $dt_nasc, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ);
	    }
	}else{
		    $princ->updatePrincipal($id, $nome, $sexo, $est_civil, $dt_nasc, $rg, $endereco, $bairro, $zona, $telefone, $email, $naturalidade, $tempo, $ocupacao, $remuneracao, $outras_rendas, $cadunico, $nis, $bolsa_familia, $bpc, $escolaridade, $imovel, $comodos, $aluguel, $risco, $deficiencia, $observ);
	}

	if (!empty($_POST['composicaototal'])) {
		$composicaototal = $_POST['composicaototal'];
		if($composicaototal>0){
			for ($i=1;$i<$composicaototal;$i++){
				if (isset($_POST['nome'.$i]) && !empty($_POST['nome'.$i])) {
					$tmpnome = $_POST['nome'.$i];
					$tmpidade = $_POST['idade'.$i];
					$tmpparentesco = $_POST['parentesco'.$i];
					$tmpdocumentacao = $_POST['documentacao'.$i];
					$tmpocupacao = $_POST['ocupacao'.$i];
					$tmpremuneracao = $_POST['remuneracao'.$i];
					$tmpoutras_rendas = $_POST['outras_rendas'.$i];
					$tmpdependente = $_POST['dependente'.$i];						
					$dependente->updateDependentes($id, $tmpdependente,$tmpnome, $tmpidade, $tmpparentesco, $tmpdocumentacao, $tmpocupacao, $tmpremuneracao, $tmpoutras_rendas, $tmpdependente);
				}  
			}
		}
	}
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=consulta_principal.php'>";
}
 ?>