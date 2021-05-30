<?php

$url=$_SERVER["REQUEST_URI"];

?>
  
  
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
echo '  <a href="pergunta.php" class="nav-item nav-link active">Perguntas<span class="badge bg-primary">0</span</a>';
            }else{
              echo '<a href="pergunta.php" class="nav-item nav-link">Perguntas<span class="badge bg-primary">0</span</a>';
            }


            
            ?>
              
 


        
    
                <a href="#" class="nav-item nav-link fas fa-bell sino" tabindex="-1"><span class="badge bg-primary"><?php ?></span></a>
                
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
  margin-left: 3px;
}
.logo{
    position: absolute;
    width: 10vw;
    height: 4vw;
    margin-left: 43%;



}
.sino{

}


</style>
<script>
  setTimeout(myFunction, 0); 
  function myFunction(){
    setTimeout(myFunction, 5000); 
    $.ajax({
    url: "nNotificacao.php",
    success: function(result){
    $(".badge").text(result);

    }

     }); 
  }


</script>
