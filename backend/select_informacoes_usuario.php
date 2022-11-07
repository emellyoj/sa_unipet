<?php
include("conexao.php");

if (isset($info_usuario)){
    unset($info_usuario);
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

function selectUserByID($id){
    if (isset($info_usuario)){
        unset($info_usuario);
    }

    include("conexao.php");

    $comando = $pdo->prepare("SELECT * FROM USUARIO WHERE ID_USUARIO=:id_usuario");
    $comando->bindValue(':id_usuario', $id);
    $comando->execute();
    
    if ($comando->rowCount()==1)
    {
        $info_usuario = $comando->fetch();
        
    }

    unset($comando);
    unset($pdo);
    
    return $info_usuario;
}