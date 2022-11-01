<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE usuario SET USERNAME_USUARIO=:USERNAME_USUARIO, NOMECOMPLETO_USUARIO=:NOMECOMPLETO_USUARIO,TELEFONE_USUARIO=:TELEFONE_USUARIO,EMAIL_USUARIO=:EMAIL_USUARIO,CEP_USUARIO=:CEP_USUARIO,ESTADO_USUARIO=:ESTADO_USUARIO,CIDADE_USUARIO=:CIDADE_USUARIO,BAIRRO_USUARIO=:BAIRRO_USUARIO,RUA_USUARIO=:RUA_USUARIO,NUMEROCASA_USUARIO=:NUMEROCASA_USUARIO,COMPLEMENTOENDERECO_USUARIO=:COMPLEMENTOENDERECO_USUARIO WHERE id_usuario=:id_usuario");


session_start();
$comando->bindValue(':USERNAME_USUARIO', $_POST['nomeusuario']);
$comando->bindValue(':NOMECOMPLETO_USUARIO', $_POST['nomecompleto']);
$comando->bindValue(':TELEFONE_USUARIO', $_POST['telefone']);
$comando->bindValue(':EMAIL_USUARIO', $_POST['email']);
$comando->bindValue(':CEP_USUARIO', $_POST['cep']);
$comando->bindValue(':ESTADO_USUARIO', $_POST['estado']);
$comando->bindValue(':CIDADE_USUARIO', $_POST['cidade']);
$comando->bindValue(':BAIRRO_USUARIO', $_POST['bairro']);
$comando->bindValue(':RUA_USUARIO', $_POST['rua']);
$comando->bindValue(':NUMEROCASA_USUARIO', $_POST['numero']);
$comando->bindValue(':COMPLEMENTOENDERECO_USUARIO', $_POST['complemento']);
$comando->bindValue(':id_usuario', $_SESSION['pk_usuario']);
// $data = [
//     'USERNAME_USUARIO'=> $_POST['nomecompleto'],
//     'NOMECOMPLETO_USUARIO'=> $_POST['nomeusuario'],
//     'TELEFONE_USUARIO'=> $_POST['telefone'],
//     'EMAIL_USUARIO'=> $_POST['email'],
//     'CEP_USUARIO'=> $_POST['cep'],
//     'ESTADO_USUARIO'=> $_POST['estado'],
//     'CIDADE_USUARIO'=> $_POST['cidade'],
//     'BAIRRO_USUARIO'=> $_POST['bairro'],
//     'RUA_USUARIO'=> $_POST['rua'],
//     'NUMEROCASA_USUARIO'=> $_POST['numero'],
//     'COMPLEMENTOENDERECO_USUARIO'=> $_POST['complemento'],
//     'id_usuario'=> $_SESSION['pk_usuario']
// ];

$comando->execute();

unset($comando);
unset($pdo);

$_SESSION['user_updated'] = true;
header('location:/sa_unipet/src/pages/perfil_usuario.php');