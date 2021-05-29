<?php
	require 'seguranca.php';
	require 'conexao.php';

	$executa = $db->prepare("SELECT bio from usuario where idusuario=:usuario");	
	$executa->BindParam(":usuario", $_SESSION['idUsuario']);
	$executa->execute();

	$linha=$executa->fetch(PDO::FETCH_OBJ);
	
	if( $executa->rowCount() != 0 ){
		echo $linha->bio;


	}

	?>