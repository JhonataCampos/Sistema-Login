<?php
    session_start();
    unset($_SESSION["novo_cad"]);

        //Dados do Banco
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "usuarios";

        //Conexão
        try{
            $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
        
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //Query
            $stmt = $conn->prepare("SELECT * FROM cadastro WHERE email = :email");
            $stmt->bindparam(":email", $_POST["email"]);
            $stmt->execute();

            //recuperar uma única linha
            $result = $stmt->fetch();

            if(!empty($result)){
                if(password_verify($_POST["pass"], $result["senha"]) == 1){
 
                    //hora de acesso à conta é formatada e armazenada em SESSION
                    $data = getdate();
                    $data["hours"] = $data["hours"] - 5;  //Ajustando o horário para o GMT certo
                    $acesso = date("d/m/y, h:i:s a", mktime($data["hours"], $data["minutes"], $data["seconds"], 
                    $data["mon"], $data["mday"], $data["year"]));
                    $_SESSION['last_access'] = $acesso;

                    //armazena o horário de acesso no BD
                    $query = "UPDATE cadastro SET last_access = ? WHERE email = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->execute(array($acesso, $_POST['email']));
                    
                    //Salvo os dados do usuário na sessão
                    $_SESSION['nome'] = $result['nome'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['rg'] = $result['rg'];
                    $_SESSION['cpf'] = $result['cpf'];
                    $_SESSION['admin'] = $result['is_admin'];
                    
                    //Redireciona dependendo do privilégio do usuário
                    if($result["is_admin"] == 1){
                        $_SESSION["login_success"] = 1;
                        header("location: admin.php");
                        die();
                    }else{
                        $_SESSION["login_success"] = 1;
                        header("location: welcome.php");
                        die();
                    }
                }else{
                    $_SESSION['error_login'] = 1;
                        header("location: login.php");
                       die();
                }
            }
            //Se não houverem elementos na busca, retorna-se a página de login   
            else{
               $_SESSION['error_login'] = 1;
               header("location: login.php");
               die();
            }
        }
        catch(PDOException $exp)
        {
        echo "Connection with Database failed: " . $exp->getMessage();
        }
    //encerra a conexão+-
    $conn=null;
?>
        
     

 
