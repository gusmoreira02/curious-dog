<?php
session_start();

require 'config.php';
require 'Twitter-API-Login-PHP-master/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

if(isset($_SESSION['oauth_token']) && isset($_SESSION['oauth_token_secret'])){
$request_token = [];
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];
if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token'] && !isset($_REQUEST['denied']))  {
    echo 'erroa';	
}else{
    unset($_SESSION['oauth_token']);
    unset($_SESSION['oauth_token_secret']);
    //echo $request_token['oauth_token'];
    echo "<br>";
    //echo $request_token['oauth_token_secret'];
    echo "<br>";
$twitter = new  TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

$access_token = $twitter->oauth("oauth/access_token", ["oauth_verifier" => $_REQUEST['oauth_verifier']]);
$_SESSION['access_token'] = $access_token;

$connection = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$user = $connection->get('account/verify_credentials', ['tweet_mode' => 'extended', 'include_entities' => 'true']);
	//$content = $twitter->get("account/verify_credentials");
	$array = json_decode(json_encode($user), true);
	require 'conexao.php';
	$executa=$db->prepare("select usuario,apelido,fotoPerfil,idusuario,senha,banner from usuario where oauth_token=:o");
	$executa->BindParam(":o",$access_token['oauth_token']);
	$executa->execute();
	if($executa){

	$linha = $executa->fetch(PDO::FETCH_OBJ);
	if($linha){
		
	}
	
		if(isset($linha->idusuario)){
	$_SESSION['usuario'] = $linha->usuario;
	$_SESSION['apelido'] = $linha->apelido;
	$_SESSION['foto'] = $linha->fotoPerfil;
	$_SESSION['idUsuario'] = $linha->idusuario;
	$_SESSION['senha'] = $linha->senha;
	$_SESSION['banner'] = $linha->banner;
	$executa3=$db->prepare("UPDATE usuario SET usuario=:usuario, apelido=:apelido, fotoPerfil=:fotoPerfil, banner=:banner where idusuario=:id ");
	$executa3->BindParam(":id", $linha->idusuario);
	$executa3->BindParam(":usuario", $array['screen_name']);
	$executa3->BindParam(":apelido", $array['name']);
	$varfoto = explode("_normal", $array['profile_image_url']);
	$foto = $varfoto[0] . $varfoto[1];
	$executa3->BindParam(":fotoPerfil", $foto);
	$executa3->BindParam(":banner", $array['profile_banner_url']);
	$executa3->execute();
	header("location: home.php");
    }else{
	$_SESSION['senha'] = $array['id'];
	$_SESSION['usuario'] = $array['screen_name'];
	$_SESSION['apelido'] = $array['name'];
	$varfoto = explode("_normal", $array['profile_image_url']);
	$foto = $varfoto[0] . $varfoto[1];
	$_SESSION['foto'] = $foto;
	$_SESSION['banner'] = $array['profile_banner_url'];
	
	

	require 'conexao.php';







			$executa2=$db->prepare("INSERT into usuario(usuario,senha,apelido,fotoPerfil,oauth_token,oauth_token_secret) values(:usuario,:senha,:apelido,:fotoPerfil,:token,:token_secret)");
			$executa2->BindParam(":usuario", $_SESSION['usuario']);
			$executa2->BindParam(":senha", $_SESSION['senha']);
			$executa2->BindParam(":apelido", $_SESSION['apelido']);
			$executa2->BindParam(":fotoPerfil", $_SESSION['foto']);
            
            $executa2->BindParam(":token", $_SESSION['access_token']['oauth_token']);
            $executa2->BindParam(":token_secret",  $_SESSION['access_token']['oauth_token_secret']);
			$executa2->execute();
			if($executa2){
				unset($_SESSION['oaut_token_secret']);
				$_SESSION['idUsuario']=$db->lastInsertId();
                setcookie("oauth_token",$access_token['oauth_token']);
				header("Location: perfil.php?" . $_SESSION['usuario']);

			}


		
		}
	}
}
}else{
    echo "erro";
}
?>