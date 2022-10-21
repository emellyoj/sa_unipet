<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario");

session_start();
$comando->bindValue(':id_usuario',$_SESSION['pk_usuario']);
$comando->execute();

if ($comando->rowCount()>0)
{
    $info_usuario = $comando->fetch();
    
}
unset($comando);
unset($pdo);