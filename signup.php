<?php
    session_start();
    unset($_SESSION["error_login"]);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <title>Mind Case: Login</title>
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
    <!--Header-->
    <h1>Welcome to the Party!</h1>
    <h3>Insira seus dados cadastrais</h3>
    <!--Login-->
    <div class="container">  
        <form action="addUser.php" method="POST">
            <div class="form-group-sm">
                <label for="email">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="form-group-sm">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
            </div>
            <div class="form-group-sm">
                <label for="email">RG</label>
                <input type="text" name="rg" class="form-control" id="rg" placeholder="RG" required>
            </div>
            <div class="form-group-sm">
                <label for="email">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" required>
            </div>     
            <div class="form-group-sm">
                <label for="pass">Senha</label>
                <input type="password" name="pass" class="form-control" id="pass" placeholder="Senha" required>
            </div>  
                <button type="submit" class ="btn btn-default">Cadastrar!</button>
            </div>
        </form>
    </div>     
</body>
</html>

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
        <!-- Copyright -->
</footer>
