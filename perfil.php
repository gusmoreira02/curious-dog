<?php 
require 'conexao.php';
session_start();
$seguidores=0;
$seguindo=0;
$sigo=0;
$pegarperfil=false;
$separaigual  = explode("?", $_SERVER["REQUEST_URI"]);
if(sizeof($separaigual)>1){
  $nome = $separaigual;
$pegarperfil = $db->prepare(" select idusuario, usuario,senha, apelido, fotoPerfil from usuario where usuario=:u");
$pegarperfil->BindParam(":u",$nome[1]);
$pegarperfil->execute();
if($pegarperfil->rowCount()==1){

  $pegarperfil = $pegarperfil->fetch(PDO::FETCH_OBJ);
  $sigo = $db->prepare("call sigo(:usuario,:follow)");
  $sigo->BindParam(":usuario",$_SESSION['idUsuario']);
  
  
  
  $sigo->BindParam(":follow",$pegarperfil->idusuario);
  $sigo->execute();
  $sigo = $sigo->fetch(PDO::FETCH_OBJ);


}else{

header("Location: perfilnotfound.php");

}
}else{
  header("Location: home.php");
}

if($pegarperfil!=false){
$executa=$db->prepare("call seguidores(:a)");
$executa->BindParam(":a",$pegarperfil->idusuario);
$executa->execute();

$linha = $executa->fetch(PDO::FETCH_OBJ);
$seguidores = $linha->seguidores;
$executa=$db->prepare("call seguindo(:a)");
$executa->BindParam(":a",$pegarperfil->idusuario);
$executa->execute();
$linha = $executa->fetch(PDO::FETCH_OBJ);
$seguindo = $linha->seguindo;



?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CuriousDog</title>
<?php 
require 'cssheader.php';
?>
</head>
<body>
    <?php 
    require 'menu.php';
    
    ?>




<div class="perfil">
<div class="nome">

<img class="imgperfil" src="<?php echo $pegarperfil->fotoPerfil; ?>" ><span class="usuario"><?php echo $pegarperfil->apelido; ?></span>

</div>

<div class="info">
<a href="#" data-toggle="modal" data-target="#exampleModal" onclick="ModalSeguidores(<?php echo $pegarperfil->idusuario ?>)" class="segd"><span id="seguindo"> <?php echo $seguindo ?></span> seguidores</a>
<a href="#" class="segn"><span id="seguidor"><?php echo $seguidores ?></span> seguindo</a>



<div id="botao">

<?php

if ($pegarperfil!=false && $_SESSION['idUsuario']== $pegarperfil->idusuario){
    ?> <a href="editarperfil.php?id=<?php echo $_SESSION['idUsuario']; ?>" class="btn btn-light">Editar</a><?php
    
    
}else if($sigo->segue ==0){
  
    echo '<a href="#" id="seguir" class="btn btn-outline-primary" onclick="seguir(' . $_SESSION['idUsuario']  . ',' . $pegarperfil->idusuario . ')">Seguir</a>';
}else if($sigo->segue==1){
  
    echo '<a href="#" id="deseguir" class="btn btn-outline-danger" onclick="deseguir(' . $_SESSION['idUsuario']  . ',' . $pegarperfil->idusuario . ')">Deixar de Seguir</a>';
    
   
}

?>
</div>
</div>



</div>

<?php } ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguidores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="ModalSeguidores">


        </div>
      </div>
      <div class="modal-footer">
  
        <button type="button" id="fecharmodal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<style type="text/css">
.button{
    width:30%;
    
    
    
    
}



.segd:hover , .segn:hover{
    text-decoration:none;
}

.nome img{
    border-radius: 50%;

    
}
.nome{
    width: 35%;
    float:left;
}

body{
    
  background-color:#141211;
}
.perfil{
  
    
    
    width:70vw;
    margin-left:15%;
    background-color:white;

    height:10vw;
    
    
    

}
.segn, .segd{
    
    margin-right:1%;
    

}
.usuario{
    font-size: clamp(1.5em, 1em + 1vw, 2em);
    margin-left: 1%;

}

.info{
  
  float:right;
  width:40%;
  margin-right:2vw;
  padding-top:4vw;
  
  
  font-size: clamp(0.5em, 1em + 1vw, 1em);
  
  
  
}
.imgperfil{
  width:10vw;
  height:10vw;
}
.btn{
  text-align:center;
}
#botao{


}
</style>
<script>
function seguir(usuario, follow) {
  $.ajax({
  url: "seguir.php",
  type: "POST",
  data:{'usuario' :usuario, 'follow':follow}
}).done(function(data) {
  if (data == 'succes'){
    $("#botao").empty();
    $("#botao").append('<a href="#" id="deseguir" class="btn btn-outline-danger" onclick="deseguir(' + usuario  + ',' + follow + ')">Deixar de Seguir</a>');
    var count= $("#seguindo").text();
    $("#seguindo").text(parseInt(count)+1);
}
});
}

function deseguir(usuario, follow) {
  $.ajax({
  url: "deseguir.php",
  type: "POST",
  data:{'usuario' :usuario, 'follow':follow}
}).done(function(data) {
  if (data == 'succes'){
     $("#botao").empty();
    $("#botao").append('<a href="#" id="seguir" class="btn btn-outline-primary" onclick="seguir(' + usuario  + ',' + follow + ')">Seguir</a>');
     var count= $("#seguindo").text();
    $("#seguindo").text(parseInt(count)-1);


  }
});
}
function ModalSeguidores(usuario){
    $.ajax({
  url: "seguidores.php",
  type: "POST",
  data:{'usuario' :usuario}
}).done(function(data) {
 var dados = JSON.parse(data);
    for(var d in dados){   
                $("#ModalSeguidores").append('<a href="perfil.php?' + d.usuario +'">'+ d.apelido + '</a>');
        console.log(d[1]);

    
}


  
})
}

</script>