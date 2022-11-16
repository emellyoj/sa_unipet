<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE VACINACAO SET DATA_VACINACAO=:data_vacinacao, HORA_VACINACAO=:hora_vacinacao WHERE ID_VACINACAO=:id_vacinacao");

$comando->bindValue(':data_vacinacao', $_POST['datavacinacao']);
$comando->bindValue(':hora_vacinacao', $_POST['horariovacinacao']);
$comando->bindValue(':id_vacinacao', $_GET['id_vacinacao']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/agenda_pet.php');