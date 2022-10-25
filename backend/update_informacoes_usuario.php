<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE usuario SET USERNAME_USUARIO=:USERNAME_USUARIO, NOMECOMPLETO_USUARIO=:NOMECOMPLETO_USUARIO,TELEFONE_USUARIO=:TELEFONE_USUARIO,EMAIL_USUARIO=:EMAIL_USUARIO,CEP_USUARIO=:CEP_USUARIO,ESTADO_USUARIO=:ESTADO_USUARIO,CIDADE_USUARIO=:CIDADE_USUARIO,BAIRRO_USUARIO=:BAIRRO_USUARIO,RUA_USUARIO=:RUA_USUARIO,NUMEROCASA_USUARIO=:NUMEROCASA_USUARIO,COMPLEMENTOENDERECO_USUARIO=:COMPLEMENTOENDERECO_USUARIO WHERE id_usuario=:id_usuario");

var_dump($_POST);

session_start();
$data = [
    'USERNAME_USUARIO'=> $_POST['nomecompleto'],
    'NOMECOMPLETO_USUARIO'=> $_POST['nomeusuario'],
    'TELEFONE_USUARIO'=> $_POST['telefone'],
    'EMAIL_USUARIO'=> $_POST['email'],
    'CEP_USUARIO'=> $_POST['cep'],
    'ESTADO_USUARIO'=> $_POST['estado'],
    'CIDADE_USUARIO'=> $_POST['cidade'],
    'BAIRRO_USUARIO'=> $_POST['bairro'],
    'RUA_USUARIO'=> $_POST['rua'],
    'NUMEROCASA_USUARIO'=> $_POST['numero'],
    'COMPLEMENTOENDERECO_USUARIO'=> $_POST['complemento'],
    'id_usuario'=> $_SESSION['pk_usuario']
];

$comando->execute($data);

unset($data);
unset($comando);
unset($pdo);

header('/sa_unipet/src/pages/perfil_usuario.php');