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
				<img src="../img/img_cadastro.png" style="width: 100%; height: 100%" alt="">
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
								<input type="text" id="nomecompleto" name="nomecompleto" class="form-control" required>
							</div>

							<div class="mt-3">
								<label class="form-label" for="nomeusuario">Nome de usuário</label>
								<input type="text" id="nomeusuario" name="nomeusuario" class="form-control" style="text-transform: lowercase" required>
							</div>

							<div class="mt-3">
								<label class="form-label" for="email">E-mail</label>
								<input type="email" id="email" name="email" class="form-control" required>
							</div>

							<div class="mt-3">
								<label class="form-label" for="senha">Senha</label>
								<input type="password" id="senha" name="senha" class="form-control" required>
							</div>

							<div class="mt-3">
								<label class="form-label" for="confirmarsenha">Confirmar senha</label>
								<input type="password" id="confirmarsenha" name="confirmarsenha" class="form-control" required>
							</div>

							<div class="mt-3 text-end">
								<input type="submit" class="btn btn-primary" value="Cadastrar">
							</div>

							<div class="mt-3 text-end">
								<a href="login.php" class="text-decoration-none">Já possui uma conta? Entrar</a>
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
	async function showError(msg){
		console.log(msg);
		document.querySelector('#alert-wrapper').innerHTML = `<div class="alert alert-danger alert-dismissible text-start me-3" role="alert" id="alert-user-updated">${msg}  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;
		
	}
	<?php 
		session_start();
		if (isset($_SESSION['erros_cadastro'])){
				$msg = '<ul>';
				foreach ($_SESSION['erros_cadastro'] as $erro) {
					$msg .= "<li>".$erro."</li>";
				}
				$msg .= "</ul>";
				?>
				document.querySelector('#nomecompleto').value = '<?php echo $_SESSION['info_cadastro']['nomecompleto']; ?>'
				document.querySelector('#nomeusuario').value = '<?php echo in_array('nome_de_usuario_usado', $_SESSION['erros_cadastro']) ? '' :$_SESSION['info_cadastro']['nomeusuario']; ?>'
				document.querySelector('#email').value = '<?php echo in_array('nome_de_usuario_usado', $_SESSION['erros_cadastro']) ? '' : $_SESSION['info_cadastro']['email']; ?>'

				showError("<?php echo $msg; ?>");
				<?php
				unset($_SESSION['erros_cadastro']);
				unset($_SESSION['info_cadastro']);
		}

	?>	


	document.querySelector('#nomeusuario').addEventListener('keyup', e => {
		usernameInput = document.querySelector('#nomeusuario').value

		// Substituição de caracteres especiais
		charMap = {
			'á': 'a', 'é': 'e', 'í': 'i', 'ó': 'o', 'ú': 'u',
			'à': 'a', 'è': 'e', 'ì': 'i', 'ò': 'o', 'ù': 'u',
			'ã': 'a', 'ẽ': 'e', 'ĩ': 'i', 'õ': 'o', 'ũ': 'u',
			'â': 'a', 'ê': 'e', 'î': 'i', 'ô': 'o', 'û': 'u',
			'ç': 'c', 'ḉ': 'c'
		}
		for (const [key, value] of Object.entries(charMap)) {
			pat = new RegExp(key, 'gi')
			usernameInput = usernameInput.replace( pat , value)
		}

		// Remover espaços
		console.log(usernameInput);
		if ( usernameInput.search( /\s/g ) != -1 )
		{
			usernameInput = usernameInput.replace( /\s/g , "" ) ;
		}	

		// Remover caracteres especiais
		if ( usernameInput.search( /[^a-z0-9]/i ) != -1 )
		{
			usernameInput = usernameInput.replace( /[^a-z0-9]/gi , "" ) ;
		}

		document.querySelector('#nomeusuario').value = usernameInput.toLowerCase();
	})
</script>
</html>