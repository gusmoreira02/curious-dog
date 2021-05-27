<?php 



require 'seguranca.php';
require 'conexao.php';

if(isset($_POST['apelido'])){
    $term = $_POST['apelido'];
    $term = "%$term%";
    $executa = $db->prepare(' select idusuario,usuario,fotoPerfil, apelido from usuario where apelido like  :a ');
    $executa->BindParam(":a", $term);
    
    
    $executa->execute();
    
if($executa){
    $string = '';
		$count = 0;
while($linha = $executa->fetch(PDO::FETCH_OBJ)){
    $count++;
if($linha){
    if($count == $executa->rowCount()){
    	$string .= '{"idUsuario":"' . $linha->idusuario . '","usuario": "' . $linha->usuario . '","apelido":"' . $linha->apelido . '","foto":"'.$linha->fotoPerfil .'"}'; 
    }else{
    	$string .= '{"idUsuario":"' . $linha->idusuario . '","usuario": "' . $linha->usuario . '","apelido":"' . $linha->apelido . '","foto":"'.$linha->fotoPerfil .'"},'; 
    }

}
}
//$string .= '}';
echo $string;


}}


?>