<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT id_produto, nome_produto, descricao_produto, foto_produto, preco_produto, quant_estoque, disponivel_venda FROM produto  WHERE disponivel_venda = 1");
$comando->execute();

if ($comando->rowCount()>0)
{
    $resultado = $comando->fetchAll();
    if (!empty($resultado)){
        foreach($resultado as $item){
            ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo $item["foto_produto"] ?>" style="height:200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="row">
                            <span class="col">
                                <h6 class="card-title"><?php echo $item["nome_produto"]; ?></h6>
                            </span>
                            <span class="col-4 text-end">
                                <h6 class="card-title"><?php echo $item["preco_produto"]; ?></h6>
                            </span>
                        </span>
                        <a href="#" class="btn btn-<?php echo ((int)$item['quant_estoque'] > 0) ? 'primary' : 'secondary' ?>">
                            <?php echo ((int)$item['quant_estoque'] > 0) ? 'Comprar' : 'Sem estoque' ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
unset($comando);
unset($pdo);
