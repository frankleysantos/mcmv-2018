<script type="text/javascript">
	function adicionarLinha(){
    var local=document.getElementById('TabComposicao');
    var tblBody = local.tBodies[0];
    var newRow = tblBody.insertRow(-1);  
    var total  = document.getElementById('composicaototal').value;
    var newCell0 = newRow.insertCell(0);
    newCell0.innerHTML = '<td><input type="text" name="nome'+total+'"  value="" class="form-control" placeholder="Nome" required></td>';
    var newCell1 = newRow.insertCell(1);
    newCell1.innerHTML = '<td><input type="text" name="idade'+total+'"  value="" class="form-control" placeholder="Idade" required></td>';
    var newCell2 = newRow.insertCell(2);
    newCell2.innerHTML = '<td><select name="parentesco'+total+'" id="input" class="form-control" required="required"><option value="">Escolha...</option>     <option value="Cônjuge">Cônjuge</option>  <option value="Companheiro(a)">Companheiro(a)</option>  <option value="Filho(a)">Filho(a)</option>  <option value="Enteado(a)">Enteado(a)</option> <option value="Genro/Nora">Genro/Nora</option>  <option value="Pai/Mãe">Pai/Mãe</option>   <option value="Sogro(a)">Sogro(a)</option>  <option value="Neto(a)">Neto(a)</option>  <option value="Bisneto(a)">Bisneto(a)</option>  <option value="Irmão/Irmã">Irmão/Irmã</option>  <option value="Avô/Avó">Avô/Avó</option> <option value="Tio(a)">Tio(a)</option> <option value="Primo(a)">Primo(a)</option> <option value="Cunhado(a)">Cunhado(a)</option> <option value="Outro parentesco">Outro parentesco</option> <option value="Agregado(a)">Agregado(a)</option> <option value="Pensionista">Pensionista</option> <option value="Convivente">Convivente</option></select></td>';
    var newCell3 = newRow.insertCell(3);
    newCell3.innerHTML = '<td><input type="text" name="documentacao'+total+'"  value="" class="form-control" placeholder="Documentação" required></td>';
    var newCell4 = newRow.insertCell(4);
    newCell4.innerHTML = '<td><input type="text" name="ocupacao'+total+'"  value="" class="form-control" placeholder="Ocupacao" required></td>';
    var newCell5 = newRow.insertCell(5);
    newCell5.innerHTML = '<td><input type="text" id="idRemuneracao'+total+'" name="remuneracao'+total+'"  value="" class="form-control" placeholder="Remuneração" onkeyup="somar(this)" onkeypress="moeda(this)" required></td>';
    var newCell6 = newRow.insertCell(6);
    newCell6.innerHTML = '<td><input type="text" id="idOutras_rendas'+total+'" name="outras_rendas'+total+'"  value="" class="form-control" placeholder="Outras Rendas" onkeyup="somar(this)" onkeypress="moeda(this)" required></td>';
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
      var tmpidRemuneracao   = document.getElementById('idRemuneracao'+i+'').value;
      var tmpidOutras_rendas = document.getElementById('idOutras_rendas'+i+'').value;
      if (document.getElementById('idRemuneracao'+i+'').value == '') {
        var tmpidRemuneracao = 0;
      }
      if (document.getElementById('idOutras_rendas'+i+'').value == '') {
        var tmpidOutras_rendas = 0;
      }
      soma = parseFloat(tmpidRemuneracao) + parseFloat(tmpidOutras_rendas) + parseFloat(soma);
   }
    var resultado = parseFloat(soma) + parseFloat(remuneracao) + parseFloat(outra_renda);
    document.getElementById('idSoma').value = "R$"+resultado; 
}
window.onload = function(){
somar(); 
};
</script>
<table class='table table-striped table-bordered table-hover' id="TabComposicao">
	<thead>
		<tr align="center">
			<th colspan="8">Composição familiar</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Nome</td>
			<td>Idade</td>
			<td>Parentesco</td>
			<td>Documento</td>
			<td>Ocupacao</td>
			<td>Remuneração</td>
			<td>Outras Rendas</td>
			<td>Ação</td>
		</tr>
	</tbody>
</table>
<div class="row">
<div class="col-md-12">
        <input type="hidden" name="composicaototal" id="composicaototal" value="<?php if(empty($_SESSION['NOTA']['composicaototal'])) echo 0; else echo $_SESSION['NOTA']['composicaototal'] ?>" />
</div>
</div>
<div class="row">
  <div class="col-md"><button class="btn btn-large btn-success fa fa-plus-square" onclick="adicionarLinha()" type="button">&ensp;Adicionar Composição</button></div>
  <div class="col-md">Renda Familiar:<input type="text" name="soma" id="idSoma" class="form-control" disabled></div>
</div>