<?php
    include("conexao.php");
    
    
    $data = $_POST["datavacina"];
    $hora = $_POST["horavacina"];
    $pet = $_POST["pet"];
    $medico = $_POST["medico"];
    $vacina = $_POST["vacina"];

    $comando = $pdo -> prepare("INSERT INTO VACINACAO(DATA_VACINACAO,HORA_VACINACAO,FK_VACINACAO_PET,FK_VACINACAO_MEDICO,FK_VACINACAO_VACINA) VALUES(:data_vacina,:hora_vacina,:fk_vacinacao_pet,:fk_vacinacao_medico,:fk_vacinacao_vacina);");

    $comando->bindValue(":data_vacina",(string)$data);                                     
    $comando->bindValue(":hora_vacina",(string)$hora);                                     
    $comando->bindValue(":fk_vacinacao_pet",(int)$pet);                                     
    $comando->bindValue(":fk_vacinacao_medico",(int)$medico);                                     
    $comando->bindValue(":fk_vacinacao_vacina",(int)$vacina);                                     

    try {
        $comando->execute();                               

        header("Location:/sa_unipet/src/pages/agenda_medico.php");
    } catch (\Throwable $th) {
        header("Location:/sa_unipet/src/pages/agendamento_vacina.php?pet=".$pet."&medico=".$medico."&datavacina=".$data."&vacina=".$vacina);
    }

?>