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
$pegarperfil = $db->prepare(" select idusuario, usuario,senha, apelido, fotoPerfil, bio from usuario where usuario=:u");
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

<div class="capa">
<img src="<?php echo $_SESSION['banner']; ?>" alt="">

</div>

<div class="nome">

<img class="imgperfil" src="<?php echo $pegarperfil->fotoPerfil; ?>" >
<br>
<span class="usuario"><?php echo $pegarperfil->apelido; ?></span>
<div class="divBio">
<span class="bio"><?php echo $pegarperfil->bio; ?></span>
</div>
</div>



<div id="botao">

<?php if ($pegarperfil!=false && $_SESSION['idUsuario']== $pegarperfil->idusuario){
    ?> 
   <button onclick='PegarBio(<?php echo $pegarperfil->idusuario ?>)' type="button" class="btn btn-outline-primary btnbio" data-toggle="modal" data-target="#exampleModal2" id="<?php echo $pegarperfil->idusuario ?>" >Editar Bio</button><?php
    
    
}else if($sigo->segue ==0){
  
    echo '<button href="" id="seguir" class="btn btn-outline-primary segbutton" onclick="seguir(' . $_SESSION['idUsuario']  . ',' . $pegarperfil->idusuario . ')">Seguir</button>';
}else if($sigo->segue==1){
  
    echo '<button href="" id="deseguir" class="btn btn-outline-danger segbutton" onclick="deseguir(' . $_SESSION['idUsuario']  . ',' . $pegarperfil->idusuario . ')">Deixar de Seguir</button>';
    
   
} ?>
</div>


<div class="info">
<a  data-toggle="modal" data-target="#exampleModal" onclick="ModalSeguidores(<?php echo $pegarperfil->idusuario ?>)" class="segd btn btn-link"><span id="seguindo"> <?php echo $seguindo ?></span> Seguidores</a>
<a  class="segn btn btn-link"data-toggle="modal" data-target="#exampleModal" onclick="ModalSeguindo(<?php echo $pegarperfil->idusuario ?>)"><span id="seguidor"><?php echo $seguidores ?></span> Seguindo</a>







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

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="ModalBio">
          <textarea class="form-control text" placeholder="Diga algo sobre você" id="textBio"style="min-width: 100%"></textarea>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="enviarmodal" class="btn btn-outline-success" onclick="ModalBio()" data-dismiss="modal">Enviar</button>
        <button type="button" id="fecharmodal2" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<?php 


if($_SESSION['idUsuario']!== $pegarperfil->idusuario){

?>
<div id="perg">
<hr id="linha">

<!-- <input type="text" id="pergunta" class="text_font_resize" maxlength="100" placeholder="Faça uma pergunta"> -->
<textarea  id="pergunta" maxlength="100" placeholder="Faça uma pergunta"></textarea>
<br>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="anom">
  <label class="form-check-label" for="flexSwitchCheckDefault"> Anônimo</label>
</div>
<button class="btn btn-outline-primary pb" onclick="perguntar(<?php echo $pegarperfil->idusuario ?>)"> Perguntar </button>

</div>


<hr id="linha">
<?php }   ?>
</body>
</html>
<style type="text/css">
   @media(width: 450px){
    .perfil{
      width: 100%;
    }
   }
#linha {
  width:70%;
  margin-left:15%;
  color:white;
}
.form-check-label{
  color:white;
}
.button{
    width:30%;
    
    
    
    
}



.segd:hover , .segn:hover {
    text-decoration:none;
}
.capa{


height:15vw;
background-repeat:no;
  
}
.capa img{
  width:100%;
  height:23vw;
}
.imgperfil{
  
  border:3px solid black;
    border-radius: 100%;
    width:15vw;
  height:15vw;
    
}
.nome{
    
    text-align:center;
    color:white;
    
    
    
    
}

body{
    
  background-color:#141211;
}
.perfil{
    
    border-left:0.5px solid white;
    border-right:0.5px solid white;
    
    width:70vw;
    margin-left:15vw;
    background-color:#141211;
    height:60vw;
    

    
    
    
    

}
.pb{
  margin-top:1%;
  font-size: clamp(0.5em, 1em + 1vw, 1em);
}
#perg{
  margin-top:2%;
  
  

text-align:center;

}
#pergunta{
  width:50%;
  text-align:center;
  
  
  font-size: clamp(0.5em, 1em + 1vw, 1em);
  border-radius:10px;
  resize:none;
  
  

}
#pergunta:focus{
  outline:none;
}
.segn, .segd{
  text-decoration:none;
  
  font-size: clamp(1em, 1em + 1vw, 2em);
    

}
.usuario{
    font-size: clamp(0.5em, 1em + 1vw, 2em);
    
    
    

}

.info{
  
  
  text-align:center;
  
  
  
  
  font-size: clamp(0.5em, 0.5em + 0.5vw, 0.5em);
  
  
  
}

.btn{
  
}
#botao{
text-align:center;


}

.segbutton{
  font-size: clamp(1em, 0.5em + 0.5vw, 1em);
}
.dispseg{
margin-bottom:2%;
}
.dispseg img{
  border-radius:50%;
  width:10%;
  height:10%;
}
.dispn{
  margin-left:1%;
}
.text{
  resize: none;

}
.divBio{
  margin-right: 50%;

}
.bio{
 color: white;
 font-size: 1em;
 margin-left: 1%;



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
    $("#seguir").remove();
    $("#botao").append('<button href="" id="deseguir" class="btn btn-outline-danger segbutton" onclick="deseguir(' + usuario  + ',' + follow + ')">Deixar de Seguir</button>');
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
     $("#deseguir").remove();
    $("#botao").append('<button href="" id="seguir" class="btn btn-outline-primary segbutton" onclick="seguir(' + usuario  + ',' + follow + ')">Seguir</button>');
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
  $("#exampleModalLabel").text("Seguidores");
 var dados = JSON.parse(data);
 $("#ModalSeguidores").empty();
    for(let [index,d] of dados.entries()){   
      
                $("#ModalSeguidores").append('<div class="dispseg"><a href="perfil.php?' + d.usuario +'"><img src="'+ d.foto+'"><span class="dispn">'+ d.apelido + '</span></a></div>');
        console.log(d);

    
}


  
})
}
function ModalSeguindo(usuario){
    $.ajax({
  url: "seguindo.php",
  type: "POST",
  data:{'usuario' :usuario}
}).done(function(data) {
  $("#exampleModalLabel").text("Seguindo");
 var dados = JSON.parse(data);
 $("#ModalSeguidores").empty();
    for(let [index,d] of dados.entries()){   
      
                $("#ModalSeguidores").append('<div class="dispseg"><a href="perfil.php?' + d.usuario +'"><img src="'+ d.foto+'"><span class="dispn">'+ d.apelido + '</span></a></div>');
        console.log(d);

    
}


  
})
}
function perguntar(usuario){
  var mensagem = $("#pergunta").val();
  var anom = $("#anom").val();
  $.ajax({
  url: "perguntar.php",
  type: "POST",
  data:{'usuario' :usuario,"mensagem":mensagem,"anom":anom}
}).done(function(data) {
  
    



  
})

}
function ModalBio(){ 
   var usuario = $('#textBio').val();
    $.ajax({
  url: "editarperfil.php",
  type: "POST",
  data:{'bio' :usuario}
}).done(function(data) {
  $("#textBio").val(usuario);
  


  
})
}
function PegarBio(){
  var usuario = $('#textBio').val();
    $.ajax({
  url: "pegarbio.php"
}).done(function(data) {
  $("#textBio").val(data);

})}

</script>