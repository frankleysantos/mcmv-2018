<?php
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";
require "classes/TipoCadastro.class.php";

$principal  = new Principal($pdo);
$dependente = new Dependentes($pdo);
$class_bairro     = new Bairros($pdo);
$tipo_cadastro 		= new TipoCadastro($pdo);

$tipo = $tipo_cadastro->listar();


if (!isset($_POST['cpf']) && !isset($_GET['cpf'])):?>
	<?php if (isset($_GET['1'])): ?>
	<script type="text/javascript">
		$(window).load(function() {
			$('#exemplomodal').modal('show');
		});
	</script>
	<div class="modal fade" tabindex="-1" role="dialog" id="exemplomodal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">MCMV</h5>

        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>

				</div>
				<div class="modal-body">
					<form action="" method="POST" role="form">
						<legend align="center">Buscar Por CPF</legend>

					<div class="form-group">
						<label>CPF:</label>
					<input type="text" class="form-control" id="idCpf" placeholder="000.000.000-00" name="cpf" required maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);">
					</div>
					<div align="right">
						<button type="submit" class="btn btn-primary">Buscar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endif ?>
	<h4 align="center">Prefeitura Municipal de Teófilo Otoni</h4>
	<h4 align="center">Sistema de Gestão de Recursos Sociais.</h4>
	<form action="info_cadastrado.php" method="POST">
  		<div class="form-row align-items-center">
    		<div class="col-auto">
      			<label class="sr-only" for="inlineFormInputGroup">CPF</label>
      			<div class="input-group mb-2">
        			<div class="input-group-prepend">
          				<div class="input-group-text">CPF</div>
        			</div>
        			<abbr title="Insira o CPF do Cadastrado, para retornar algumas informações!" class="initialism"><input type="text" class="form-control" id="idCpf" name="cpf" required placeholder="000.000.000-00" maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);"></abbr>
      			</div>
    		</div>
    		<div class="col-auto">
      			<button type="submit" class="btn btn-primary mb-2">Buscar</button>
    		</div>
  		</div>
	</form>
	<table class="table table-hover table-striped">
		<?php 
		$tcadastros = $principal->listaQntProgramas();
		$total = $principal->countPrincipal(); 
		$total_cad = $total['total'];
        $paginas = $total_cad / 10;
 
        $qntpg = 10;
        $pg= 1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
 			$pg = addslashes($_GET['p']);
 		}
 			$p = ($pg-1) * $qntpg;
		?>
		<legend align="center">Cadastrados MCMV:<?=$tcadastros['tmcmv']?>  -  Cadastrados PPME:<?=$tcadastros['tppme']?></legend>
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
			</tr>
		</thead>
		<tbody>
			<?php $info_principal = $principal->listaAllPrincipalPage($p, $qntpg); ?>
			<?php foreach ($info_principal as $imp_principal): ?>
			<tr>
				<td><?=utf8_encode($imp_principal['nome'])?></td>
				<td><?=$imp_principal['cpf']?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<nav aria-label="Menu">
  		<ul class="pagination">
  			<?php
  			if (isset($_GET['p']) && !empty($_GET['p'])) {
  			 	$pag = $_GET['p'];
  			}else{
  				$pag = 1;
  			}      
  			?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($pag-1)?>">Previous</a></li>
    		<?php
    		if (!isset($pag) || $pag < 6):
    		$proxpag = 6; 
    		for ($q=0; $q < $proxpag; $q++): ?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($q+1)?>"><?=($q+1)?></a></li>
    		<?php endfor ?>
    		<?php endif; ?>
    		<?php
    		if (isset($pag) && !empty($pag)):
    			if ($pag >= 6) {
    			$q = $pag -6;
    			for ($q; $q < $pag; $q++): ?>
    			<?php if ($pag < $paginas): ?>
    				<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($q+1)?>"><?=($q+1)?></a></li>
    			<?php endif; ?>
    			<?php 
    			if ($pag > $paginas) {
    				
    			?>
    			<li class="page-item"><a class="btn btn-danger" href="./consulta_principal.php?p=<?=$pag?>">Última Página</a></li>
    			<?php
    			$pag = 0;
    			}
    			endfor;
    			}
    		endif;
    		?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($pag+1)?>">Next</a></li>
  		</ul>
	</nav>
	<?php
	/*  
	echo "<hr/>";
 	for ($q=0; $q < $paginas; $q++) { 
 		echo '<a href="./consulta_principal.php?p='.($q+1).'" class="btn btn-warning">'.($q+1).'</a>';
 	}
 	*/
 	?>
    
