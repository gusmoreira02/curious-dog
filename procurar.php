<?php 
require 'seguranca.php';
require 'conexao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  require 'cssheader.php';?>
</head>
<body>
<img src="pic/logo4.png" id="logo">
<?php require 'menu.php';?>
<div class="container">
<div class="search"><input type="search" class="searchinput" placeholder="Procurar..." ><i class="fas fa-search"></i>
</div>
<div class="buscaresult">






</div>
</div>

</body>
</html>


    
<style>

@media screen and (max-width: 600px) {
.search{
    width:70vw;
margin-left:15vw;

}
.usuario{
    color:grey;
    margin-left:1%;
    font-size:clamp(0.5em, 1vw + 1em, 1em);
}
.apelido{
    font-size:1em;
    margin-left:1%;
}
.link , .link:hover{
    text-decoration:none;
    color:white;
}
.result{
    
    
    padding-top:0.5vh;
    padding-bottom:0.5vh;
    background-color:#141211;
    
    

    
    
}
.searchinput{
    width:60vw;
}
.buscaresult{
    
    
    width:90vw;
    margin-left:5vw;
    margin-top:5%;
}
.perfilimg{
width:15%;
height:15%;
margin-left:1%;
border-radius:50%;
}
.fa-search{
    margin-left:1%;
    color:white;
}
.container{
    padding:0;
}
body{

}
}
@media screen and (min-width: 600px) {
.search{
    width:70vw;
margin-left:15vw;

}
.usuario{
    color:grey;
    margin-left:1%;
    font-size:clamp(1em, 1vw + 1em, 1.5em);
}
.apelido{
    font-size:clamp(1em, 1vw + 1em, 1.5em);
    margin-left:1%;
}
.link , .link:hover{
    text-decoration:none;
    color:white;
}
.result{
    
    
    padding-top:0.5vh;
    padding-bottom:0.5vh;
    background-color:#141211;
    
    

    
    
}
.searchinput{
    width:65vw;
}
.buscaresult{
    
    
    width:90vw;
    margin-left:5vw;
    margin-top:5%;
}
.perfilimg{
width:5vw;
height:5vw;
margin-left:1%;
border-radius:50%;
}
.fa-search{
    margin-left:1%;
    color:white;
}
.container{
    padding:0;
    margin:0;
}
body{

}
}


#logo{
      
      text-align: center;
      width: 26%;
      margin-left: 37%;
  
  
    }
</style>
<script>



    $(".searchinput").on('keyup',function(){
        
        var query= $(".searchinput").val();
        if(query != ""){
        
        $.ajax({

            url:"procurarusuario.php",
            type:"POST",
            data:{"query":query},
            success: function(data){
                $(".buscaresult").empty();
                var dados = JSON.parse(data);
                for(let [index,d] of dados.entries()){
                    console.log("a");
                    $(".buscaresult").append('<div class="result"><a href="perfil.php?'+d.apelido+'" class="link"><img src="'+d.fotoPerfil+'" class="perfilimg"><span class="apelido">'+d.apelido+'</span><span class="usuario">@'+d.usuario+'</span></a></div>');
                }
            },
            error: function(){
                console.log("erro");
            }
        })
        }else{
            $(".buscaresult").empty();
        }
    })
</script>






