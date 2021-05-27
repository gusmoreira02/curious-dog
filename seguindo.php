<?php 
	require 'conexao.php';
	session_start();

	$executa = $db->prepare("SELECT seguindo.follow, usuario.apelido, usuario.usuario, usuario.idusuario,usuario.fotoPerfil from seguindo inner join usuario on usuario.idusuario = seguindo.follow where seguindo.usuario=:usuario");
	$executa->BindParam(":usuario", $_POST['usuario']);
	$executa->execute();
	if($executa){
	$string = '[';
		$count = 0;
    while($linha=$executa->fetch(PDO::FETCH_OBJ)){
    	$count++;
    	if($count == $executa->rowCount()){
    	$string .= '{"idUsuario":"' . $linha->idusuario . '","usuario": "' . $linha->usuario . '","apelido":"' . $linha->apelido . '","foto":"'.$linha->fotoPerfil .'"}'; 
    }else{
    	$string .= '{"idUsuario":"' . $linha->idusuario . '","usuario": "' . $linha->usuario . '","apelido":"' . $linha->apelido . '","foto":"'.$linha->fotoPerfil .'"},'; 
    }
   	$ret['idUsuario'] = $linha->idusuario; 
   	$ret['apelido'] = $linha->apelido; 
   	$ret['usuario'] = $linha->usuario; 
   	$retorno = array();  
   	array_push($retorno, (object)$ret);
    
}
	$string .= ']';
	echo $string;
}