<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bixcoito</title>
    <?php
    require 'cssheader.php';
     ?>
</head>
<body>
<?php
session_start();
require 'menu.php';


echo $_SESSION['usuario'];
?>
<h1 class="erro"> Erro <br> Perfil não encontrado</h1>
    
</body>
</html>
<style>

.erro{
 text-align:center;
 color:white;   
}
    </style>