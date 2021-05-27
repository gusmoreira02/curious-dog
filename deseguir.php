<?php 
	require 'seguranca.php';
	require 'conexao.php';

	if(isset($_POST['usuario']) && isset($_POST['follow'] )){
		$executa = $db->prepare(" DELETE FROM seguindo where usuario=:usuario and follow=:follow");
		$executa->BindParam(":usuario", $_POST['usuario']);
		$executa->BindParam(":follow", $_POST['follow']);
		$executa->execute();

		IF($executa) echo 'succes';

	}

	
?>