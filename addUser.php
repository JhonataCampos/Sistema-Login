<?php
    session_start();
    unset($_SESSION["error_login"]);
    unset($_SESSION['email_existente']);
    
    //Antes de conectar com o banco, converter a senha para hash
    $senha = password_hash($_POST["pass"], PASSWORD_DEFAULT);

    //Conexão com o BD
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "usuarios";

    try{
        
        $conn = new PDO("mysql:host=$server;dbname=$db",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //consulta o BD para verificar se não existe nenhum e-mail já cadastrado
        $query = "SELECT email FROM cadastro WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindparam(":email", $_POST['email']);    
        $stmt->execute();
        $result = $stmt->fetch();

        //Se não houver
        if(!$result){
           
            //Query
            $query= "INSERT INTO cadastro (nome, email, senha, rg, cpf, last_access, is_admin) 
            VALUES (
                '{$_POST['nome']}', 
                '{$_POST['email']}', 
                '{$senha}', 
                '{$_POST['rg']}', 
                '{$_POST['cpf']}',
                '{$_SESSION['last_access']}' 
                '0')";

            //exec, pois não tem retorno!
            $stmt = $conn->exec($query);

            //Indica que o usuário foi cadastrado e redireciona para a página de login
            $_SESSION['novo_cad'] = 1;
            header("location:login.php");
            die();
        }else{
            $_SESSION['email_existente'] = 1;
            header("location:signup.php");
            die();
        }
    }catch(PDOException $exp){
        echo "Couldn't register:" . $exp->getMessage();
    }

    $conn=null;
?>