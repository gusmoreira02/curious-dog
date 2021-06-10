<?php
require 'seguranca.php';
require 'config.php';
require 'Twitter-API-Login-PHP-master/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

if(isset($_POST['idpergunta']) && isset($_POST['resposta']) && isset($_POST['pergunta']) && isset($_POST['post'])){

echo $_POST['post'];
echo $_POST['ret'];
    require 'conexao.php';
    $executa = $db->prepare("insert into resposta(pergunta,resposta)values(:p,:r)");
    $executa->BindParam(":p", $_POST['idpergunta']);
    $executa->BindParam(":r", $_POST['resposta']);
    $executa->execute();
    if($executa){
        if($_POST['post']=="true"){        
$executa2= $db->prepare("select oauth_token , oauth_token_secret from pergunta inner join usuario on usuario.idUsuario = pergunta.destinatario where idpergunta=:id");
$executa2->BindParam(":id",$_POST['idpergunta']);
$executa2->execute();
if($executa2){
    $linha=$executa2->fetch(PDO::FETCH_OBJ);
    $access_token['oauth_token']= $linha->oauth_token;
    $access_token['oauth_token_secret']= $linha->oauth_token_secret;
}else{
    echo "erro";
}


$connection = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET, $access_token['oauth_token'],$access_token['oauth_token_secret']);

$media_path =   $_POST['pergunta'] ." — " . $_POST['resposta'] . "   ";

        
$new_status = $connection->post("statuses/update",["status"=>$media_path]);
}else if($_POST['post']=="false"){
    echo "não postou";
} 

if($_POST['ret']=="true"){
    $executa3= $db->prepare("insert into pergunta(mensagem, remetente, destinatario, anonimo)values(:resposta,:remetente,:destinatario,0)");
    $executa3->BindParam(":resposta", $_POST['resposta']);
    $executa3->BindParam(":remetente", $_SESSION['idUsuario']);

    $executa4= $db->prepare("select remetente from pergunta where idpergunta=:idpergunta");
    $executa4->BindParam(":idpergunta", $_POST['idpergunta']);
    $executa4->execute();
    if($executa4){
        $linha=$executa4->fetch(PDO::FETCH_OBJ);

    }

   


    $executa3->BindParam(":destinatario", $linha->remetente);
    
$executa3->execute();

}

        echo json_encode("sucesso");
    }
}
