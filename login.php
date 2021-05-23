<?php
	require("config.php");
	require 'Twitter-API-Login-PHP-master/autoload.php';
	use Abraham\TwitterOAuth\TwitterOAuth;
	$twitter = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET,ACCESS_TOKEN,ACCESS_TOKEN_SECRET);
	$content = $twitter->get("account/verify_credentials");
	$array = json_decode(json_encode($content), true);
	session_start();
	$_SESSION['senha'] = $array['id'];
	$_SESSION['usuario'] = $array['screen_name'];
	$_SESSION['apelido'] = $array['name'];
	$_SESSION['foto'] = $array['profile_image_url'];
	//print_r($content);

	require 'conexao.php';

	$executa=$db->prepare("select idusuario, usuario,senha, apelido, fotoPerfil from usuario where senha=:senha");
	$executa->BindParam(":senha",$_SESSION['senha']);
	$executa->execute();


	if($executa){
		if($executa->rowCount()==1){
			$linha=$executa->fetch(PDO::FETCH_OBJ);
			$_SESSION['usuario'] = $linha->usuario;
			$_SESSION['apelido'] = $linha->apelido;
			$_SESSION['foto'] = $linha->fotoPerfil;
			$_SESSION['idUsuario'] = $linha->idusuario;
			header("Location: perfil.php");


		}else{
			$executa2=$db->prepare("INSERT into usuario(usuario,senha,apelido,fotoPerfil) values(:usuario,:senha,:apelido,:fotoPerfil)");
			$executa2->BindParam(":usuario", $_SESSION['usuario']);
			$executa2->BindParam(":senha", $_SESSION['senha']);
			$executa2->BindParam(":apelido", $_SESSION['apelido']);
			$executa2->BindParam(":fotoPerfil", $_SESSION['foto']);
			$executa2->execute();
			if($executa2){
				header("Location: perfil.php");

			}


		}

	}
	?>