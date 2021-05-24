<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
    body{
        padding-bottom: 70px;
    }
</style>

  <div class="header">
  <div>
  <img id="logo" src="pic/logo4.png"  alt="Logo Thing main logo">
</div>
</div>

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-bottom">
        <a href="perfil.php?<?php echo $_SESSION['usuario']; ?>" class="navbar-brand"><?php echo $_SESSION['apelido']; ?></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="home.php" class="nav-item nav-link active">Início</a>
                <a href="pergunta.php" class="nav-item nav-link">Perguntas</a>
                <a href="#" class="nav-item nav-link">Procurar</a>
                <a href="#" class="nav-item nav-link disabled" tabindex="-1">Notificações</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link">Sair</a>
            </div>
        </div>
    </nav>



<style type="text/css">
  body{
    background-color: #141211;

  }
  .fonte{
    font-size: 110%;

  }
  #logo{
      
    text-align: center;
    width: 26%;
    margin-left: 37%;


  }
  .header{
   background-color: #141211;
   

  }

</style>