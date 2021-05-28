<?php

$url=$_SERVER["REQUEST_URI"];

?>
  <div class="header">
  <div>
  
 
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
            <?php 
            if($url =="/curiousdog/home.php"){
              echo '<a href="home.php" class="nav-item nav-link active">Início</a>';
            }else{
              echo '<a href="home.php" class="nav-item nav-link ">Início</a>';
            }
            if($url == "/curiousdog/pergunta.php"){
echo '  <a href="pergunta.php" class="nav-item nav-link active">Perguntas</a>';
            }else{
              echo '<a href="pergunta.php" class="nav-item nav-link">Perguntas</a>';
            }


            
            ?>
              
 


        
    
                <a href="#" class="nav-item nav-link disabled" tabindex="-1">Notificações<span class="badge badge-dark">4</span></a>
                
            </div>

            <div class="navbar-nav ml-auto">
                <a href="logoff.php" class="nav-item nav-link">Sair</a>
            </div>

        </div>

    </nav>
</div>

  

<style type="text/css">
  body{
    background-color: #141211;

  }
  
  #logo{
      
    text-align: center;
    width: 26%;
    margin-left: 37%;


  }
  .header{
   background-color: #141211;
   

  }
  .select2-container--default .select2-selection--single .select2-selection__rendered{
    background-color:#212529;
    border:none;
    outline: 0; 
    color:white;
    border-bottom:1px solid white;
    
  }
  #search {
    
    
    
    
    box-shadow: 0 0 0 0;
    
    
  }
.badge{
  background-color:transparent;
}
.logo{
    position: absolute;
    width: 10vw;
    height: 4vw;
    margin-left: 43%;



}

</style>
<script>


</script>
