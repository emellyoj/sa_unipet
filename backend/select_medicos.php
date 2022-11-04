<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT ID_USUARIO, NOMECOMPLETO_USUARIO FROM USUARIO WHERE FK_TIPOUSUARIO = 2;");
$comando->execute();

if ($comando->rowCount()>0)
{
    $todos_medicos = $comando->fetchAll();
    
}
unset($comando);
unset($pdo);