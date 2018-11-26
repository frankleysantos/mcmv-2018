<script type="text/javascript" DEFER="DEFER">
	function adicionarLinha(){
    var local=document.getElementById('TabComposicao');
    var tblBody = local.tBodies[0];
    var newRow = tblBody.insertRow(-1);  
    var total  = document.getElementById('composicaototal').value;
    var newCell0 = newRow.insertCell(0);
    newCell0.innerHTML = '<td><input type="text" name="nome'+total+'"  value="" class="form-control" placeholder="Nome" required="required"></td>';
    var newCell1 = newRow.insertCell(1);
    newCell1.innerHTML = '<td><input type="text" name="idade'+total+'"  value="" class="form-control" placeholder="Idade" required="required"></td>';
    var newCell2 = newRow.insertCell(2);
    newCell2.innerHTML = '<td><select name="parentesco'+total+'" id="input" class="form-control" required="required"><option value="">Escolha...</option>     <option value="CônjugeCônjuge">Cônjuge</option>  <option value="Companheiro(a)">Companheiro(a)</option>  <option value="Filho(a)">Filho(a)</option>  <option value="Enteado(a)">Enteado(a)</option> <option value="Genro/Nora">Genro/Nora</option>  <option value="Pai/Mãe">Pai/Mãe</option>   <option value="Sogro(a)">Sogro(a)</option>  <option value="Neto(a)">Neto(a)</option>  <option value="Bisneto(a)">Bisneto(a)</option>  <option value="Irmão/Irmã">Irmão/Irmã</option>  <option value="Avô/Avó">Avô/Avó</option> <option value="Tio(a)">Tio(a)</option> <option value="Primo(a)">Primo(a)</option> <option value="Cunhado(a)">Cunhado(a)</option> <option value="Outro parentesco">Outro parentesco</option> <option value="Agregado(a)">Agregado(a)</option> <option value="Pensionista">Pensionista</option> <option value="Convivente">Convivente</option></select></td>';
    var newCell3 = newRow.insertCell(3);
    newCell3.innerHTML = '<td><input type="text" name="documentacao'+total+'"  value="" class="form-control" placeholder="Documentação" required="required"></td>';
    var newCell4 = newRow.insertCell(4);
    newCell4.innerHTML = '<td><input type="text" name="ocupacao'+total+'"  value="" class="form-control" placeholder="Ocupacao" required="required"></td>';
    var newCell5 = newRow.insertCell(5);
    newCell5.innerHTML = '<td><input type="text" id="idRemuneracao'+total+'" name="remuneracao'+total+'"  value="" class="form-control" placeholder="Remuneração" onkeyup="somar(this)" onkeypress="moeda(this)" required="required"></td>';
    var newCell6 = newRow.insertCell(6);
    newCell6.innerHTML = '<td><input type="text" id="idOutras_rendas'+total+'" name="outras_rendas'+total+'"  value="" class="form-control" placeholder="Outras Rendas" onkeyup="somar(this)" onkeypress="moeda(this)" required="required"></td>';
    var newCell7 = newRow.insertCell(7);
    newCell7.innerHTML = '<td><button class="btn btn-large btn-danger fa fa-trash" onclick="deleteRow(this.parentNode.parentNode.rowIndex);"></button></td>';
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
        var tmpidRemuneracao = 0;
      }
      soma = parseFloat(tmpidRemuneracao) + parseFloat(tmpidOutras_rendas) + parseFloat(soma);
   }
    var resultado = parseFloat(soma) + parseFloat(remuneracao) + parseFloat(outra_renda);
    document.getElementById('idSoma').value = resultado; 
}
</script>
<?php 
$dependente_id = $principal['id'];
$consulta_dep = $dependente->listaDependentes($dependente_id);
$contador = count($consulta_dep);
 ?>
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
        <?php
        $i = 0; 
        foreach ($consulta_dep as $consulta): 
        $i++;
        $_SESSION['DEPENDENTE']['contador']  = $i;    
        ?>
        <tr>
            <td><input type="text" name="nome<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['nome'.$i] = utf8_encode($consulta['nome']);?>" class="form-control"></td>
            <td><input type="text" name="idade<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['idade'.$i] = $consulta['idade'];?>" class="form-control"></td>
            <td>
                <!--<input type="text" name="parentesco<?=$i?>" value="<?=utf8_encode($consulta['parentesco']);?>" class="form-control">-->
                <select name="parentesco<?=$i?>" class="form-control">
                    <option value="">Escolha...</option>     
                    <option value="Cônjuge" <?php if(utf8_encode($consulta['parentesco']) == 'Cônjuge') echo "selected";?>>Cônjuge</option>  
                    <option value="Companheiro(a)" <?php if($consulta['parentesco'] == 'Companheiro(a)') echo "selected";?>>Companheiro(a)</option>  
                    <option value="Filho(a)"<?php if($consulta['parentesco'] == 'Filho(a)') echo "selected";?>>Filho(a)</option>  
                    <option value="Enteado(a)" <?php if($consulta['parentesco'] == 'Enteado(a)') echo "selected";?>>Enteado(a)</option> 
                    <option value="Genro/Nora" <?php if($consulta['parentesco'] == 'Genro/Nora') echo "selected";?>>Genro/Nora</option>  
                    <option value="Pai/Mãe" <?php if(utf8_encode($consulta['parentesco']) == 'Pai/Mãe') echo "selected";?>>Pai/Mãe</option>   
                    <option value="Sogro(a)" <?php if($consulta['parentesco'] == 'Sogro(a)') echo "selected";?>>Sogro(a)</option>  
                    <option value="Neto(a)" <?php if($consulta['parentesco'] == 'Neto(a)') echo "selected";?>>Neto(a)</option>  
                    <option value="Bisneto(a)" <?php if($consulta['parentesco'] == 'Bisneto(a)') echo "selected";?>>Bisneto(a)</option>  
                    <option value="Irmão/Irmã" <?php if(utf8_encode($consulta['parentesco']) == 'Irmão/Irmã') echo "selected";?>>Irmão/Irmã</option>  
                    <option value="Avô/Avó" <?php if(utf8_encode($consulta['parentesco']) == 'Avô/Avó') echo "selected";?>>Avô/Avó</option> 
                    option value="Tio(a)">Tio(a)</option> 
                    <option value="Primo(a)" <?php if($consulta['parentesco'] == 'Primo(a)') echo "selected";?>>Primo(a)</option> 
                    <option value="Cunhado(a)" <?php if($consulta['parentesco'] == 'Cunhado(a)') echo "selected";?>>Cunhado(a)</option> 
                    <option value="Outro parentesco" <?php if($consulta['parentesco'] == 'Outro parentesco') echo "selected";?>>Outro parentesco</option> 
                    <option value="Agregado(a)" <?php if($consulta['parentesco'] == 'Agregado(a)') echo "selected";?>>Agregado(a)</option> 
                    <option value="Pensionista" <?php if($consulta['parentesco'] == 'Pensionista') echo "selected";?>>Pensionista</option> 
                    <option value="Convivente" <?php if($consulta['parentesco'] == 'Convivente') echo "selected";?>>Convivente</option>
                </select>
                <?php $_SESSION['DEPENDENTE']['parentesco'.$i] = $consulta['parentesco']?>
            </td>
            <td><input type="text" name="documentacao<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['documentacao'.$i] =$consulta['documentacao'];?>" class="form-control"></td>
            <td><input type="text" name="ocupacao<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['ocupacao'.$i] = utf8_encode($consulta['ocupacao']);?>" class="form-control"></td>
            <td><input type="text" name="remuneracao<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['remuneracao'.$i] = number_format((float)$consulta['remuneracao'],2, '.', '');?>" class="form-control" onkeypress="moeda(this)"></td>
            <td><input type="text" name="outras_rendas<?=$i?>" value="<?=$_SESSION['DEPENDENTE']['outras_rendas'.$i] = number_format((float)$consulta['outras_rendas'],2, '.', '');?>" class="form-control" onkeypress="moeda(this)"></td>
            <td><abbr title="Excluir dados"><a class="btn btn-danger fa fa-trash" href="?id=<?=$consulta['dependente']?>&cpf=<?=$principal['cpf']?>"></a></abbr></td>
            <input type="hidden" name="dependente<?=$i?>" value="<?=$consulta['dependente']?>">
        </tr>
        <?php
        endforeach; 
        ?>
	</tbody>
</table>
<div class="row">
<div class="col-md-12">
        <input type="hidden" name="composicaototal" id="composicaototal" value="<?php if(empty($_SESSION['NOTA']['composicaototal'])) echo $contador+1; else echo $_SESSION['NOTA']['composicaototal'] ?>" />
</div>
</div>
<div class="row">
  <div class="col-md"><button class="btn btn-large btn-success fa fa-plus-square" onclick="adicionarLinha()" type="button">&ensp;Adicionar Composição</button></div>
  <div class="col-md">Renda Familiar:<input type="text" name="soma" id="idSoma" class="form-control" disabled></div>
</div>