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
              
 


                  
                <a href="#" class="nav-item nav-link fas fa-bell sino" data-toggle="modal" data-target="#modalnoti" onclick="notifica(<?php echo $_SESSION['idUsuario'] ?>)"><span class="badge bg-primary"></span></a>
                <a href="procurar.php" class="nav-item nav-link">Procurar</a>

  
            </div>

            <div class="navbar-nav ml-auto">
                <a href="logoff.php" class="nav-item nav-link">Sair</a>
            </div>

        </div>

    </nav>
</div>
<div class="modal fade" id="modalnoti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-bodyn">
        <div class="new">
            <div class="noti">
          </div>

        </div>
<div class="old">

<div class="on">

</div>

</div>

        
      </div>
      <div class="modal-footer">
  
        <button type="button" id="fecharmodal" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  

<style type="text/css">
.modal-bodyn{
  overflow-y:scroll;
  max-height:30vh;
  
}
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


.dn{
  
  margin-top:2%;
  margin-left:5%;
  border-left:2px solid #0d6efd;
}
.do{
  margin-top:2%;
  margin-left:5%;
  

}
.do img{
  width:3vh;
  height:3vh;
  border-radius:50%;
}
.dn img{
  
  width:3vh;
  height:3vh;
  border-radius:50%;
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
  function notifica(usuario) {

    $(".noti").empty();
    $(".on").empty();

$.ajax({
  url: "displayON.php"
  
}).done(function(data) {
  
  var dados = JSON.parse(data);

for(let [index,a] of dados.entries()){
  
  for(let [index, d] of a.entries()){


    if (typeof d.idresposta !== 'undefined') {
      
      $(".on").append('<div class="do"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' respondeu sua pergunta </a></div>');
}else if(typeof d.idpergunta !== 'undefined'){
  
  $(".on").append('<div class="do"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' te fez uma pergunta  </a></div>');
}
else if(typeof d.curtida !== 'undefined'){
  
  $(".on").append('<div class="do"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' curtiu sua resposta  </a></div>');
}
  }
  }
});
$.ajax({
  url: "displayNN.php"
  
}).done(function(data) {
  
  var dados = JSON.parse(data);

for(let [index,a] of dados.entries()){
  
  for(let [index, d] of a.entries()){
    console.log(d);

    if (typeof d.idresposta !== 'undefined') {
      
      $(".noti").append('<div class="dn"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' respondeu sua pergunta </a></div>');
}else if(typeof d.idpergunta !== 'undefined'){
  
  $(".noti").append('<div class="dn"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' te fez uma pergunta  </a></div>');
}
else if(typeof d.curtida !== 'undefined'){
  console.log("a");
  $(".noti").append('<div class="dn"><a ><img src="'+d.fotoPerfil+'">'+ d.apelido +' curtiu sua resposta  </a></div>');
}
  }
  }
});


}


</script>
