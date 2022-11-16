<?php
include("conexao.php");

$comando = $pdo->prepare("UPDATE PET SET NOME_PET=:nome_pet, GENERO_PET=:genero_pet, RACA_PET=:raca_pet WHERE ID_PET=:id_pet");


$comando->bindValue(':nome_pet', $_POST['nomepet']);
$comando->bindValue(':genero_pet', $_POST['generopet']);
$comando->bindValue(':raca_pet', $_POST['racapet']);
$comando->bindValue(':id_pet', $_GET['id_pet']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/perfil_usuario.php');