<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro</title>
	<link rel="stylesheet" href="../css/custom.min.css">
</head>

<body style="overflow-x: hidden; ">
	<div style="height: 100%; position: absolute; width: 100%">
		<div class="row h-100">
			<!-- Coluna da esquerda -->
			<div class="col-md-7 col-sm-12 h-100" style="height: 100vh">
				<img class="img-fluid" src="../img/imagem.jpg" style="width: 100%; height: 100%" alt="">
			</div>

			<!-- Coluna da direita -->
			<div class="col-md-5 col-xs-12 h-100">
				<div class="container mt-2 text-center">

					<!-- Conteúdo da coluna da direita -->
					<div class="col">

						<!-- Formulário de cadastro -->
						<form class="text-start p-5" method="POST" action="/sa_unipet/backend/cadastro_usuario.php">
							<div class="mt-3">
								<label class="form-label" for="nomecompleto">Nome completo</label>
								<input type="text" id="nomecompleto" name="nomecompleto" class="form-control">
							</div>

							<div class="mt-3">
								<label class="form-label" for="nomeusuario">Nome de usuário</label>
								<input type="text" id="nomeusuario" name="nomeusuario" class="form-control">
							</div>

							<div class="mt-3">
								<label class="form-label" for="email">E-mail</label>
								<input type="text" id="email" name="email" class="form-control">
							</div>

							<div class="mt-3">
								<label class="form-label" for="senha">Senha</label>
								<input type="password" id="senha" name="senha" class="form-control">
							</div>

							<div class="mt-3">
								<label class="form-label" for="confirmarsenha">Confirmar senha</label>
								<input type="password" id="confirmarsenha" name="confirmarsenha" class="form-control">
							</div>

							<div class="mt-3 text-end">
								<input type="submit" class="btn btn-primary" value="Cadastrar">
							</div>

							<div class="mt-3 text-end">
								<a href="login.php" class="text-decoration-none">Já possui uma conta? Entrar</a>
							</div>
						</form>

					</div>
				</div>

			</div>
		</div>
	</div>

</body>

</html>