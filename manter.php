<?php
	session_start();
	include_once("conexao.php");
	
	if(!isset($_POST['codigo'])){
		header("Location: index.php");
	}	
	if(isset($_POST["nome"])){
        $nome      = $_POST["nome"];
        $email     = $_POST["email"];
        $senha     = $_POST["pss"];
        $tipo      = $_POST["tipo"];
        $codigo    = $_POST["codigo"];

        // Objeto para alterar
		$alterar = "UPDATE usuario SET "; 
		$alterar .= "nome = '{$nome}', ";
		$alterar .= "email = '{$email}', ";
		$alterar .= "senha = '{$senha}', ";
		$alterar .= "tipo = '{$tipo}' ";
		$alterar .= "WHERE codigo = {$codigo}";
		
		$operacao_alterar = mysqli_query($conexao, $alterar);
		$resultado = mysqli_fetch_assoc($operacao_alterar);

		if($operacao_alterar){		
			$_SESSION['sucesso'] = "<p style='color:green;'>Usuário editado com sucesso!</p>";
			$_SESSION['tipo'] = $resultado['tipo'];	
			header("Location: administrador.php");
		}

	}
    // Consulta a tabela 

    if(isset($_POST["codigo"]) ) {
        $codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);

		$tr = "SELECT * FROM usuario WHERE codigo = {$codigo} LIMIT 1";
		$consulta = mysqli_query($conexao, $tr);
		$info_usuario = mysqli_fetch_assoc($consulta);
    } 
	if(empty($info_usuario)){
		header("Location: administrador.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Editar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
                    Editar Usuário
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="manter.php" method="POST">
                    <input class="input100" type="hidden" name="codigo" value="<?php echo $info_usuario["codigo"] ?>" >
					
                    <div class="wrap-input100" required maxlength="50">
                        <input class="input100" type="text" value="<?php echo ($info_usuario["nome"]) ?>" name="nome"required>
                        <span class="focus-input100"></span>
                    </div> 
                    
                    <div class="wrap-input100">
                        <input class="input100" type="email" value="<?php echo ($info_usuario["email"]) ?>" name="email" id="email" required>
                        <span class="focus-input100"></span>
                    </div>  

                    <div class="wrap-input100">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" value="<?php echo ($info_usuario["senha"]) ?>" name="pss" pattern="\w{6,8}" title="A senha deve ter entre 6 e 8 caracteres!" required> 
                        <span class="focus-input100"></span>
                    </div>
					
                    <div class="wrap-input100 validate-input text-center p-t-50">
						<h5>Tipo de Usuário:<br><br> <?php echo $info_usuario["tipo"] ?></h5><br>
                        Usuário: <input class="input" type="radio" name="tipo" value="Usuário"><br>
                        Administrador: <input class="input" type="radio" name="tipo" value="Administrador"><br> 
				    </div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Editar
						</button>
					</div>					
				</form>
                <form class="login100-form validate-form p-b-33 p-t-5"action="exclusao.php" method="POST">
                    <input class="input100" type="hidden" name="codigo" value="<?php echo $info_usuario["codigo"] ?>" >	
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Excluir
                        </button>
                    </div>
                    <div class="text-center p-t-50">
                        <a class="txt2" href="administrador.php">Voltar</a><br>
                        <a class="txt2" href="sair.php">Sair</a>
                    </div>
                </form> 
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conexao);
?>