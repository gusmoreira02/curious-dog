<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php
  require 'cssheader.php';
  
  ?>
  <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <?php
  
require 'seguranca.php';
require 'menu.php';
?>


<div class="container">
<?php
  include("conexao.php");
  $executa=$db->prepare("select idpergunta, mensagem, usuario, fotoPerfil, apelido, dataPergunta from pergunta as p inner join usuario as u on p.remetente = u.idusuario left join resposta r on p.idpergunta=r.pergunta where p.destinatario=:id and r.pergunta is null;");
  $executa->BindParam(":id",$_SESSION['idUsuario']);
  $executa->execute();

  while($linha=$executa->fetch(PDO::FETCH_OBJ)){
    ?>
    <div class="mensagem">
      <div class="remetente"> 
          <a class="usuario" href="perfil.php?<?php echo $linha->usuario; ?>"> <img src="<?php echo $linha->fotoPerfil ?>"  width="50px" height="50px"><b> <?php echo $linha->apelido ?></b></a>


        <div class="data">
          <?php
          echo $linha->dataPergunta;
          ?>
          </div>
           </div>
          <div class="conteudo">
            <?php
    echo $linha->mensagem;

  ?>

  </div>
      <button onclick='modal(<?php echo $linha->idpergunta ?>)' type="button" class="fas fa-reply botao " data-toggle="modal" data-target="#exampleModal" id="<?php echo $linha->idpergunta ?>" ></button>
      


    </div>
    <br>
    <?php
  }

?>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Responder <span id="titl"></span> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label id="mens"></label>
      <label id="idpergunta" hidden></label>
      <div id="texto">
<textarea  rows="8" maxlength="500" id="resp" placeholder="Digite aqui sua resposta ... "></textarea>
</div>
      </div>
      <div class="modal-footer">
      <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="post">
  
</div>
        <button type="button" id="fecharmodal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="responder()">Responder</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<style type="text/css">

      .usuario, .usuario:hover{
        text-decoration: none;
        color: white;


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
        font-size: clamp(1em, 1em + 2vw, 1.5em);


      }
      .data{
        color: white;
        float: right;
        margin-right: 1px;
        margin-top: 1.5%;
        opacity: 60%;
        font-size: clamp(0.3em, 0.5em + 1vw, 0.7em);

      }
      .conteudo{
        color: white;
        width: 90%;
        margin-left: 5%;
        border-bottom: 0.8px solid white;
        font-size: clamp(1em, 1em + 1vw, 1.5em);
        word-wrap: break-word;

      }
      .botao , .botao:hover{
        text-decoration:none;
       margin-top: 1%;
       margin-right: 2%;
       background-color:transparent;
       border:none;
       color:white;
       float:right;


      }
      textarea{
        width: 100%;

      }
</style>

<script>
$('#exampleModal').on('hide.bs.modal', function () {
  console.log("asd");
  ("#resp").val("");
});
 function modal(idpergunta){

 

  $.ajax({
  type: "POST",
  url: "dadopergunta.php",
  data: {'idpergunta':idpergunta}
  
  
  
}).done(function(data){
  
  var dados = JSON.parse(data);
  $("#titl").empty();
  $("#mens").empty();
  $("#idpergunta").empty();
  $("#titl").append(dados.apelido);
  $("#idpergunta").val(dados.id);
  $("#mens").val(dados.mensagem);
  $("#mens").text(dados.mensagem);
  
  

});
  
  

 }

 
function responder(){

  var idpe = $("#idpergunta").val();
  
  var resposta = $("#resp").val();
  var mensagem = $("#mens").val();
  


 $.ajax({
  type: "POST",
  url: "modalresponder.php",
  data: {'idpergunta':idpe , 'resposta':resposta,'pergunta':mensagem},
  
  beforeSend: function(){
    $("#fecharmodal").click();
  }
 
}).done(function(){
    

    $("#" +idpe).parent().remove();
    $("#resp").val("");
  
  
  
  

  
})}


</script>