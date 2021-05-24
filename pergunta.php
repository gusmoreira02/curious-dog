<<!DOCTYPE html>
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
  $executa=$db->prepare("select mensagem, usuario, fotoPerfil, apelido, dataPergunta from pergunta as p inner join usuario as u on p.remetente = u.idusuario left join resposta r on p.idpergunta=r.pergunta where p.destinatario=:id and r.pergunta is null;");
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
      <a class="btn btn-default botao">Responder</a>


    </div>
    <br>
    <?php
  }

?>
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
      .botao{
        background-color: whitesmoke;
       margin-top: 1%;
       margin-left: 45%;


      }
</style>

