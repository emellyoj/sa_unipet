<?php
session_start();
/*
SELECT C.ID_CONSULTA, P.NOME_PET, C.DATA_CONSULTA, C.HORA_CONSULTA FROM CONSULTA, C.STATUS
INNER JOIN PET P 
ON C.FK_CONSULTA_PET = P.ID_PET
WHERE C.FK_CONSULTA_MEDICO  = 1;
*/

/*
SELECT V.ID_VACINACAO, P.NOME_PET, V.DATA_VACINACAO, V.HORA_VACINACAO, V.STATUS
FROM VACINACAO V
INNER JOIN PET P 
ON V.FK_VACINACAO_PET = P.ID_PET
WHERE C.FK_CONSULTA_MEDICO  = 1;
*/
include("conexao.php");

if ($_SESSION['fk_tipousuario'] == 2) {
    $comando = $pdo->prepare("SELECT C.ID_CONSULTA, P.NOME_PET, C.DATA_CONSULTA, C.HORA_CONSULTA, C.STATUS FROM CONSULTA C INNER JOIN PET P ON C.FK_CONSULTA_PET = P.ID_PET WHERE C.FK_CONSULTA_MEDICO = ?;");
    $comando->execute([(int)$_SESSION['pk_usuario']]);
    
    if ($comando->rowCount()>0){
        $consultas = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $consultas = [];
    }
    
    unset($comando);

    $comando = $pdo->prepare("SELECT V.ID_VACINACAO, P.NOME_PET, V.DATA_VACINACAO, V.HORA_VACINACAO, V.STATUS FROM VACINACAO V INNER JOIN PET P ON V.FK_VACINACAO_PET = P.ID_PET WHERE V.FK_VACINACAO_MEDICO = ?;");
    $comando->execute([(int)$_SESSION['pk_usuario']]);
    
    if ($comando->rowCount()>0){
        $vacinacoes = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $vacinacoes = [];
    }

    unset($pdo);
}
else {
    if ($_SESSION['fk_tipousuario'] == 1) {
        header('location:sa_unipet/src/pages/agenda_pet.php');
    }
    if ($_SESSION['fk_tipousuario'] == 3) {
        header('location:sa_unipet/src/pages/perfil_usuario.php');
    }
}
