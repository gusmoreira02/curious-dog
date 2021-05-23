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

//header("Location: perfilnotfound.php");

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
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<header role="banner" class="menu">
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
        <li ><a href="pergunta.php">Perguntas</a></li>
        <?php
        if($_SESSION['usuario'] == $pegarperfil->usuario){
          ?>
        <li class="active" ><a href="perfil.php?<?php echo $_SESSION['usuario'];?>">Perfil</a></li>
<?php
        }else{
          ?>  <li><a href="perfil.php?<?php echo $_SESSION['usuario'];?>">Perfil</a></li> <?php
        }
        ?>
        <li ><a href="#">Notificações</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->


<div class="container">
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>

<div class="container">

<div class="perfil">
<div class="nome">

<img src="<?php echo $pegarperfil->fotoPerfil; ?>"><br><?php echo $pegarperfil->apelido; ?>
</div>

<div>
<a href="#" class="segd"><?php echo $seguidores ?> seguidores</a>
<a href="#" class="segn"><?php echo $seguindo ?> seguindo</a>
</div>

<div class="button">
<?php

if ($pegarperfil!=false && $_SESSION['idUsuario']== $pegarperfil->idusuario){
    ?> <a href="editarperfil.php?id=<?php echo $_SESSION['idUsuario']; ?>" class="btn btn-default">Editar</a><?php
    echo '<a href="logoff.php" class="btn btn-default">Sair</a>';
    
}else if($sigo->segue ==0){
  
    echo '<a href="#" class="btn btn-default">Seguir</a>';
}else if($sigo->segue==1){
  
    echo '<a href="#" class="btn btn-danger">Deixar de Seguir</a>';
    
   
}

?>

</div>
<br>
</div>


</div>

<?php } ?>
</div>
<footer>

</footer>
</body>
</html>
<style type="text/css">
.button{
    
    text-align:center;
}
.segd{
    margin-left:1%;

    
    
}
.segn{
    margin-right:1%;
    float:right;
    
    
}

.segd:hover , .segn:hover{
    text-decoration:none;
}

.nome{
    text-align:center;
    
}
img{border-radius:10%;
}
.menu{
  margin-left:20%;
  width:60%;
    background-color:white;
}
body{
    
  background-color:#e0ffff;
}
.container{
  width:100%;
  padding:0;
  
  background-color:#e0ffff;
}
   li>a:hover{
      border-bottom: 1px solid black;

    }
    .navbar-default .navbar-nav>.active>a{
      background-color: white;

      border-bottom: 1px solid black;

    }
      .navbar-default .navbar-nav>.active>a:hover{
        background-color: white;

      }
      .container{
width:100%;
height:100%;

      }
.perfil{
  
  
    margin-left:20%;
    width:60%;
    background-color:white;

}
</style>