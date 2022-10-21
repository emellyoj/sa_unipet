<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT id_usuario, nomecompleto_usuario FROM usuario WHERE fk_tipousuario = 2;");
$comando->execute();

if ($comando->rowCount()>0)
{
    $todos_medicos = $comando->fetchAll();
    
}
unset($comando);
unset($pdo);