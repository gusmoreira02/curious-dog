<?php
  
require 'seguranca.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CuriousDog</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<header role="banner">
  <img id="logo-main" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/32877/logo-thing.png" width="200" alt="Logo Thing main logo">
<nav id="navbar-primary" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="home.php">Feed</a></li>
        <li class="active"><a href="pergunta.php">Perguntas</a></li>
        <li ><a href="perfil.php">Perfil</a></li>
        <li ><a href="#">Notificações</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>

<?php
  include("conexao.php");
  $executa=$db->prepare("select mensagem, fotoPerfil, apelido, dataPergunta from pergunta as p inner join usuario as u on p.remetente = u.idusuario");
  $executa->execute();

  while($linha=$executa->fetch(PDO::FETCH_OBJ)){
    ?>
    <div class="mensagem">
      <div class="remetente"> 
        <img src="<?php echo $_SESSION['foto']; ?>" width="50px" height="50px">
        <?php
          echo $linha->apelido;
          ?>
       
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

</body>

</html>
<style type="text/css">
    li a:hover{
      border-bottom: 1px solid black;

    }
    .navbar-default .navbar-nav>.active>a{
      background-color: white;

      border-bottom: 1px solid black;

    }
      .navbar-default .navbar-nav>.active>a:hover{
        background-color: white;

      }
      .mensagem{
        width: 68%;
        height: 15%;
        margin-left: 16%;
        background-color: #EEEEEE;
        border-left: 4px solid black;


      }
      .remetente{
        margin-left: 1%;


      }
      .data{
        float: right;
        margin-right: 1%;
        margin-top: 1.5%;
        opacity: 60%;

      }
      .conteudo{
        width: 80%;
        margin-left: 8% ;
        border-bottom: 0.8px solid black;

      }
      .botao{
       margin-top: 1%;
       margin-left: 45%;


      }
</style>

