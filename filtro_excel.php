<meta charset="utf-8">
<?php 
session_start();
if (isset($_SESSION['DADOS']['count']) && !empty($_SESSION['DADOS']['count'])) {

header("Content-type: application/vnd.ms-excel");
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=MCMV_FILTRO.xls");
header("Pragma: no-cache");
?>
<table class="table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Estado Civil</th>
			<th>Data Nascimento</th>
			<th>CPF</th>
			<th>Identidade</th>
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
			<th>Rede Eletrica</th>
			<th>Rede Água</th>
			<th>Rede Esgoto</th>
			<th>Situação Lote</th>
			<th>Quantidade de Imóveis no Lote</th>
		</tr>
	</thead>
	<tbody>	
	<?php for ($i=1; $i <= $_SESSION['DADOS']['count'] ; $i++): ?> 
	<tr>
		<td><?=$_SESSION['DADOS']['nome'.$i]?></td>
		<td><?=$_SESSION['DADOS']['est_civil'.$i]?></td>
		<td><?=$_SESSION['DADOS']['dt_nasc'.$i]?></td>
		<td><?=$_SESSION['DADOS']['cpf'.$i]?></td>
		<td><?=$_SESSION['DADOS']['rg'.$i]?></td>
		<td><?=$_SESSION['DADOS']['endereco'.$i]?></td>
		<td><?=$_SESSION['DADOS']['bairro'.$i]?></td>
		<td><?php if($_SESSION['DADOS']['zona'.$i] == '0'): echo "Urbana"; else: echo "Rural"; endif;?></td>
		<td><?=$_SESSION['DADOS']['telefone'.$i]?></td>
		<td><?=$_SESSION['DADOS']['email'.$i]?></td>
		<td><?=$_SESSION['DADOS']['naturalidade'.$i]?></td>
		<td><?=$_SESSION['DADOS']['tempo'.$i]?></td>
		<td><?=$_SESSION['DADOS']['ocupacao'.$i]?></td>
		<td><?=$_SESSION['DADOS']['remuneracao'.$i]?></td>
		<td><?=$_SESSION['DADOS']['outras_rendas'.$i]?></td>
		<td><?php if($_SESSION['DADOS']['cadunico'.$i] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?=$_SESSION['DADOS']['nis'.$i]?></td>
		<td><?php if($_SESSION['DADOS']['bolsa_familia'.$i] == '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?php if($_SESSION['DADOS']['bpc'.$i]== '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?=$_SESSION['DADOS']['escolaridade'.$i]?></td>
		<td><?=$_SESSION['DADOS']['imovel'.$i]?></td>
		<td><?=$_SESSION['DADOS']['comodos'.$i]?></td>
		<td><?=$_SESSION['DADOS']['aluguel'.$i]?></td>
		<td><?php if($_SESSION['DADOS']['risco'.$i]== '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?=$_SESSION['DADOS']['deficiencia'.$i]?></td>
		<td><?php if($_SESSION['DADOS']['rede_eletrica'.$i]== '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?php if($_SESSION['DADOS']['rede_agua'.$i]== '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?php if($_SESSION['DADOS']['rede_esgoto'.$i]== '0'): echo "Sim"; else: echo "Não"; endif?></td>
		<td><?php if($_SESSION['DADOS']['situacao_lote'.$i]== '0'): echo "Casa Construída"; else: echo "Lote Vago"; endif?></td>
		<td><?=$_SESSION['DADOS']['qnt_imovel'.$i]?></td>
	</tr>
	<?php endfor;?>
	</tbody>
</table>
<?php 
}else{
	header("Location: filtro.php");
}

 ?>