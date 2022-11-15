<?php
include("conexao.php");

$comando = $pdo->prepare("SELECT ID_PRODUTO, NOME_PRODUTO, DESCRICAO_PRODUTO, FOTO_PRODUTO, PRECO_PRODUTO, QUANT_ESTOQUE, DISPONIVEL_VENDA FROM PRODUTO ORDER BY DISPONIVEL_VENDA DESC");
$comando->execute();

if ($comando->rowCount()>0)
{
    $resultado = $comando->fetchAll();
    if (!empty($resultado)){
        foreach($resultado as $item){
            if ($_SESSION['fk_tipousuario'] == 3 or ($_SESSION['fk_tipousuario'] == 1 and $item['DISPONIVEL_VENDA'] ==1))  {
                ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo $item["FOTO_PRODUTO"] ?>" style="max-height:250px; height:250px;   " class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="row mt-1">
                            <span class="col">
                                <h6 class="card-title"><strong><?php echo $item["NOME_PRODUTO"]; ?></strong></h6>
                            </span>
                        </span>
                        <span class="row mx-1 mt-3">
                            <span class="col-5 d-flex align-items-end justify-content-end p-0">
                                <h6 class="card-title">R$<?php echo $item["PRECO_PRODUTO"]; ?></h6>
                            </span>
                            <span class="col-7 p-0 text-end text-nowrap">
                            <?php   
                            if ($_SESSION['fk_tipousuario'] == 3) {        
                                ?>
                                <a href="atualizar_produto.php?produto=<?php echo $item["ID_PRODUTO"] ?>" class="ms-2 w-100 btn btn-<?php echo ($item['DISPONIVEL_VENDA'] ==1) ? 'primary' : 'secondary' ?>" >
                                    Editar
                                </a>
                            <?php 
                            } else if ($_SESSION['fk_tipousuario'] == 1) {
                            ?>
                                <a href="#" class="ms-2 w-100 btn btn-<?php echo ((int)$item['QUANT_ESTOQUE'] > 0) ? 'primary' : 'secondary' ?>">
                                    <?php echo ((int)$item['QUANT_ESTOQUE'] > 0) ? 'Comprar' : 'Indisponível' ?>
                                </a>
                            <?php
                            }
                            ?>
                            </span>
                        </span>
                        
                    </div>
                </div>
            </div>
            <?php
            }
            
            
        }
    }
}
unset($comando);
unset($pdo);
