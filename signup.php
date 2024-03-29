<?php
    session_start();
    unset($_SESSION["error_login"]);

?>
<html>
<head>
    <!--scripts para a máscara-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Hepta+Slab|Lexend+Deca&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
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

    <!--Header-->
    <div class="container" id="corpo">   
        <h1>Welcome to the Party!</h1>
        <h3>Insira seus dados cadastrais</h3>
        <!--Login-->
        <div class="container-fluid" id="form">  
            <form action="addUser.php" method="POST">
                <div class="form-group-sm">
                    <label for="email">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" required>
                </div>
                <!--Se caso o email já for existente-->

                <?php
                    if(isset($_SESSION['email_existente'])){
                        echo  "<div class='form-group-sm has-error'>";
                        echo  "<label class='control-label' for='email'>E-mail</label>";
                        echo  "<input type='email' name='email' class='form-control' id='email' placeholder='E-mail' required>";
                        echo  "</div>";
                        echo  "<p>E-mail já existente! Tente outro, por favor!</p>";
                    }else{
                        echo  "<div class='form-group-sm'>";
                        echo  "<label for='email'>E-mail</label>";
                        echo  "<input type='email' name='email' class='form-control' id='email' placeholder='E-mail' required>";
                        echo  "</div>";
                    }
                ?>

                <div class="form-group-sm">
                    <label for="email">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" placeholder="RG" required>
                </div>
                <div class="form-group-sm">
                    <label for="email">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" required>
                </div>     
                <div class="form-group-sm">
                    <label for="pass">Senha (de 8 a 24 caracteres)</label>
                    <input type="password" name="pass" class="form-control" id="pass" minlength="8" maxlength="24" placeholder="Senha" required>
                </div>  
                    <button type="submit" class ="btn btn-default">Cadastrar!</button>
                </div>

                <script>   
                        $(document).ready(function(){
                        $('#cpf').mask('000.000.000-00', {reverse: true});
                        $('#rg').mask('00.000.000-9');
                    });
  
                </script>

            </form>
        </div>  
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

    <!--Máscara-->
   
</html>