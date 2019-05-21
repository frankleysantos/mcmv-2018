<?php
require "inc/config.php";

if(isset($_GET['id'])) {
        $sql = $pdo->prepare("SELECT imageType,imageData FROM image_blobs WHERE id=" . $_GET['id']);
		$sql->execute();
		$sql = $sql->fetch();

		//header("Content-type: " . $sql["imageType"]);
        //echo $sql["imageData"];
	}
?>
<img src="data:image/png;base64,<?= base64_encode($sql["imageData"]) ?>" />