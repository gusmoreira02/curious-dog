<?php 
	require 'conexao.php';
	require 'seguranca.php';

	$executa = $db->prepare("select rc.resposta from notificacurtida inner join respostacurtida as rc on notificacurtida.resposta = rc.resposta inner join resposta on resposta.idresposta=notificacurtida.resposta inner join pergunta on pergunta.idpergunta = resposta.pergunta WHERE pergunta.destinatario=:usuario and visto = 0 ");
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