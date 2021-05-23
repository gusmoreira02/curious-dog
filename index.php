<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CuriousDog</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="fontawesome/css/brands.css" rel="stylesheet">
  <link href="fontawesome/css/solid.css" rel="stylesheet">
  
</head>
<body>
<header role="banner">
 <img id="logo-main" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/32877/logo-thing.png" width="200" alt="Logo Thing main logo">

 </header>
 <div class="container">
<a href="login.php" class="btn btn-primary"><i class="fab fa-twitter fa-1x"></i> Logar com Twitter</a>

</div>
</body>
</html>
<style>
body{
    background:linear-gradient(45deg,#084177,#687466,#cd8d7b,#fbc490); 
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
    margin-top:20%;
    text-align:center;
}
.container a{
    font-size:30px;
}
</style>