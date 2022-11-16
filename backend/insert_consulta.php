<?php
    include("conexao.php");

    $data = $_POST["dataconsulta"];
    $hora = $_POST["horaconsulta"];
    $pet = $_POST["pet"];
    $medico = $_POST["medico"];

    $comando = $pdo -> prepare("INSERT INTO CONSULTA(DATA_CONSULTA,HORA_CONSULTA,FK_CONSULTA_PET,FK_CONSULTA_MEDICO) VALUES(:data_consulta,:hora_consulta,:fk_consulta_pet,:fk_consulta_medico)");

    $comando->bindValue(":data_consulta",$data);                                     
    $comando->bindValue(":hora_consulta",$hora);                                     
    $comando->bindValue(":fk_consulta_pet",$pet);                                     
    $comando->bindValue(":fk_consulta_medico",$medico);                                     

    try {
        $comando->execute();                               
    
        header("Location:/sa_unipet/src/pages/agenda_pet.php");
    } catch (\Throwable $th) {
        header("Location:/sa_unipet/src/pages/agendamento_consulta.php?pet=".$pet."&medico=".$medico."&dataconsulta=".$data);
    }

?>