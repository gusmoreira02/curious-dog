<?php

if(isset($_POST['idpergunta']) && isset($_POST['resposta'])){


    require 'conexao.php';
    $executa = $db->prepare("insert into resposta(pergunta,resposta)values(:p,:r)");
    $executa->BindParam(":p", $_POST['idpergunta']);
    $executa->BindParam(":r", $_POST['resposta']);
    $executa->execute();
    if($executa){
        echo json_encode("sucesso");
    }
}
