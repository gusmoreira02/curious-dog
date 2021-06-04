<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php 
  require 'cssheader.php';
  ?>
</head>
<body >
<img src="pic/logo4.png" id="logo">
<?php

require 'seguranca.php';
require 'menu.php';

?>


<div class="container">
<?php
  include("conexao.php"); 
  $executa=$db->prepare("select u.idusuario as idRemetente,p.anonimo as anonimo,u.usuario as nomeRemetente,u.apelido as apelidoRemetente,u.fotoPerfil as fotoRemetente, idresposta, pergunta, dataResposta, resposta, p.idpergunta, p.mensagem as mensagem, p.remetente, us.fotoPerfil as fotoPerfil, us.apelido as eu, us.usuario as usuario from resposta as r inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario as u on u.idusuario=p.remetente inner join usuario as us on us.idusuario=p.destinatario where p.destinatario in (select seg.follow from seguindo as seg where seg.usuario=:id) or p.destinatario=:id order by dataResposta desc;");
  $executa->BindParam(":id", $_SESSION['idUsuario']);
  $executa->execute();


  while($linha=$executa->fetch(PDO::FETCH_OBJ)){
    $executa2=$db->prepare("call curto(:a,:b);");
    $executa2->BindParam(":a",$linha->idresposta);
    $executa2->BindParam(":b",$_SESSION['idUsuario']);
    $executa2->execute();
    if($executa2){
      $linha2 =$executa2->fetch(PDO::FETCH_OBJ);
      
      
    }
  
    $executa2=$db->prepare("call curtidas(:a);");
    $executa2->BindParam(":a",$linha->idresposta);
    
    $executa2->execute();
    if($executa2){
      $linha3 =$executa2->fetch(PDO::FETCH_OBJ);
      
      
    }

    
    
   ?>
    <div class="mensagem">

      <div class="remetente"> 
         

          <a class="usuario" href="perfil.php?<?php echo $linha->usuario; ?>"> <img src="<?php echo $linha->fotoPerfil ?>"  width="50px" height="50px"><b>  <?php echo $linha->eu ?></b> </a>
<?php if($linha->anonimo == 0){ ?>
          <a class="perguntador" href="perfil.php?<?php echo $linha->nomeRemetente; ?>"> &nbsp<b> <?php echo $linha->apelidoRemetente ?></b> <img src="<?php echo $linha->fotoRemetente ?>"  width="50px" height="50px"></a>
          <?php }else{ ?>

            <a class="perguntador" > &nbsp<b>Bisxcônimo</b> <img src="pic/biscouito.png"  width="50px" height="50px"></a>

            <?php }?>


        <div class="data">
          <?php
          echo $linha->dataResposta;
          ?>
          </div>
           </div>
          <div class="conteudo">
            <?php
    echo $linha->mensagem;

  ?>

    <br>
  
</div>
      <div class="resposta">
        <?php echo $linha->resposta ?>
        
         <div class="curtir id<?php echo $linha->idresposta ?>">  
         <span id="<?php echo $linha->idresposta; ?>"><?php echo $linha3->curtidas ?></span> 
         <?php
         
         if($linha2->curto==0){ ?>
         <a onclick="curtir(<?php echo $linha->idresposta; ?>)" id="botc<?php echo $linha->idresposta; ?>"><img src="pic/apagado.png" class="like" width="25" height="25"></a> 
         <?php }else if($linha2->curto==1){ ?>      
         <a onclick="descurtir(<?php echo $linha->idresposta; ?>)" id="botd<?php echo $linha->idresposta; ?>"><img src="pic/visivel.png" class="like" width="25" height="25"></a>
         <?php }?>
          </div>
        </div>
</div>
       
          <?php
  }

?>

</body>
</html>
<style type="text/css">

      .usuario, .usuario:hover{
        text-decoration: none;
        color: white;
        border-right: 1px solid white;



      }
      .usuario img{
        border-radius: 50%;


      }

      .mensagem{

        width: 100%;
        background-color: #141211;
        border-left: 3px solid white;
        margin-top: 2%;




      }
      .remetente{
        color: white;
        margin-left: 1%;
        font-size: clamp(1em, 1em + 1vw, 1em);



      }
      #logo{
      
      text-align: center;
      width: 26%;
      margin-left: 37%;
  
  
    }
      .data{
        color: white;
        float: right;
        margin-right: 1%px;
        margin-top: 1.5%;
        opacity: 60%;
        font-size: clamp(0.3em, 0.5em + 1vw, 0.7em);

        

      }
      .conteudo{
        color: white;
        width: 90%;
        margin-left: 5%;
        border-bottom: 0.8px solid white;
        font-size: clamp(0.9em, 1em + 1vw, 1em);
        word-wrap: break-word;


      }
      .resposta{
        color: white;
        width: 90%;
        margin-left: 5%;
        font-size: clamp(0.9em, 1em + 1vw, 1em);
        word-wrap: break-word;


      }
      .botao{
        background-color: whitesmoke;
       margin-top: 1%;
       margin-left: 45%;



      }
      .curtir{
        float: right;
        margin-right: 3%;
        margin-top: 1%;


      }
      .perguntador img{
        border-radius: 50%;

       

      }
      .perguntador, .perguntador:hover{
        text-decoration: none;
        color: white;

        

      }
 
</style>



</style>

<script>

function curtidas(idresposta){
  $.ajax({
  url: "curtidas.php",
  type: "POST",
  data:{'idresposta' :idresposta}
}).done(function(data) {
  var dados = JSON.parse(data);
 $("#"+idresposta).text(dados.curtidas);

 
 




  
})
}
function curtir(idresposta){
  $.ajax({
  url: "curtir.php",
  type: "POST",
  data:{'idresposta' :idresposta}
}).done(function(data) {
  if(data="sucesso"){
    
    curtidas(idresposta);
    
    $(".id" +idresposta).append('<a onclick="descurtir('+idresposta+')" id="botd'+idresposta+'"><img src="pic/visivel.png" class="like" width="25" height="25"></a>');
    $("#botc" + idresposta).remove();
  }

 
 




  
})
}

function descurtir(idresposta){
  $.ajax({
  url: "descurtir.php",
  type: "POST",
  data:{'idresposta' :idresposta}
}).done(function(data) {
  if(data="sucesso"){
    
    curtidas(idresposta);

    $(".id" +idresposta).append('<a onclick="curtir('+idresposta+')" id="botc'+idresposta+'"><img src="pic/apagado.png" class="like" width="25" height="25"></a>');
    $("#botd" + idresposta).remove();
  }

 
 




  
})
}
</script>
