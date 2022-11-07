<?php

function runInformacoesPet ($id_pet){
    include("conexao.php");
    
    $comando = $pdo->prepare("SELECT * FROM PET P INNER JOIN USUARIO_PET UP ON P.ID_PET = UP.FK_PET INNER JOIN USUARIO U ON U.ID_USUARIO = UP.FK_USUARIO WHERE ID_PET = ?;");
    $comando->execute([$id_pet]);
    
    if ($comando->rowCount()==1)
    {
        $informacoes_pet = $comando->fetch();
        
    }
    unset($comando);
    unset($pdo);

    return $informacoes_pet;
}