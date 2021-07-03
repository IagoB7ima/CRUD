<?php
    include_once("conexao.php");
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrador</title>
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
					Acessar a Conta
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="manter.php" method="POST">
					<div class="text-center p-t-50">
                        <h5><?php  
                            if(!isset($_SESSION['nome'])&&($_SESSION['tipo']=='Administrador')){
                                header("Location: index.php");  
                            }else{
                            echo "Usuário: ". $_SESSION['nome'];
                            ?>
                                <br>
                            <?php
                            echo "Mátricula: ". $_SESSION['codigo'];
                            }
                        ?></h5>
					</div>
					<div class="wrap-input100 text-center validate-input" data-validate = "Matrícula">
						<input type="text" name="codigo" placeholder="Matrícula">
						<span data-placeholder="&#xe82a;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Proucurar
						</button>
					</div>
				</form>
                <form class="login100-form validate-form p-b-33 p-t-5" action="formulario1.php" method="POST">
                    <input class="input100" type="hidden" name="codigo" value="<?php echo $info_usuario["codigo"] ?>" >
					<div class="container-login100-form-btn m-t-3">
						<button class="login100-form-btn">
							Cadastrar
						</button>
					</div>
					<div class="text-center p-t-50">
						<?php
								if(isset($_SESSION['msg'])){
									echo $_SESSION['msg'];
									unset($_SESSION['msg']);
								}
							?>
							<?php
								if(isset($_SESSION['sucesso'])){
									echo $_SESSION['sucesso'];
									unset($_SESSION['sucesso']);
								}
							?>
							<?php
								if(isset($_SESSION['msgerro'])){
									echo $_SESSION['msgerro'];
									unset($_SESSION['msgerro']);
								}
						?>
					</div>
										          								      			
						<div class="text-center p-t-50">
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