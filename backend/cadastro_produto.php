<?php
    include("conexao.php");

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao_produto = $_POST["descricao_produto"];
    $quant_estoque = $_POST["quant_estoque"];
    if (isset($_POST["disponivel"])) {
        $disponivel = $_POST["disponivel"];
    } else {
        $disponivel=0;
    }    
    if($_FILES['imagem']['name'] != ""){
        $imagem = $_FILES['imagem'];
        $extensao = $imagem['type'];
        $conteudo = file_get_contents($imagem['tmp_name']);
        $base64 = "data:".$extensao.";base64,".base64_encode($conteudo);
    }
    else {
        $base64 = '../img/imagem.jpg';
    }
    
    

    $comando = $pdo -> prepare("INSERT INTO produto(nome_produto,preco_produto,descricao_produto,quant_estoque, disponivel_venda, foto_produto) VALUES(:nome_produto,:preco_produto,:descricao_produto,:quant_estoque,:disponivel,:foto)");

    $comando->bindValue(":nome_produto",$nome);                                     
    $comando->bindValue(":preco_produto",(float)$preco);  
    $comando->bindValue(":descricao_produto",$descricao_produto); 
    $comando->bindValue(":quant_estoque",(int)$quant_estoque);   
    $comando->bindValue(":disponivel",(int)$disponivel);                                    
    $comando->bindValue(":foto",$base64);

    $comando->execute();                               

    header("Location:/sa_unipet/src/pages/cadastro_produto.php");

?>