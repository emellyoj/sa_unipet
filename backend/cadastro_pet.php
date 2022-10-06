<?php
    include("conexao.php");

    $nome_pet = $_POST["nomepet"];
    $genero_pet = $_POST["generopet"];
    $raca_pet = $_POST["racapet"];

    $comando = $pdo -> prepare("INSERT INTO pet(nome_pet,genero_pet,raca_pet) VALUES(:nome_pet,:genero_pet,:raca_pet)");

    $comando->bindValue(":nome_pet",$nome_pet);                                     
    $comando->bindValue(":genero_pet",$genero_pet);  
    $comando->bindValue(":raca_pet",$raca_pet);                                     
 
    $comando->execute();                               

    header("Location:/sa_unipet/src/pages/agenda_pet.html");

?>