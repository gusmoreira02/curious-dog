<?php 
	require 'conexao.php';
	require 'seguranca.php';

	$executa = $db->prepare("select * from ncurtida where usuario=:usuario and visto=0 ");
	$executa->BindParam(":usuario", $_SESSION['idUsuario']);
	$executa->execute();
	$executa2 = $db->prepare("select * from nresposta where usuario=:usuario and visto=0 ");
	$executa2->BindParam(":usuario", $_SESSION['idUsuario']);
	$executa2->execute();
	$executa3 = $db->prepare("select * from npergunta where usuario=:usuario and visto=0 ");
	$executa3->BindParam(":usuario", $_SESSION['idUsuario']);
	$executa3->execute();

$numero = $executa->rowCount() + $executa2->rowCount() + $executa3->rowCount();
echo $numero;

	
?> 