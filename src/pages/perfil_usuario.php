<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/custom.min.css">
    <script src="../../md_bootstrap/js/mdb.min.js"> </script>
    <script src="../js/verCidadesPorEstado.js"></script>
    <script src="../js/verInformacoesDoCep.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>

<body style="overflow: hidden;" data-userupdated = <?php session_start(); echo (isset($_SESSION['user_updated'])) ? "1" : "0"?>>
    <div style="height: 100%; position: absolute; width: 100%">
        <div class="row h-100">
            <!-- Coluna da esquerda -->
            <?php 
                include('_sidebar.php');
                mainSideBar('meu_perfil');
                ?>
                

            <!-- Coluna da direita -->
            <div class="col-9 container mt-4" style="overflow-y: scroll; height: 100vh;">
                <h1 class="h1 text-center mt-2 font-weight-bold" style="height:6.5vh">Meu perfil</h1>
                <div class="container mt-2 text-center col">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#perfil"
                    aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-user-alt fa-fw me-2"></i>Informações pessoais</a>
                </li>
                <?php 
                if ($_SESSION['fk_tipousuario']==1 ) {
                    ?> 
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#pets"
                        aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-paw fa-fw me-2"></i>Pets</a>
                    </li>
                    <?php
                }
                ?>
                
                </ul>
                <!-- Tabs navs -->

                
                <div id="myTab-content" class="tab-content">
                     <!-- Formulário de cadastro -->
                    <form class="text-start p-5 pt-0 tab-pane fade show active" role="tab-panel" aria-labelledby="myTab-tab-1"
                          action="../../backend/update_informacoes_usuario.php" method="POST" id="perfil">
                        <?php include('../../backend/select_informacoes_usuario.php');?>
                        <div class="mt-3 row">
                            <label class="form-label p-0" for="nomecompleto">Nome completo</label>
                            <input type="text" id="nomecompleto" name="nomecompleto" class="form-control" value="<?php echo $info_usuario['NOMECOMPLETO_USUARIO']; ?>" required>
                        </div>

                        <div class="mt-3 row">
                            <div class="col p-0 pe-2">
                                <label class="form-label" for="nomeusuario">Nome de usuário</label>
                                <input type="text" id="nomeusuario" name="nomeusuario"  class="form-control" value="<?php echo $info_usuario['USERNAME_USUARIO']; ?>" required>
                            </div>
                            <div class="col p-0 ps-2">
                                <label class="form-label" for="telefone">Telefone</label>
                                <input type="text" id="telefone" name="telefone"  class="form-control" placeholder="(00) 00000-0000" value="<?php echo $info_usuario['TELEFONE_USUARIO']; ?>" >
                            </div>

                        </div>

                        <div class="mt-3 row">
                            <label class="form-label p-0" for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="seunome@exemplo.com" value="<?php echo $info_usuario['EMAIL_USUARIO']; ?>" required>
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
                            <div class="col p-0" id="alert-wrapper">
                            </div>
                            <div class="col-4 p-0">
                                <button type="submit" class="btn btn-primary" style="width: 100%" data-mdb-ripple-duration="0">Atualizar</button>
                            </div>
                        </div>
                    </form>
                    <!-- TAB PET -->
                    <?php 
                        if ($_SESSION['fk_tipousuario']==1 ) {
                            ?> 
                            <div id="pets" class="tab-pane fade" role="tabpanel" aria-labelledby="myTab-tab-2">

                                <div class="row" style="height:31.5vh">
                                <?php 
                                    include("../../backend/select_pets_por_dono.php"); 
                                    foreach ($pets as $pet) {
                                        ?>
                                            
                                            <div class="col-2" style="height:31.5vh" >
                                                <a class="text-decoration-none" href="atualizar_pet.php?pet=<?php echo $pet["ID_PET"] ?>">
                                                <div class="card">
                                                    <img src="<?php echo $pet["FOTO_PET"] ?>" style="max-height:20vh; height:20vh;" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <span class="row mt-1">
                                                            <span class="col">
                                                                <h6 class="card-title"><strong><?php echo $pet["NOME_PET"]; ?></strong></h6>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        <?php
                                    }
                                    ?>
                            </div>
                            
                            <div class="row mt-3 container">
                                <div class="col-3 p-0">
                                    <a class="btn btn-primary text-nowrap" href="cadastro_pet.php" style="width: 100%" data-mdb-ripple-duration="0">Cadastrar pet</a>
                                </div>
                                <div class="col-3 p-0 ms-3">
                                        <a class="btn btn-outline-primary text-nowrap" style="width: 100%" data-mdb-ripple-duration="0">Agendar consulta</a>
                                    </div>
                            </div>
                            <hr class="hr">
                            <h3 class="h3 text-start">Histórico de compromissos</h3>
                            <div class="row" style="height:30vh">
                                <div class="col" style="height:100%; overflow-y:scroll; box-sizing: border-box;">
                                <table class="table mt-3 w-100" >
                                <thead >
                                    <tr>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                           
                            <?php
                        }
                        ?>
                        
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
                                document.querySelector('#cep').value="<?php echo $info_usuario['CEP_USUARIO'];?>"
                                document.querySelector('#rua').value="<?php echo $info_usuario['RUA_USUARIO'];?>"
                                document.querySelector('#bairro').value="<?php echo $info_usuario['BAIRRO_USUARIO'];?>"
                                console.log('end selectCity');
                            }

                            async function verifyUpdatedUserAlert(){
                                if (document.querySelector('body').getAttribute('data-userupdated') == '1') {
                                    document.querySelector("#alert-wrapper").innerHTML = '<div class="alert alert-success alert-dismissible text-start me-3" role="alert" id="alert-user-updated">Seu cadastro foi atualizado com sucesso!</div>'
                                    await selectCity()
                                    
                                    await new Promise(r => setTimeout(r, 2000));
                                    
                                    document.querySelector("#alert-wrapper").innerHTML = ''
                                    <?php
                                    unset($_SESSION['user_updated']);
                                    ?>
                                }
                                await selectCity()
                            }

                            verifyUpdatedUserAlert()

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

                            const bsTab = new bootstrap.Tab('#myTab')

                            const triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'));
                            triggerTabList.forEach((triggerEl) => {
                            const tabTrigger = new mdb.Tab(triggerEl);

                            triggerEl.addEventListener('click', (event) => {
                                event.preventDefault();
                                tabTrigger.show();
                            });
                            });
                            const tabEl = document.querySelector('button[data-bs-toggle="tab"]')
                            tabEl.addEventListener('shown.bs.tab', event => {
                            event.target // newly activated tab
                            event.relatedTarget // previous active tab
                            })

                    
                        </script>
                </div>

            </div>
        </div>
    </div>
    
</body>


</html>