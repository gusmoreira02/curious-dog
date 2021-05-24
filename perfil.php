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

</head>
<body>
    <?php 
    require 'menu.php';
    ?>
<div class="container">



<div class="perfil">
<div class="nome">

<img src="<?php echo $pegarperfil->fotoPerfil; ?>" width="200" height="200"><span class="usuario"><?php echo $pegarperfil->apelido; ?></span>

</div>

<div>
<a href="#" class="segd"><?php echo $seguidores ?> seguidores</a>
<a href="#" class="segn"><?php echo $seguindo ?> seguindo</a>
</div>

<div class="button">
<?php

if ($pegarperfil!=false && $_SESSION['idUsuario']== $pegarperfil->idusuario){
    ?> <a href="editarperfil.php?id=<?php echo $_SESSION['idUsuario']; ?>" class="btn btn-light">Editar</a><?php
    echo '<a href="logoff.php" class="btn btn-danger">Sair</a>';
    
}else if($sigo->segue ==0){
  
    echo '<a href="#" class="btn btn-default">Seguir</a>';
}else if($sigo->segue==1){
  
    echo '<a href="#" class="btn btn-danger">Deixar de Seguir</a>';
    
   
}

?>

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

.nome img{
    border-radius: 50%;

    
}
.nome{
    width: 50%;
    
}

body{
    
  background-color:#141211;
}
.perfil{
  
    
    margin-left:20%;
    width:60%;
    background-color:white;

}
.segn, .segd{
    float: right;

}
.usuario{
    font-size: clamp(1em, 1em + 1vw, 1.5em);
    margin-left: 1%;

}
</style>