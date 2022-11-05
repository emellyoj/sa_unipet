<?php
/*
SELECT 
	DATE_FORMAT(C.DATA_CONSULTA, '%Y/%m/%d') AS DATA_CONSULTA, 
    TRIM(LEADING '0' FROM DATE_FORMAT(C.HORA_CONSULTA, '%H:%i')) AS HORA_CONSULTA,
    P.NOME_PET,
    U.NOMECOMPLETO_USUARIO AS MEDICO
FROM CONSULTA C
INNER JOIN PET P ON P.ID_PET = C.FK_CONSULTA_PET
INNER JOIN USUARIO U ON U.ID_USUARIO = C.FK_CONSULTA_MEDICO
WHERE C.ID_CONSULTA = 1;
*/
function runInformacoesConsulta($consulta){
    include("conexao.php");

    $comando = $pdo->prepare("SELECT DATE_FORMAT(C.DATA_CONSULTA, '%Y/%m/%d') AS DATA_CONSULTA, TRIM(LEADING '0' FROM DATE_FORMAT(C.HORA_CONSULTA, '%H:%i')) AS HORA_CONSULTA, P.NOME_PET, U.NOMECOMPLETO_USUARIO AS MEDICO, U.ID_USUARIO AS ID_MEDICO FROM CONSULTA C INNER JOIN PET P ON P.ID_PET = C.FK_CONSULTA_PET INNER JOIN USUARIO U ON U.ID_USUARIO = C.FK_CONSULTA_MEDICO WHERE C.ID_CONSULTA = ?;");

    $comando->execute([$consulta]);

    if ($comando->rowCount()==1)
    {
        $informacoes_consulta = $comando->fetch();
    }
    unset($comando);
    unset($pdo);

    return $informacoes_consulta;
}