<?php 
endif; 

if (isset($_POST['cpf']) && !empty($_POST['cpf']) || isset($_GET['cpf']) && !empty($_GET['cpf'])):
	if (isset($_POST['cpf'])) {
		$cpf = $_POST['cpf'];
	}
	if(isset($_GET['cpf']) ){
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$dependente->excluirDependentes($id);
			echo "<span class='badge badge-danger form-control'>Dependente excluido!</span>";
		}
		
		$cpf = $_GET['cpf'];
	}
	
	$principal = $principal ->listaPrincipal($cpf);
	if (!empty($principal)):
		include "view_consulta_principal.php";
	else:
		?>
		<script type="text/javascript">
			$(window).load(function() {
				$('#exemplomodal').modal('show');
			});
		</script>
		<div class="modal fade" tabindex="-1" role="dialog" id="exemplomodal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">MCMV</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>CPF não encontrado!</strong><a href="index.php">Clique aqui para cadastrar.</a>.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
							<form action="" method="POST" role="form">
							<legend align="center">Buscar Por CPF</legend>

						<div class="form-group">
							<label>CPF:</label>
							<input type="text" class="form-control" id="idCpf" placeholder="Digitar CPF" name="cpf" required maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);">
						</div>
						<div align="right">
							<button type="submit" class="btn btn-primary">Buscar</button>
						</div>
							</form>
					</div>
				</div>
			</div>
		</div>
		<h4 align="center">Prefeitura Municipal de Teófilo Otoni</h4>
		<h4 align="center">Sistema Minha Casa Minha Vida</h4>
	<table class="table table-hover table-striped">
		<?php $principal = new Principal($pdo); ?>
		<?php $total = $principal->countPrincipal(); 
		$total_cad = $total['total'];
        $paginas = $total_cad / 10;0;
 
        $qntpg = 10;
        $pg= 1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
 			$pg = addslashes($_GET['p']);
 		}
 			$p = ($pg-1) * $qntpg;
		?>
		<legend align="center">Pessoas Cadastradas:<?=$total_cad?></legend>
		<thead>
			<tr>
				<th>Nome</th>
				<th>CPF</th>
			</tr>
		</thead>
		<tbody>
			<?php $info_principal = $principal->listaAllPrincipalPage($p, $qntpg);; ?>
			<?php foreach ($info_principal as $imp_principal): ?>
			<tr>
				<td><?=utf8_encode($imp_principal['nome'])?></td>
				<td><?=$imp_principal['cpf']?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<nav aria-label="Menu">
  		<ul class="pagination">
  			<?php
  			if (isset($_GET['p']) && !empty($_GET['p'])) {
  			 	echo $pag = $_GET['p'];
  			}else{
  				$pag = 1;
  			}      
  			?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($pag-1)?>">Previous</a></li>
    		<?php
    		if (!isset($pag) || $pag < 6):
    		$proxpag = 6; 
    		for ($q=0; $q < $proxpag; $q++): ?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($q+1)?>"><?=($q+1)?></a></li>
    		<?php endfor ?>
    		<?php endif; ?>
    		<?php
    		if (isset($pag) && !empty($pag)):
    			if ($pag >= 6) {
    			$q = $pag -6;
    			for ($q; $q < $pag; $q++): ?>
    			<?php if ($pag < $paginas): ?>
    				<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($q+1)?>"><?=($q+1)?></a></li>
    			<?php endif; ?>
    			<?php 
    			if ($pag > $paginas) {
    				
    			?>
    			<li class="page-item"><a class="btn btn-danger" href="./consulta_principal.php?p=<?=$pag?>">Última Página</a></li>
    			<?php
    			$pag = 0;
    			}
    			endfor;
    			}
    		endif;
    		?>
    		<li class="page-item"><a class="page-link" href="./consulta_principal.php?p=<?=($pag+1)?>">Next</a></li>
  		</ul>
	</nav>      
<?php
endif;
endif;
require "inc/rodape.php";
?>