<?php

    session_start();
    unset($_SESSION["error_login"]);


    //Conexão com o BD
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "usuarios";

    try{
        
        $conn = new PDO("mysql:host=$server;dbname=$db",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Query
        $query= "INSERT INTO cadastro (nome, email, senha, rg, cpf, is_admin) 
        VALUES (
            '{$_POST['nome']}', 
            '{$_POST['email']}', 
            '{$_POST['pass']}', 
            '{$_POST['rg']}', 
            '{$_POST['cpf']}', 
            '0')";

        //exec, pois não tem retorno!
        $stmt = $conn->exec($query);

        //Indica que o usuário foi cadastrado e redireciona para a página de login
        $_SESSION['novo_cad'] = 1;
        header("location:login.php");
        die();

    }catch(PDOException $exp){
        echo "Couldn't register:" . $exp->getMessage();
    }

    $conn=null;
?>