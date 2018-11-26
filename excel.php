<meta charset="utf-8">
<?php 
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
header("Content-type: application/vnd.ms-excel");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=MCMV.xls");
header("Pragma: no-cache");

$principal = new Principal($pdo);
$dados = $principal->listaAllPrincipal();
$dependentes = new Dependentes($pdo);
$soma = $dependentes->somarValores();

if (count($dados) > 0):
?>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Sexo</th>
			<th>Estado Civil</th>
			<th>Data Nascimento</th>
			<th>CPF</th>
			<th>RG</th>
			<th>Endereço</th>
			<th>Bairro</th>
			<th>Zona</th>
			<th>Telefone</th>
			<th>Email</th>
			<th>Naturalidade</th>
			<th>Tempo</th>
			<th>Ocupação</th>
			<th>Remuneração</th>
			<th>Outras Rendas</th>
			<th>CadÚnico</th>
			<th>NIS</th>
			<th>Bolsa Familia</th>
			<th>BPC</th>
			<th>Escolaridade</th>
			<th>Imovel</th>
			<th>Cômodos</th>
			<th>Alugel</th>
			<th>Risco</th>
			<th>Deficiência</th>
			<th>Quantidade de Dependentes</th>
			<th>Total Remuneração Dependentes</th>
			<th>Total Outras Rendas Dependentes</th>
		</tr>
	</thead>
<?php foreach ($dados as $dado_principal): ?>
	    <tr>
	    	<td><?=$dado_principal['id']?></td>
			<td><?=utf8_encode($dado_principal['nome']);?></td>
			<td><?php if($dado_principal['sexo'] == '0'): echo "Masculino"; else: echo "Feminino"; endif?></td>
			<td><?=utf8_encode($dado_principal['est_civil']);?></td>
			<td><?=utf8_encode($dado_principal['dt_nasc']);?></td>
			<td><?=utf8_encode($dado_principal['cpf']);?></td>
			<td><?=utf8_encode($dado_principal['rg']);?></td>
			<td><?=utf8_encode($dado_principal['endereco']);?></td>
			<td><?=utf8_encode($dado_principal['bairro']);?></td>
			<td><?php if($dado_principal['zona'] == '0'): echo "Urbana"; else: echo "Rural"; endif?></td>
			<td><?=utf8_encode($dado_principal['telefone']);?></td>
			<td><?=utf8_encode($dado_principal['email']);?></td>
			<td><?=utf8_encode($dado_principal['naturalidade']);?></td>
			<td><?=utf8_encode($dado_principal['tempo']);?></td>
			<td><?=utf8_encode($dado_principal['ocupacao']);?></td>
			<td><?=utf8_encode($dado_principal['remuneracao']);?></td>
			<td><?=utf8_encode($dado_principal['outras_rendas']);?></td>
			<td><?php if($dado_principal['cadunico'] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
			<td><?=utf8_encode($dado_principal['nis']);?></td>
			<td><?php if($dado_principal['bolsa_familia'] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
			<td><?php if($dado_principal['bpc'] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
			<td><?=utf8_encode($dado_principal['escolaridade']);?></td>
			<td><?=utf8_encode($dado_principal['imovel']);?></td>
			<td><?=utf8_encode($dado_principal['comodos']);?></td>
			<td><?=utf8_encode($dado_principal['aluguel']);?></td>
			<td><?php if($dado_principal['risco'] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
			<td><?=utf8_encode($dado_principal['deficiencia']);?></td>
			<?php foreach ($soma as $soma_dep):
                    if ($dado_principal['id'] == $soma_dep['fk_id']):
            ?>      
                    <td><?=$soma_dep['quant'];?></td>
                 	<td><?=$soma_dep['remun'];?></td>
                 	<td><?=$soma_dep['rendas'];?></td>
                 
            <?php 
                    endif;
	              endforeach;
	        ?>
		</tr>	
<?php endforeach;?>
    </tbody>
</table>
<?php
endif;
 ?>