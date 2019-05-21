<h4>Documentos Cadastrados:</h4>
<?php 
	$cpf = $principal['cpf'];
    $principal_id = $principal['id'];
	$principal = new Principal($pdo);
	$sql = $principal->listaImagem($principal_id);

?>
<div class="row">
<?php $count = 0; ?>
<?php foreach ($sql as $foto): ?>
	<?php $count +=1; ?>
	<div class="col-md" style="height: 10px;" id="idDiv">
			<figure class="figure">
			<figcaption class="figure-caption"><?=$foto['name']?></figcaption>
  			<img src="data:image/png;image/jpeg;base64,<?= base64_encode($foto["imageData"]) ?>" class="figure-img img-fluid rounded" style="height: 50px; width: auto"/><br>
  			<form action="" method="GET" role="form">
  				<input type="hidden" name="cpf" value="<?=$cpf?>">
				<input type="hidden" value="<?=$foto['id']?>" name="id_imagem">	
				<button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
				<a href="del_imagem.php?id=<?=$foto['id']?>&cpf=<?=$cpf?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
			</form>
  			</figure>
  	</div>
  	<?php if ($count >= 4):?>
  	<div class="w-100" style="padding-bottom: 140px"></div>
  	<?php $count = 0; ?>
  	<?php endif; ?>
<?php endforeach; ?>
</div>

<?php if (isset($_GET['id_imagem']) && !empty($_GET['id_imagem'])):?>
<script type="text/javascript">
		$(window).load(function() {
			$('#exemplomodal').modal('show');
		});
</script>
				<?php
				if(isset($_GET['id_imagem'])) {
        			$sql = $pdo->prepare("SELECT name, imageType,imageData FROM image_blobs WHERE id=" . $_GET['id_imagem']);
					$sql->execute();
					$sql = $sql->fetch();
				}
				?>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="exemplomodal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><?=$sql['name']?></h5>
					<a href="consulta_principal.php?cpf=<?=$cpf?>" class="btn btn-danger"><i class="fas fa-window-close"></i></a>
				</div>
				<img src="data:image/png;base64,<?= base64_encode($sql["imageData"]) ?>" style="height: 500px"/>
				<div class="modal-footer">
					
						<a href="downloadimagem.php?id_imagem=<?=$_GET['id_imagem']?>" class="btn btn-primary" target="_blank"><i class="fas fa-download"></i>Download</a>

				</div>		
			</div>
		</div>
	</div>
	<?php endif; ?>