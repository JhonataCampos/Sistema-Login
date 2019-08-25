<?php
    session_start();
    unset($_SESSION["error_login"]);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <title>Mind Case: Admin</title>
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


        <h3>Bem-Vindo, <?php echo $_SESSION["nome"];?> </h3>

        <h4>Aqui estão os usuários cadastrados</h4>

        <!--Exibição de usuários-->

        <?php 
            //Função para construir a tabela
                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }
                
                    function current() {
                        return "<td>" . parent::current(). "</td>";
                    }
                
                    function beginChildren() {
                        echo "<tr>";
                    }
                
                    function endChildren() {
                        echo "</tr>" . "\n";
                    }
                }    

            //Conexão com o BD

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "usuarios";

            try{
                $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Query

                $stmt = $conn->prepare("SELECT * FROM cadastro");
                $stmt->execute();

                //Construção do cabeçalho da tabela 
                $table = "class = table-bordered";
                echo "<table " . $table . ">";
                echo    "<thead>";
                echo        "<tr>";
                echo           "<th>ID</th>";
                echo           "<th>Nome</th>";
                echo           "<th>E-mail</th>";
                echo           "<th>Senha</th>";
                echo           "<th>RG</th>";
                echo           "<th>CPF</th>";
                echo           "<th>Direitos Administrativos</th>";
                echo           "<th>Operações</th>";
                echo        "</tr>";
                echo    "</thead>";
                echo    "<tbody>";
                
                //Chamada da função para construir os itens da tabela
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                echo "</tbody>";
                echo "</table>";

            }catch(PDOException $exp){
                echo "Connection with Database failed: " . $exp->getMessage();
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
