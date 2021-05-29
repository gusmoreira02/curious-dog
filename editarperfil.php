<?php
	require 'seguranca.php';
	require 'conexao.php';

	$executa = $db->prepare("UPDATE usuario SET bio=:bio where idusuario=:idusuario");
	$executa->BindParam(":bio", $_POST['bio']);	
	$executa->BindParam(":idusuario", $_SESSION['idUsuario']);
	$executa->execute();
	

	?>