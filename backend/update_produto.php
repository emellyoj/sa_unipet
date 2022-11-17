<?php

include("conexao.php");
if($_FILES['imagem']['name'] != ""){
    $imagem = $_FILES['imagem'];
    $extensao = $imagem['type'];
    $conteudo = file_get_contents($imagem['tmp_name']);
    $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);
   
    $comando = $pdo->prepare("UPDATE PRODUTO SET NOME_PRODUTO=:nome_produto, DESCRICAO_PRODUTO=:descricao_produto, FOTO_PRODUTO=:foto_produto, PRECO_PRODUTO=:preco_produto, DISPONIVEL_VENDA=:disponivel_venda WHERE ID_PRODUTO=:id_produto");
   
    $comando->bindValue(':foto_produto',$base64);
}
else {
    
    $comando = $pdo->prepare("UPDATE PRODUTO SET NOME_PRODUTO=:nome_produto, DESCRICAO_PRODUTO=:descricao_produto, PRECO_PRODUTO=:preco_produto, DISPONIVEL_VENDA=:disponivel_venda WHERE ID_PRODUTO=:id_produto");
}


$comando->bindValue(':nome_produto', $_POST['nome']);
$comando->bindValue(':descricao_produto', $_POST['descricao_produto']);
$comando->bindValue(':preco_produto', $_POST['preco']);

if (isset($_POST['disponivel'])){
    $comando->bindValue(':disponivel_venda', $_POST['disponivel']);
}
else {
    $comando->bindValue(':disponivel_venda', 0);
}

$comando->bindValue(':id_produto', $_GET['produto']);

$comando->execute();

unset($comando);
unset($pdo);

header('location:/sa_unipet/src/pages/pet_shop.php');