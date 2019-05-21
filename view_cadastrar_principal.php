<script type="text/javascript">
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
         var x = document.getElementById("idBairro").name = "";
        }else{
          var x = document.getElementById("idBairro").name = "bairro";
          var x = document.getElementById("nameBairro").name = "";
        }
    }

    function optionPPME(){
        var option = document.getElementById("idPPME").value;
        //id 2 se refere ao tipo de Cadastro PPME
        if(option == "2"){
            document.getElementById("idCampoPPME").style.visibility ="visible";
            document.getElementById("idFile").style.visibility ="visible";
            document.getElementById("idRede_eletrica").setAttribute('required', 'required');
            document.getElementById("idRede_esgoto").setAttribute('required', 'required');
            document.getElementById("idRede_agua").setAttribute('required', 'required');
            document.getElementById("idSit_Lote").setAttribute('required', 'required');
            document.getElementById("idQnt_imovel").setAttribute('required', 'required');
        }else{
        	document.getElementById("idCampoPPME").style.visibility ="hidden";
        	document.getElementById("idFile").style.visibility ="hidden";
        	document.getElementById("idRede_eletrica").value = "";
        	document.getElementById("idRede_eletrica").removeAttribute('required', 'required');
        	document.getElementById("idRede_esgoto").value = "";
        	document.getElementById("idRede_esgoto").removeAttribute('required', 'required');
        	document.getElementById("idRede_agua").value = "";
        	document.getElementById("idRede_agua").removeAttribute('required', 'required');
        	document.getElementById("idSit_Lote").value = "";
        	document.getElementById("idSit_Lote").removeAttribute('required', 'required');
        	document.getElementById("idQnt_imovel").value = "";
        	document.getElementById("idQnt_imovel").removeAttribute('required', 'required');
        }
    }
