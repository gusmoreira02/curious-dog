<?php

require 'seguranca.php';
require 'conexao.php';
if(isset($_POST['query'])){
    $executa = $db->prepare("select usuario,apelido,fotoPerfil from usuario where usuario like :a or apelido like :a");
    $term = "%" . $_POST['query']. "%";
    $executa->BindParam(":a",$term);
    
    $executa->execute();
    if($executa){
       echo json_encode($executa->fetchAll(PDO::FETCH_ASSOC),JSON_UNESCAPED_SLASHES);
        
    }

}