<!DOCTYPE html>
<?php
ob_start();  
session_start();
?>
<html class="no-js" lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Prefeitura Municipal de Teófilo Otoni</title>   
        <script src="resources/js/jquery.min.js"></script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
		<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">-->
		<link href="resources/css/print.css" rel="stylesheet" media="print">
		<link href="resources/css/fontawesome.css" rel="stylesheet">
        <link href="resources/css/brands.css" rel="stylesheet">
        <link href="resources/css/solid.css" rel="stylesheet">
        <link href="resources/css/all.css" rel="stylesheet">
        <script src="modernizr.js"></script>
        <!--<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>-->
		<script>
  		webshims.setOptions('waitReady', false);
  		webshims.setOptions('forms-ext', {types: 'date'});
  		webshims.polyfill('forms forms-ext');
		</script>
	</head>
	<body>
            <?php require "inc/menu.php"; ?>
		    <div class="container">
			