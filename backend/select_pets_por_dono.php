<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT id_pet,nome_pet FROM usuario_pet INNER JOIN pet ON fk_pet=pet.ID_PET WHERE fk_usuario=:fk_usuario");

session_start();
$comando->bindValue(':fk_usuario',$_SESSION['pk_usuario']);
$comando->execute();

if ($comando->rowCount()>0)
{
    $pets = $comando->fetchAll();
    
}
unset($comando);
unset($pdo);