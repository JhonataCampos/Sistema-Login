<?php
    session_start();
    unset($_SESSION['email_existente']);

    //Se o usuário já estiver logado, enquanto ele não fizer logoff ele será redirecionado para
    //outra página
    if(isset($_SESSION["login_success"])){
        header("location:logged.php");
        die();
    }
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">    
    <link href="https://fonts.googleapis.com/css?family=Hepta+Slab|Lexend+Deca&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="css/img/mind.ico">
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

    <!--Form-->
    <div class="container" id="form">  
        <div class ="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <!--Header-->
                    <h1>Mind Tests</h1>
                    <h3>Can you log in?</h3>
                <!--Login-->
                <form action="authLogin.php" method="POST">
                    <div class="form-group-sm">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
                    </div>    
                    <div class="form-group-sm">
                        <label for="pass">Senha</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Senha" required>
                    </div>  
                        <button type="submit" class ="btn btn-default" id="submit">Entrar</button>
                </form>
                
                <?php
                //Verifica se não houve falha
                    if(isset($_SESSION['error_login'])){
                        echo "<p>Falha no login. Verifique senha ou usuário.</p>";
                    }
                //Notifica o usuário que ele foi cadastrado        
                    if(isset($_SESSION['novo_cad'])){
                        echo "<p>Usuário Cadastrado com sucesso!</p>";
                    }
                ?>
                <p>Não possui cadastro? <a href="signup.php">Crie sua Conta</a></p><br>
            </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 thumbnail" id="imagem">
                    <a href="https://mindconsulting.com.br/"><img src="css/img/mind.jpg"></a>  
                </div>
        </div>
    </div>  

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
</body>
</html>
