<?php 
require 'seguranca.php';
require 'conexao.php';

if(isset($_SESSION['idUsuario'])){
    $executa = $db->prepare("select n.idnotificaresposta as id, usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, r.idresposta from notificaresposta as n inner join resposta as r on n.resposta=r.idresposta inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario on usuario.idusuario = p.destinatario  where p.remetente = :id && n.visto =1");
    $executa->BindParam(":id",$_SESSION['idUsuario']);
    $executa->execute();
    
    
    if($executa){
        
		
      
      $ret= array();
      
        $linha = $executa->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha);
        $executa2 = $db->prepare("select n.idnotificacao as id,usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, p.idpergunta from notificapergunta as n inner join pergunta as p on n.pergunta = p.idpergunta inner join usuario on usuario.idusuario = p.remetente  where p.destinatario = :id && n.visto =1 && p.anonimo=0");

        $executa2->BindParam(":id",$_SESSION['idUsuario']);
        $executa2->execute();

        $linha2=$executa2->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha2);

        $executa3 = $db->prepare("select n.idnotificacurtida as id ,usuario.fotoPerfil,usuario.usuario,usuario.apelido,usuario.idusuario, rc.resposta as curtida from notificacurtida as n inner join respostacurtida as rc on n.resposta=rc.resposta inner join resposta as r on rc.resposta =r.idresposta inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario on usuario.idusuario = rc.usuario  where p.destinatario = :id && n.visto =1");

        $executa3->BindParam(":id",$_SESSION['idUsuario']);
        $executa3->execute();
        $linha3=$executa3->fetchAll(PDO::FETCH_ASSOC);
        array_push($ret,$linha3);


    echo json_encode($ret,JSON_UNESCAPED_SLASHES);



    




    
    }
}
