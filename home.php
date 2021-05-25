<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php 
  require 'cssheader.php';
  ?>
</head>
<body>
<?php

require 'seguranca.php';
require 'menu.php';

?>


<div class="container">
<?php
  include("conexao.php");
  $executa=$db->prepare("select u.idusuario as idRemetente,u.usuario as nomeRemetente,u.apelido as apelidoRemetente,u.fotoPerfil as fotoRemetente, idresposta, pergunta, dataResposta, resposta, p.idpergunta, p.mensagem as mensagem, p.remetente, us.fotoPerfil as fotoPerfil, us.apelido as eu, us.usuario as usuario from resposta as r inner join pergunta as p on r.pergunta = p.idpergunta inner join usuario as u on u.idusuario=p.remetente inner join usuario as us on us.idusuario=p.destinatario where p.destinatario in (select seg.follow from seguindo as seg where seg.usuario=:id) or p.destinatario=:id;");
  $executa->BindParam(":id", $_SESSION['idUsuario']);
  $executa->execute();


  while($linha=$executa->fetch(PDO::FETCH_OBJ)){
    
    
   ?>
    <div class="mensagem">

      <div class="remetente"> 
         

          <a class="usuario" href="perfil.php?<?php echo $linha->usuario; ?>"> <img src="<?php echo $linha->fotoPerfil ?>"  width="50px" height="50px"><b>  <?php echo $linha->eu ?></b> </a>

          <a class="perguntador" href="perfil.php?<?php echo $linha->nomeRemetente; ?>"> &nbsp<b> <?php echo $linha->apelidoRemetente ?></b> <img src="<?php echo $linha->fotoRemetente ?>"  width="50px" height="50px"></a>


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
        
         <div class="curtir">          
         <a><img src="pic/visivel.png" class="like" width="25" height="25"></a>
          </div>
        </div>
</div>
       
          <?php
  }

?>
 <div class="leaf">
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>

            
     </div>
     
     <div class="leaf leaf1">
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
            
     </div>
     
     <div class="leaf leaf2">
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
     <div>  <img src="pic/1.png" height="30px" width="30px"></img></div>
      <div><img src="pic/1.png" height="30px" width="30px"></img></div>
      <div>  <img src="pic/1.png" height="30px" width="30px" ></img></div>
      <div><img  src="pic/1.png" height="30px" width="30px"></img></div>
       <div> <img src="pic/1.png" height="30px" width="30px"></img></div>
     <div>   <img src="pic/1.png" height="30px" width="30px"></div>
     <div><img src="pic/1.png" height="30px" width="30px"></div>
            



     </div>


   
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
      body {
margin:0;
padding:0;
overflow:hidden;
background-color:black;
}
section{
height:100%;
width:100%;
  position:absolute ;  background:radial-gradient(#333,#000);
}
.leaf{
    position:absolute ;
    width:100%;
    height:100%;
    top:0;
    left:0;
    z-index: -1;
    opacity: 30%;
}
.leaf div{
position:absolute ;
display:block ;
z-index: -1;
}
.leaf div:nth-child(1){
    left:20%; 
    animation:fall 15s linear infinite ;
    animation-delay:-2s;
   z-index: -1;

}
.leaf div:nth-child(2){
    left:70%; 
    animation:fall 15s linear infinite ;
    animation-delay:-4s;
    z-index: -1;
}
.leaf div:nth-child(3){
    left:10%; 
    animation:fall 20s linear infinite ;
    animation-delay:-7s;
    z-index: -1;
    
}
.leaf div:nth-child(4){
    left:50%; 
   animation:fall 18s linear infinite ; 
   animation-delay:-5s;
   z-index: -1;
}
.leaf div:nth-child(5){
    left:85%; 
    animation:fall 14s linear infinite ;
    animation-delay:-5s;
    z-index: -1;
}
.leaf div:nth-child(6){
    left:15%; 
    animation:fall 16s linear infinite ;
    animation-delay:-10s;
    z-index: -1;
}
.leaf div:nth-child(7){
    left:90%; 
    animation:fall 15s linear infinite ;
    animation-delay:-15s;
    z-index: -1;
}
.leaf div:nth-child(8){
    left:30%; 
    animation:fall 15s linear infinite ;
    animation-delay:-1s;
   z-index: -1;

}
.leaf div:nth-child(9){
    left:40%; 
    animation:fall 15s linear infinite ;
    animation-delay:-20s;
    z-index: -1;
}
.leaf div:nth-child(10){
    left:60%; 
    animation:fall 20s linear infinite ;
    animation-delay:-30s;
    z-index: -1;
    
}
.leaf div:nth-child(11){
    left:80%; 
   animation:fall 18s linear infinite ; 
   animation-delay:-12s;
   z-index: -1;
}
.leaf div:nth-child(12){
    left:100%; 
    animation:fall 14s linear infinite ;
    animation-delay:-8s;
    z-index: -1;
}
.leaf div:nth-child(13){
    left:68%; 
    animation:fall 16s linear infinite ;
    animation-delay:-5s;
    z-index: -1;
}
.leaf div:nth-child(14){
    left:43%; 
    animation:fall 15s linear infinite ;
    animation-delay:-23s;
    z-index: -1;
}
.leaf div:nth-child(15){
    left:2%; 
    animation:fall 15s linear infinite ;
    animation-delay:-40s;
   z-index: -1;

}
.leaf div:nth-child(16){
    left:54%; 
    animation:fall 15s linear infinite ;
    animation-delay:-21s;
    z-index: -1;
}
.leaf div:nth-child(17){
    left:67%; 
    animation:fall 20s linear infinite ;
    animation-delay:-12s;
    z-index: -1;
    
}
.leaf div:nth-child(18){
    left:12%; 
   animation:fall 18s linear infinite ; 
   animation-delay:-24s;
   z-index: -1;
}
.leaf div:nth-child(19){
    left:90%; 
    animation:fall 14s linear infinite ;
    animation-delay:-31s;
    z-index: -1;
}
.leaf div:nth-child(20){
    left:35%; 
    animation:fall 16s linear infinite ;
    animation-delay:-9s;
    z-index: -1;
}
.leaf div:nth-child(21){
    left:10%; 
    animation:fall 15s linear infinite ;
    animation-delay:-12s;
    z-index: -1;
}


@keyframes fall{
    0%{
        opacity:1;
        top:-10%;
        transform:translateX (1vw) rotate(0deg);
    }
    20%{
        opacity:0.8;
        transform:translateX (-1vw) rotate(45deg);
    }
    40%{

        transform:translateX (-1vw) rotate(90deg);
    }
    60%{
        
       transform:translateX (-1vw) rotate(135deg); 
    }
    80%{
    
        transform:translateX (-1vw) rotate(180deg);
    }
    100%{
        
        top:110%;
        transform:translateX (-1vw) rotate(225deg);
    }
    }
.leaf1{
    transform: rotateX(180deg);
}
@keyframes like{
    0%{opacity: 50%;}
    50%{opacity: 100%;}


}
.like:active{
    animation: like 5s ease;


}
.like{
    opacity: 30%;


}

</style>
