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
</script>
<form action="" method="POST" role="form">
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
			<input type="text" id="idDt_nasc" placeholder="00/00/0000" name="dt_nasc" class="form-control" onkeypress="dataConta(this);" minlength="10" maxlength="10" required>
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
				<option value="Visual">Visual</option>
				<option value="Auditiva">Auditiva</option>
				<option value="Mental">Mental</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<label>Observação</label>
			<textarea name="observ" id="inputObserv" class="form-control" rows="3" ></textarea>
		</div>
	</div>
	<?php include "view_cadastrar_dependentes.php"; ?>
	<br>
	<div class="row" style="padding-top: 30px;">
		<div class="col-md"><button type="submit" class="btn btn-primary">Cadastrar</button></div>
	</div>
</form>