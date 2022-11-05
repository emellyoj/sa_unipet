<?php
/*
SELECT * FROM HORARIO
WHERE ID_HORARIO NOT IN (
    SELECT HORA_CONSULTA FROM CONSULTA
    INNER JOIN USUARIO
    ON CONSULTA.FK_CONSULTA_MEDICO = USUARIO.ID_USUARIO
    AND USUARIO.ID_USUARIO = 1
    AND DATA_CONSULTA = '2022-11-03'
);
*/
function runHorariosPorMedico($medico, $dataconsulta) {
    include("conexao.php");
                                    // Formatação de horario 09:00:00 -> 9:00
    $comando = $pdo->prepare("SELECT TRIM(LEADING '0' FROM DATE_FORMAT(ID_HORARIO, '%H:%i')) AS ID_HORARIO FROM HORARIO WHERE ID_HORARIO NOT IN (SELECT HORA_CONSULTA FROM CONSULTA INNER JOIN USUARIO ON CONSULTA.FK_CONSULTA_MEDICO = USUARIO.ID_USUARIO AND USUARIO.ID_USUARIO = ? AND DATA_CONSULTA = ?);");
    $comando->execute([(int)$medico, $dataconsulta]);
    
    if ($comando->rowCount()>0){
        $horarios_do_medico = $comando->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        $horarios_do_medico = false;
    }

    unset($comando);
    unset($pdo);

    return $horarios_do_medico;
}