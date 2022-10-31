<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/custom.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <script src="../js/verCidadesPorEstado.js"></script>
    <script src="../js/verInformacoesDoCep.js"></script>
</head>

<body style="overflow: hidden; ">
    <div style="height: 100%; position: absolute; width: 100%">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('_sidebar.php');
                mainSideBar('meu_perfil'); 
            ?>

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold">Informações Pessoais</h1>
                <div class="container mt-2 text-center col">
                    <!-- Formulário de cadastro -->
                    <form class="text-start p-5" action="../../backend/update_informacoes_usuario.php" method="POST" id="perfil">
                        <?php include('../../backend/select_informacoes_usuario.php');?>
                        <div class="mt-3 row">
                            <label class="form-label p-0" for="nomecompleto">Nome completo</label>
                            <input type="text" id="nomecompleto" name="nomecompleto" class="form-control" value="<?php echo $info_usuario['NOMECOMPLETO_USUARIO']; ?>">
                        </div>

                        <div class="mt-3 row">
                            <div class="col p-0 pe-2">
                                <label class="form-label" for="nomeusuario">Nome de usuário</label>
                                <input type="text" id="nomeusuario" name="nomeusuario"  class="form-control" value="<?php echo $info_usuario['USERNAME_USUARIO']; ?>">
                            </div>
                            <div class="col p-0 ps-2">
                                <label class="form-label" for="telefone">Telefone</label>
                                <input type="text" id="telefone" name="telefone"  class="form-control" placeholder="(00) 00000-0000" value="<?php echo $info_usuario['TELEFONE_USUARIO']; ?>">
                            </div>

                        </div>

                        <div class="mt-3 row">
                            <label class="form-label p-0" for="email">E-mail</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="seunome@exemplo.com" value="<?php echo $info_usuario['EMAIL_USUARIO']; ?>">
                        </div>

                        <div class="mt-3 row">
                            <div class="col-5 p-0">
                                <label class="form-label" for="cep">CEP</label>
                                <input type="text" id="cep" name="cep" class="form-control" placeholder="00000-000" onkeyup="verInformacoesDoCep(this.value)" value="<?php echo $info_usuario['CEP_USUARIO']; ?>">
                            </div>
                        </div>

                        <div class="mt-3 row">
                            <div class="col-2 p-0 ">
                                <label class="form-label" for="estado">Estado</label>
                                <select class="form-select" id="estado" name="estado" onchange="getCitiesByState(this.value)" form="perfil">
                                    <option selected disabled value="0">--</option>
                                    <option value="AL">AL</option>
                                    <option value="AC">AC</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                            <script> 
                                
                            </script>
                            <div class="col-5 p-0  ps-3 pe-3">
                                <label class="form-label" for="cidade">Cidade</label>
                                <select class="form-select" id="cidade" name="cidade">
                                </select>
                            </div>

                            <div class="col-5 p-0">
                                <label class="form-label" for="bairro">Bairro</label>
                                <input type="text" id="bairro" name="bairro" class="form-control" value="<?php echo $info_usuario['BAIRRO_USUARIO']; ?>">
                            </div>
                        </div>
                        <div class="mt-3 row">
                            <div class="col-5 p-0">
                                <label class="form-label" for="rua">Rua</label>
                                <input type="text" id="rua" name="rua" class="form-control" value="<?php echo $info_usuario['RUA_USUARIO']; ?>">
                            </div>
                            <div class="col-2 p-0 ps-3 pe-3">
                                <label class="form-label" for="numero">Número</label>
                                <input type="number" id="numero" name="numero" class="form-control" value="<?php echo $info_usuario['NUMEROCASA_USUARIO']; ?>">
                            </div>
                            <div class="col-5 p-0">
                                <label class="form-label" for="complemento">Complemento <span class="text-secondary" style="font-size: 0.8em">(Opcional)</span></label>
                                <input type="text" id="complemento" name="complemento" class="form-control" value="<?php echo $info_usuario['COMPLEMENTOENDERECO_USUARIO']; ?>">
                            </div>
                        </div>



                        <div class="row mt-5 text-end">
                            <div class="col"></div>
                            <div class="col-4 p-0">
                                <button type="submit" class="btn btn-primary" style="width: 100%">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script> 
        async function selectState() {
            console.log('start selectState');
            document.querySelector('#estado').value="<?php echo $info_usuario['ESTADO_USUARIO']?>"
            console.log('end selectState');
        }
        async function selectCity() {
            console.log('start selectCity');
            await selectState()
            await getCitiesByState("<?php echo $info_usuario['ESTADO_USUARIO']?>")
            document.querySelector('#cidade').value="<?php echo $info_usuario['CIDADE_USUARIO']?>"
            console.log('end selectCity');
        }
        selectCity()
    </script>
</body>

</html>