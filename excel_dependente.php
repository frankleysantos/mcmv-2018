<meta charset="utf-8">
<?php 
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=M.C.M.V-dependente.xls");
header("Pragma: no-cache");


$dependentes = new Dependentes($pdo);
$lista = $dependentes->listaDependentesAll();

if (count($lista) > 0):
?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Idade</th>
			<th>Parentesco</th>
			<th>Documentação</th>
			<th>Ocupação</th>
			<th>Remuneração</th>
			<th>Outras Rendas</th>
		</tr>
	</thead>
<?php foreach ($lista as $dado_dependente): ?>
	    <tr>
	    	<td><?=$dado_dependente['fk_id']?></td>
			<td><?=utf8_encode($dado_dependente['nome']);?></td>
			<td><?=utf8_encode($dado_dependente['idade']);?></td>
			<td><?=utf8_encode($dado_dependente['parentesco']);?></td>
			<td><?=utf8_encode($dado_dependente['documentacao']);?></td>
			<td><?=utf8_encode($dado_dependente['ocupacao']);?></td>
			<td><?=utf8_encode($dado_dependente['remuneracao']);?></td>
			<td><?=utf8_encode($dado_dependente['outras_rendas']);?></td>
		</tr>	
<?php endforeach;?>
    </tbody>
</table>
<?php
endif;
 ?>