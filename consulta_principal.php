<?php
require "inc/cabecalho.php";
require "inc/config.php";
require "classes/Principal.class.php";
require "classes/Dependentes.class.php";
require "classes/Bairros.class.php";

$principal  = new Principal($pdo);
$dependente = new Dependentes($pdo);
$class_bairro     = new Bairros($pdo);

if (!isset($_POST['cpf']) && !isset($_GET['cpf'])):?>
	<form action="" method="POST" role="form">
		<legend>Buscar Por CPF</legend>

		<div class="form-group">
			<label for="">CPF</label>
			<input type="text" class="form-control" id="idCpf" placeholder="Digitar CPF" name="cpf" required id="CPF" placeholder="Digite o seu CPF" maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);">
		</div>
		<button type="submit" class="btn btn-primary">Buscar</button>
	</form>
<?php 
endif; 

if (isset($_POST['cpf']) && !empty($_POST['cpf']) || isset($_GET['cpf']) && !empty($_GET['cpf'])):
	if (isset($_POST['cpf'])) {
		$cpf = $_POST['cpf'];
	}
	if(isset($_GET['cpf'])){
		$id = $_GET['id'];
        $dependente->excluirDependentes($id);
		$cpf = $_GET['cpf'];
		echo "<span class='badge badge-danger form-control'>Dependente excluido!</span>";
	}
	
    $principal = $principal ->listaPrincipal($cpf);
if (!empty($principal)):
	include "view_consulta_principal.php";
else:
?>      
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>CPF não encontrado!</strong><a href="index.php">Clique aqui para cadastrar.</a>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		<form action="" method="POST" role="form">
			<legend>Buscar Por CPF</legend>

			<div class="form-group">
				<label for="">CPF</label>
				<input type="text" class="form-control" id="idCpf" placeholder="Digitar CPF" name="cpf" required maxlength="14" minlength="14" onblur="return verificarCPF(this.value)" onkeypress="formatacpf(this);">
			</div>
			<button type="submit" class="btn btn-primary">Buscar</button>
		</form>
<?php
	endif;
	endif;
require "inc/rodape.php";
	?>