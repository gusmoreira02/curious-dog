<?php

require 'seguranca.php';
require 'conexao.php';
if(isset($_POST['idresposta'])){
    $executa = $db->prepare("call curtidas(:a)");
    $executa->BindParam(":a",$_POST['idresposta']);
    $executa->execute();
    if($executa){
        $linha= $executa->fetch(PDO::FETCH_OBJ);
        if($linha){
            $ret['curtidas'] = $linha->curtidas;
            echo json_encode($ret);
            
        }
    }

}