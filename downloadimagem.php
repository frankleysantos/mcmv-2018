<?php
require "inc/config.php";

if(isset($_GET['id_imagem'])) {
        $sql = $pdo->prepare("SELECT name, imageType,imageData FROM image_blobs WHERE id=" . $_GET['id_imagem']);
		$sql->execute();
		$sql = $sql->fetch();
		header("Content-type: " . $sql["imageType"]);
		header("Content-Disposition: attachemnt; filename=" . $sql["name"]);
        echo $sql["imageData"];
}