<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT ID_PET,NOME_PET, FOTO_PET FROM USUARIO_PET INNER JOIN PET ON FK_PET=PET.ID_PET WHERE FK_USUARIO=:fk_usuario");

session_start();
$comando->bindValue(':fk_usuario',$_SESSION['pk_usuario']);
$comando->execute();

if ($comando->rowCount()>0)
{
    $pets = $comando->fetchAll();
    
}
unset($comando);
unset($pdo);