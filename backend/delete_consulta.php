<?php
include("conexao.php");

$comando = $pdo->prepare("DELETE FROM CONSULTA WHERE ID_CONSULTA=:id_consulta");

$comando->bindValue(':id_consulta', $_GET['id_consulta']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/agenda_pet.php');