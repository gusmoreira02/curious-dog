<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biXcoito</title>
    <?php 
        require 'cssheader.php';
    ?>
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">
  
</head>
<body>
<header role="banner">
 <img id="logo" src="pic/logo4.png" alt="Logo Thing main logo">

 </header>
 <div class="container">
<a href="login.php" class="btn btn-outline-primary"><i class="fab fa-twitter fa-1x"></i> Logar com Twitter</a>


</div>
</body>
</html>
<style>
body{
    background-color: #141211;
    background-size: 2000% 2000%;
    animation: colors 15s ease infinite;
}
@keyframes colors{
    0%{
background-position: 0% 50%;
    }
    50%{
        background-position: 100% 50%;
    }
    100%{
        background-position: 0% 50%;
    }
}
.container{
    margin-top:10%;
    text-align:center;
}
.container a{
    font-size:30px;
}
  #logo{
      
    width: 50vw;
    margin-left: 25%;


  }

</style>