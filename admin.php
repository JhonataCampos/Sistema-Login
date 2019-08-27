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
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <title>Mind Case: Admin</title>
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

        <div class="container-fluid" id="corpo">
            <h3>Bem-Vindo, <?php echo $_SESSION["nome"];?> </h3>

            <h4>Aqui estão os usuários cadastrados:</h4>

            <!--Exibição de usuários-->
            <div class="container" id="table">
                <?php 

                    echo $_SESSION["last_access"];

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

                        $stmt = $conn->prepare("SELECT id, nome, email, last_access, is_admin FROM cadastro");
                        $stmt->execute();

                        //Construção do cabeçalho da tabela 
                        echo "<table class='table table-hover table-condensed'>";
                        echo    "<thead>";
                        echo        "<tr>";
                        echo           "<th>ID</th>";
                        echo           "<th>Nome</th>";
                        echo           "<th>E-mail</th>";
                        echo           "<th>Último Acesso</th>";
                        echo           "<th>Admin</th>";
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
                <a href="https://github.com/JhonataCampos">Jhonata Campos - 2019</a>
            </div>
    </footer>

</html>