<?php
    session_start();
    unset($_SESSION["error_login"]);
    //Verifica se o cliente tenta ter acesso a página sem logar antes
    if(!isset($_SESSION["login_success"])){
        $_SESSION["error_login"] = 1;
        header("location:login.php");
        die();
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Hepta+Slab|Lexend+Deca&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/welcome.css">
    <link rel="shortcut icon" type="image/x-icon" href="css/img/mind.ico">
    <title>Mind Case: Bem-Vindo!</title>
</head>

<body>

    <!--NAVBAR-->
    <nav id="navbar1" class="navbar navbar-expand-md navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="login.php" class="navbar-brand">Mind Test</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>            
    </nav>

    <div class="container" id="corpo">
            <h2>Bem-Vindo, <?php echo $_SESSION["nome"]; ?>!</h2>
            
            <h3>Seus dados cadastrais: </h3>

            <?php
                echo "<h4>Nome: " . $_SESSION['nome'] . "</h4>";
                echo "<h4>E-mail: " . $_SESSION['email'] . "</h4>";
                echo "<h4>RG: " . $_SESSION['rg'] . "</h4>";
                echo "<h4>CPF: " . $_SESSION['cpf'] . "</h4>";
            ?>
    </div>
</body>

<!--Footer--> 
<footer id="footer" class="page-footer font-small teal pt-4">
        <div class="container-fluid text-center" id="footer_pt_1">
            <div class="row">
                <div class="col-lg-12">
                        <h5 class="text-uppercase font-weight-bold">Mind Test</h5>
                        <p>Faça seu login! Vamos ver o que dá! :D</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" id="footer_pt_2">© 2019 Copyright:
            <a href="https://github.com/JhonataCampos/Sistema-Login">Jhonata Campos - 2019</a>
        </div>
</footer>

</html>