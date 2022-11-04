<?php
include("conexao.php");

if (isset($info_usuario)){
    unset($info_usuario);
    echo('ahdaskjdhajlsdjklashdklsakldahskljdhaskdashdaslkjhdkjahsdlkjashdlkjashdlkjashdklh');
}

$comando = $pdo->prepare("SELECT * FROM USUARIO WHERE ID_USUARIO=:id_usuario");
session_start();
$comando->bindValue(':id_usuario',$_SESSION['pk_usuario']);
$comando->execute();

if ($comando->rowCount()==1)
{
    $info_usuario = $comando->fetch();
    
}
unset($comando);
unset($pdo);