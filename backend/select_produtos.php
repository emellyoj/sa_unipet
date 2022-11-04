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
                    <img src="<?php echo $item["foto_produto"] ?>" style="max-height:200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="row mt-1">
                            <span class="col">
                                <h6 class="card-title"><strong><?php echo $item["nome_produto"]; ?></strong></h6>
                            </span>
                        </span>
                        <span class="row mx-1 mt-3">
                            <span class="col-5 d-flex align-items-end justify-content-end p-0">
                                <h6 class="card-title">R$<?php echo $item["preco_produto"]; ?></h6>
                            </span>
                            <span class="col-7 p-0 text-end">
                                <a href="#" class="ms-2 w-100 btn btn-<?php echo ((int)$item['quant_estoque'] > 0) ? 'primary' : 'secondary' ?>">
                                    <?php echo ((int)$item['quant_estoque'] > 0) ? 'Comprar' : 'Sem estoque' ?>
                                </a>
                            </span>
                        </span>
                        
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
unset($comando);
unset($pdo);
