<?php

if(isset($_POST['idpergunta'])){

require 'conexao.php';
$executa = $db->prepare("select anonimo,idpergunta, mensagem, usuario, fotoPerfil, apelido, dataPergunta from pergunta as p inner join usuario as u on p.remetente = u.idusuario left join resposta r on p.idpergunta=r.pergunta where p.idpergunta=:id");
$executa->BindParam(":id",$_POST['idpergunta']);
$executa->execute();
$ret;
if($executa->rowCount()==1){
    $linha= $executa->fetch(PDO::FETCH_OBJ);
    
$ret['apelido']=$linha->apelido;
$ret['mensagem'] =$linha->mensagem;
$ret['id']= $linha->idpergunta;
$ret['anonimo']= $linha->anonimo;

echo json_encode($ret);

}else{
    return null;
}
}