<?php
	require("config.php");
	require 'Twitter-API-Login-PHP-master/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;
	session_start();
if(isset($_COOKIE['oauth_token'])){
	require 'conexao.php';
	$executa=$db->prepare("select usuario,apelido,fotoPerfil,idusuario,senha from usuario where oauth_token=:o");
	$executa->BindParam(":o",$_COOKIE['oauth_token']);
	$executa->execute();
	$linha = $executa->fetch(PDO::FETCH_OBJ);
	
	$_SESSION['usuario'] = $linha->usuario;
	$_SESSION['apelido'] = $linha->apelido;
	$_SESSION['foto'] = $linha->fotoPerfil;
	$_SESSION['idUsuario'] = $linha->idusuario;
	$_SESSION['senha'] = $linha->senha;
	
	header("Location: home.php");
}else{
	
	
	unset($_SESSION['oauth_token']);
	unset($_SESSION['oauth_token_secret']);
	$token = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
	$request_token = $token->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

	

	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	
	
	$url = $token->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	
	//print_r($access_token);
	header("Location: " . $url);
	//echo $url;
	
}
	?>