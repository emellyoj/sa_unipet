<?php
/*
SELECT 
	DATE_FORMAT(V.DATA_VACINACAO, '%Y/%m/%d') AS DATA_VACINACAO, 
    TRIM(LEADING '0' FROM DATE_FORMAT(V.HORA_VACINACAO, '%H:%i')) AS HORA_VACINACAO,
    P.NOME_PET, P.ID_PET, V.FK_VACINACAO_MEDICO AS ID_MEDICO,
    V.STATUS, V2.NOME_VACINA, V2.DESCRICAO_VACINA,
    M.NOMECOMPLETO_USUARIO AS MEDICO,
    A.NOMECOMPLETO_USUARIO AS ACOMPANHANTE
FROM VACINACAO V
INNER JOIN PET P 
	ON P.ID_PET = V.FK_VACINACAO_PET
INNER JOIN USUARIO M
	ON V.FK_VACINACAO_MEDICO = M.ID_USUARIO
INNER JOIN USUARIO_PET UP
	ON UP.FK_PET = P.ID_PET
INNER JOIN USUARIO A
	ON A.ID_USUARIO = UP.FK_USUARIO
INNER JOIN VACINA V2
	ON V2.ID_VACINA = V.FK_VACINACAO_VACINA
WHERE V.ID_VACINACAO = 2
AND (M.ID_USUARIO = 1 OR A.ID_USUARIO = 1);

*/
function runInformacoesVacinacao($vacinacao){
    session_start();
    include("conexao.php");

    $comando = $pdo->prepare("SELECT DATE_FORMAT(V.DATA_VACINACAO, '%Y/%m/%d') AS DATA_VACINACAO, TRIM(LEADING '0' FROM DATE_FORMAT(V.HORA_VACINACAO, '%H:%i')) AS HORA_VACINACAO, P.NOME_PET, P.ID_PET, V.FK_VACINACAO_MEDICO AS ID_MEDICO, V.STATUS, V2.NOME_VACINA, V2.DESCRICAO_VACINA, M.NOMECOMPLETO_USUARIO AS MEDICO, A.NOMECOMPLETO_USUARIO AS ACOMPANHANTE FROM VACINACAO V INNER JOIN PET P ON P.ID_PET = V.FK_VACINACAO_PET INNER JOIN USUARIO M ON V.FK_VACINACAO_MEDICO = M.ID_USUARIO INNER JOIN USUARIO_PET UP ON UP.FK_PET = P.ID_PET INNER JOIN USUARIO A ON A.ID_USUARIO = UP.FK_USUARIO INNER JOIN VACINA V2 ON V2.ID_VACINA = V.FK_VACINACAO_VACINA WHERE V.ID_VACINACAO = ? AND (M.ID_USUARIO = ? OR A.ID_USUARIO = ?);");

    $comando->execute([$vacinacao, $_SESSION['pk_usuario'], $_SESSION['pk_usuario']]);

    if ($comando->rowCount()==1)
    {
        $informacoes_vacinacao = $comando->fetch();
    }
    else {
        $informacoes_vacinacao = false;  
    }
    unset($comando);
    unset($pdo);
    return $informacoes_vacinacao;
}