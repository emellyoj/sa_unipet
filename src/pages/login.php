<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="../css/custom.min.css">
</head>
<body style="overflow: hidden; ">
	<div style="height: 100vh; position: absolute; width: 100%">
		
	
	
		<div class="row h-100">
			<!-- Coluna da esquerda -->
			<div class="col-md-7 com-xs-12 h-100 p-0" style="height: 100vh">
				<img class="img-fluid" src="../img/img_login.png" style="width: 100%">
			</div>

			<!-- Coluna da direita -->
		  	<div class="col-md-5 col-sm-12 h-100 p-0">
				<div class="container mt-5 text-center p-0"> 

					<!-- Conteúdo da coluna da direita -->
					<div class="col p-5">

						<!-- Formulário de login -->
						<form action="../../backend/login.php" method="POST" class="text-start">
							<div>
								<label class="form-label" for="email">E-mail ou usuário</label>
								<input type="text" id="email" name="entrada" class="form-control">
							</div>

							<div class="mt-4">
								<label class="form-label" for="senha">Senha</label>
								<input type="password" id="senha" name="senha" class="form-control">
							</div>

							<div class="mt-4 text-end">
								<input type="submit" class="btn btn-primary" value="Entrar">
							</div>

							<div class="mt-3 text-end">
								<a href="cadastro.php" class="text-decoration-none">Ainda não tem uma conta? Cadastre-se</a>
							</div>

							<div class="row mt-2" id="alert-wrapper"></div>
						</form>  

					</div>
				</div>

		  	</div>
		</div>
  </div>

</body>
<script>
	async function showError(){
		document.querySelector('#alert-wrapper').innerHTML = `<div class='alert alert-danger alert-dismissible text-start me-3' role='alert' id='alert-user-updated'>Usuario ou senha incorreto!</div>`;
		await new Promise(r => setTimeout(r, 2000));    
		document.querySelector('#alert-wrapper').innerHTML = '';

	}
	<?php 
		session_start();

		if (isset($_SESSION['erro_login']) and $_SESSION['erro_login']) {
			?> 
			document.querySelector('#email').value = '<?php echo $_SESSION['info_login']['email'] ?>';

			showError();
			<?php
		unset($_SESSION['erro_login']);
		unset($_SESSION['info_login']);
		}
	?>	
</script>
</html>