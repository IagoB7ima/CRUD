<?php
    session_start();
    include_once("conexao.php");
    echo"<h1> Dados do Formulário </h1> <hr>";

    $FCod=$_POST['codigo'];
    $FNome= $_POST['name'];
    $FEmail = $_POST['email'];
    $FSenha = $_POST['pss'];

   if((isset($_POST['email']))){
    $Femail = mysqli_real_escape_string($conexao, $_POST['email']);

    $sql = "SELECT * FROM usuario WHERE email = '$Femail' LIMIT 1";
    $result = mysqli_query($conexao, $sql);
    $resultado = mysqli_fetch_assoc($result);
    

    if(isset($resultado['email'])){
        $_SESSION['msg'] = "<p style='color:red;'>Registre um E-mail válido!</p>";        
        header("Location: formulario.php");
    }else{
        
        mysqli_query($conexao, "insert into usuario(codigo,nome,email,senha) values ('$FCod','$FNome','$FEmail','$FSenha')");
        
        if(mysqli_insert_id($conexao)){
            $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
            header("Location: index.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado!</p>";        
            header("Location: formulario.php");
        }
    }        
}
        


?>