<?php
    session_start();
    include_once("conexao.php");
    

    if((isset($_POST['email']))&&(isset($_POST['pss']))){
        $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, $_POST['pss']);

        $tipo = 'Administrador';
        
               
        $sql = "SELECT * FROM usuario WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conexao, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(empty($resultado)){
            $_SESSION['loginErro'] = "<p style='color:red;'>Usuário ou senha inválidos!</p>";
            header("Location: index.php");           
        }elseif(isset($resultado)){
            if($resultado['tipo']==$tipo){
                $_SESSION['nome'] = $resultado['nome'];
                $_SESSION['codigo'] = $resultado['codigo'];
                $_SESSION['email'] = $resultado['email'];
                $_SESSION['senha'] = $resultado['senha'];
                $_SESSION['tipo'] = $resultado['tipo'];
                header("Location: administrador.php");
            }else{
            $_SESSION['nome'] = $resultado['nome'];
            $_SESSION['codigo'] = $resultado['codigo'];
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['senha'] = $resultado['senha'];
            $_SESSION['tipo'] = $resultado['tipo'];
            header("Location: usuario.php");
            }
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Usuário ou senha inválidos!</p>";
            header("Location: index.php");             
        }
        
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Usuário ou senha inválidos!</p>";
        header("Location: index.php");
    }
   
?>