<?php
    include_once("conexao.php");
    session_start();

    if(!isset($_POST['codigo'])){
		header("Location: index.php");
    }

    if(isset($_POST['nome'])){
        $codigo = $_POST["codigo"];

        $exclusao = "DELETE FROM usuario WHERE codigo = {$codigo} ";
        $con_exclusao = mysqli_query($conexao, $exclusao);

        if(!$con_exclusao){
            die("Registro não excluido!");
        }else{
			$_SESSION['sucesso'] = "<p style='color:green;'>Usuário excluido com sucesso!</p>";	
			header("Location: administrador.php");;
        }

    }

    //Consultar tabela usuario
    $tr = "SELECT * FROM usuario ";
    if(isset($_POST["codigo"])){
        $codigo = $_POST["codigo"];
        $tr .= "WHERE codigo = {$codigo}";
    }

    $con_usuario = mysqli_query($conexao, $tr);
    if(!$con_usuario){
        die("Erro na consulta");
    }

    $info_usuario = mysqli_fetch_assoc($con_usuario);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Excluir Usuário</title>
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
				<form class="login100-form validate-form p-b-33 p-t-5" action="exclusao.php" method="POST">
                    <input class="input100" type="hidden" name="codigo" value="<?php echo $info_usuario["codigo"] ?>" >
					
                    <div class="wrap-input100" maxlength="50">
					<input class="input100" type="text" value="<?php echo ($info_usuario["nome"])  ?>" name="nome">
					<span class="focus-input100"></span>
				</div>                   

				<div class="wrap-input100">
					<input class="input100" type="email" value="<?php echo ($info_usuario["email"])  ?>" name="email" id="email" required>
					<span class="focus-input100"></span>
				</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Excluir
						</button>
					</div>
                    <div class="text-center p-t-50">
                        <a class="txt2" href="manter.php">Voltar</a><br>
                        <a class="txt2" href="sair.php">Sair</a>
                    </div>
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