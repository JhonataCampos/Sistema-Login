<?php
    session_start();
    if(!isset($_SESSION["nome"])){
        header("location:login.php");
        die();
    }
    unset($_SESSION["error_login"]);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <title>Mind Case: Bem-Vindo!</title>
</head>

<body>

   <!--NAVBAR-->
    <nav id="navbar1" class="navbar navbar-expand-md navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="login.php" class="navbar-brand">Mind Test</a>
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>            
    </nav>

    <h3>Bem-Vindo, <?php echo $_SESSION["nome"]; ?> </h3>
    
    <h4>Você já está logado no sistema :D</h4>
    <?php
        $adm = $_SESSION["admin"];
        if($adm == 1){
            echo "<h4>Você tem direitos administrativos. <a href='admin.php'>Clique Aqui</a> para ser redirecionado.</h4>";
        }else{
            echo "<h4>Você é um usuário. <a href='welcome.php'>Clique Aqui</a> para ser redirecionado.</h4>";
        }
    ?>
</body>

<!--Footer--> 
<footer id="footer" class="page-footer font-small teal pt-4">
        <div class="container-fluid text-center">
            <div class="row">
                <hr id="footer-hr" class="clearfix w-100 d-md-none pb-3">
                        <h5 class="text-uppercase font-weight-bold">Mind Test</h5>
                        <p>Faça seu login! Vamos ver o que dá! :D</p>
                    </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2019 Copyright:
            <a href="https://github.com/JhonataCampos">Jhonata Campos - 2019</a>
        </div>
</footer>