</script>
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md">
			<label>Tipo de Cadastro</label>
			<select name="tipoformulario" id="idPPME" class="form-control" required="required" onchange="optionPPME(this); changePPME(this)" required>
				<option value="" disabled selected>Selecione o tipo</option>
				<?php foreach ($tipo as $info_tipo):?>
				<option value="<?=$info_tipo['id']?>"><?=$info_tipo['tipo']?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Nome</label>
			<input type="text" id="idNome" placeholder="Nome" name="nome" class="form-control" required>
		</div>
		<div class="col-md">
			<label>Sexo</label>
			<select name="sexo" id="idSexo" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="0">Masculino</option>
				<option value="1">Feminino</option>
			</select>
		</div>
		<div class="col-md">
			<label>Estado Civil</label>
			<select name="est_civil" id="idEst_civil" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="Solteiro(a)">Solteiro(a)</option>
				<option value="Casado(a)">Casado(a)</option>
				<option value="União Estável">União Estável</option>
				<option value="Separado(a)">Separado(a)</option>
				<option value="Divorciado(a)">Divorciado(a)</option>
				<option value="Viúvo(a)">Viúvo(a)</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Data Nascimento</label>
			<input type="date" id="idDt_nasc" placeholder="00/00/0000" name="dt_nasc" class="form-control" required>
		</div>
		<div class="col-md">
			<label>CPF</label>
			<input type="text" id="idCpf" placeholder="000.000.000-00" name="cpf" class="form-control" maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);" required>
		</div>
		<div class="col-md">
			<label>RG</label>
			<input type="text" id="idRg" placeholder="RG" name="rg" class="form-control" required>
		</div>
		<div class="col-md">
			<label>Telefone(Fixo)</label>
			<input type="text" id="idTelefone" placeholder="telefone" name="telefone" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<label>Endereço</label>
			<input type="text" id="idEndereco" placeholder="Endereço" name="endereco" class="form-control" required>
		</div>
		<div class="col-md">
			<label>Bairro</label>
			<?php $class_bairro = $class_bairro->listaBairros(); ?>
			<select class="form-control" name="bairro" id="idBairro"  onchange="optionCheck(this); change(this)" required>
				<option value="">Escolha...</option>
				<?php foreach ($class_bairro as $dado_bairro): ?>
				<option value="<?=utf8_decode($dado_bairro['nome']);?>"><?=utf8_encode($dado_bairro['nome']);?></option>	
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-md" style="visibility:hidden;" id="idOutro_bairro">
			<label>Outro Bairro</label>
			<input type="text" class="form-control" id="nameBairro">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<label>Zona</label>
			<select name="zona" id="idZona" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="0">Urbana</option>
				<option value="1">Rural</option>
			</select>
		</div>
		<div class="col-md-3">
			<label>Naturalidade</label>
			<input type="text" id="idNaturalidade" placeholder="naturalidade" name="naturalidade" class="form-control" required>
		</div>
		<div class="col-md">
			<label>Tempo de moradia em Teófilo Otoni(em anos)</label>
			<input type="text" id="idTempo" placeholder="tempo" name="tempo" class="form-control" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Ocupação</label>
			<input type="text" id="idOcupacao" placeholder="Ocupação" name="ocupacao" class="form-control">
		</div>
		<div class="col-md" required>
			<label>Remuneração</label>
			<input type="text" id="idRemuneracao" placeholder="Remuneração" name="remuneracao" class="form-control" onkeyup="somar(this);" onkeypress="moeda(this)" required>
		</div>
		<div class="col-md">
			<label>Outras Rendas</label>
			<input type="text" id="idOutras_rendas" placeholder="Outras Rendas" name="outras_rendas" class="form-control" onkeyup="somar(this)" onkeypress="moeda(this)" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>CadÚnico</label>
			<select name="cadunico" id="idCadunico" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
		<div class="col-md">
			<label>NIS</label>
			<input type="text" id="idNis" placeholder="111.11111.11-1" name="nis" class="form-control" maxlength="14" minlength="14" onkeypress="formataNIS(this);" required>
		</div>
		<div class="col-md">
			<label>Bolsa Familia</label>
			<select name="bolsa_familia" id="idBolsa_familia" class="form-control" required>
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
		<div class="col-md">
			<label>Escolaridade</label>
			<select name="escolaridade" id="idEscolaridade" class="form-control" required>
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
	</div>
	<div class="row">
		<div class="col-md">
			<label>Situação Imóvel</label>
			<select name="imovel" id="idImovel" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="Cedido">Cedido</option>
				<option value="Com familiares">Com familiares</option>
				<option value="Invadido">Invadido</option>
				<option value="Alugado">Alugado</option>
				<option value="Próprio">Próprio</option>
			</select>
		</div>
		<div class="col-md">
			<label>Quantidade de Cômodos</label>
			<input type="text" id="idComodos" placeholder="comodos" name="comodos" class="form-control" required>
		</div>
		<div class="col-md">
			<label>Aluguel</label>
			<input type="text" id="idAluguel" placeholder="aluguel" name="aluguel" class="form-control" required onkeypress="moeda(this);">
		</div>
		<div class="col-md">
			<label>Área de Risco</label>
			<select name="risco" id="idRisco" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="0">Sim</option>
				<option value="1">Não</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<label>Email</label>
			<input type="text" id="idEmail" placeholder="email" name="email" class="form-control">
		</div>
		<div class="col-md">
			<label>Tipo de deficiência encontrado em membro da família</label>
			<select name="deficiencia" id="idDeficiencia" class="form-control" required>
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
	</div>
	
	<div class="row" style="visibility:hidden;" id="idCampoPPME">
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
		<div class="col-md">
			<label>Observação</label>
			<textarea name="observ" id="inputObserv" class="form-control" rows="3" ></textarea>
		</div>
	</div>
	<?php include "view_cadastrar_dependentes.php"; ?>
	<div class="form-group" style="visibility:hidden;" id="idFile">
		<h4>Faça o upload dos Arquivos</h4>
		<input type="file" class="form-control" name="myfile[]" multiple accept="image/png, image/jpeg">
	</div>
	<div class="row" style="padding-top: 30px;">
		<div class="col-md d-flex justify-content-end"><button type="submit" class="btn btn-primary">Cadastrar</button></div>
	</div>
</form>