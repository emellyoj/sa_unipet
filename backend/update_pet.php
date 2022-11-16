<?php
include("conexao.php");


if($_FILES['imagem']['name'] != ""){
    $imagem = $_FILES['imagem'];
    $extensao = $imagem['type'];
    $conteudo = file_get_contents($imagem['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);
    $comando = $pdo->prepare("UPDATE PET SET NOME_PET=:nome_pet, GENERO_PET=:genero_pet, RACA_PET=:raca_pet, FOTO_PET=:foto_pet WHERE ID_PET=:id_pet");
    $comando->bindValue(':foto_pet',$base64);
}
else{
    $comando = $pdo->prepare("UPDATE PET SET NOME_PET=:nome_pet, GENERO_PET=:genero_pet, RACA_PET=:raca_pet  WHERE ID_PET=:id_pet");

}

$comando->bindValue(':nome_pet', $_POST['nomepet']);
$comando->bindValue(':genero_pet', $_POST['generopet']);
$comando->bindValue(':raca_pet', $_POST['racapet']);
$comando->bindValue(':id_pet', $_GET['id_pet']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/perfil_usuario.php');