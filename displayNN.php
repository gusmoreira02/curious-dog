<?php 
require 'seguranca.php';
require 'conexao.php';

if(isset($_SESSION['idUsuario'])){
    $executa = $db->prepare("select n.idnotificaresposta as id, usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, r.idresposta from notificaresposta as n inner join resposta as r on n.resposta=r.idresposta inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario on usuario.idusuario = p.destinatario  where p.remetente = :id && n.visto =0");
    $executa->BindParam(":id",$_SESSION['idUsuario']);
    $executa->execute();
    
    
    if($executa){
        
		
      
      $ret= array();
      
        $linha = $executa->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha);
        $executa2 = $db->prepare("select n.idnotificacao as id,usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, p.idpergunta from notificapergunta as n inner join pergunta as p on n.pergunta = p.idpergunta inner join usuario on usuario.idusuario = p.remetente  where p.destinatario = :id && n.visto =0");

        $executa2->BindParam(":id",$_SESSION['idUsuario']);
        $executa2->execute();

        $linha2=$executa2->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha2);

        $executa3 = $db->prepare("select n.idnotificacurtida as id ,usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, rc.resposta as curtida from notificacurtida as n inner join respostacurtida as rc on n.resposta=rc.resposta inner join resposta as r on rc.resposta =r.idresposta inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario on usuario.idusuario = rc.usuario  where p.destinatario = :id && n.visto =0");

        $executa3->BindParam(":id",$_SESSION['idUsuario']);
        $executa3->execute();
        $linha3=$executa3->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha3);


    echo json_encode($ret,JSON_UNESCAPED_SLASHES);


    for($i =0;$i<sizeof($linha);$i++){
        $executa4 = $db->prepare("update notificaresposta set visto=1 where idnotificaresposta=:id");
        $executa4->BindParam(":id",$linha[$i]['id']);
        $executa4->execute();
        
    }
    for($i =0;$i<sizeof($linha2);$i++){
        $executa4 = $db->prepare("update notificapergunta set visto=1 where idnotificacao=:id");
        $executa4->BindParam(":id",$linha2[$i]['id']);
        $executa4->execute();
        
    }
    for($i =0;$i<sizeof($linha3);$i++){
        $executa4 = $db->prepare("update notificacurtida set visto=1 where idnotificacurtida=:id");
        $executa4->BindParam(":id",$linha3[$i]['id']);
        $executa4->execute();
        
    }


    




    
    }
}



?>