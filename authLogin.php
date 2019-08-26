<?php
    session_start();

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

            $stmt = $conn->prepare("SELECT * FROM cadastro WHERE email = ? AND senha = ?");
            $stmt->execute(array($_POST['email'], $_POST['pass']));

            //recuperar uma única linha
            $result = $stmt->fetch();

            if(!empty($result)){
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
            //Se não houverem elementos na busca, retorna-se a página de login   
            }
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
    //encerra a conexão
    $conn=null;
?>
        
     

 
