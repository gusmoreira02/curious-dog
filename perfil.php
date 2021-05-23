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
        <li class="active" ><a href="perfil.php">Perfil</a></li>
        <li ><a href="#">Notificações</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header><!-- header role="banner" -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>

<div class="container">

<div class="perfil">
<div class="nome">
<img src="<?php echo $_SESSION['foto']; ?>"><br><?php echo $_SESSION['apelido'];?>
</div>
<br>
<div>
<a href="#" class="segd">100 seguidores</a>
<a href="#" class="segn">100 seguindo</a>
</div>

<div class="button">
<?php
if (true){
    echo '<a href="logoff.php" class="btn btn-default">Editar</a>';
    
}else if(false){
    echo '<a href="#" class="btn btn-default">Seguir</a>';
}else{
    echo '<a href="#" class="btn btn-danger">Deixar de Seguir</a>';
    
   
}

?>

</div>
<br>
</div>


</div>


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
    background-color:white;
}
body{
    margin-top:-20px;
    background-color:#e0e0e0;
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