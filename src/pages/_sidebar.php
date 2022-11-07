<?php 
function mainSideBar($active) {
    session_start();
?>
    <div class="col-3 h-100 bg-secondary p-4 pb-2 d-flex flex-column" style="height: 100vh">
        <h1 class="h1 text-light" style="user-select: none" >UniPet</h1>
        <hr class="hr text-light">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pet_shop')     ?  'active' : 'menu_option'; ?>" style="border:none" value="Pet Shop" onclick="window.location='pet_shop.php'"/></div>
        <?php 
        if ($_SESSION['fk_tipousuario'] == 1) {
            ?>
            <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'agenda_pet')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Agenda"   onclick="window.location='agenda_pet.php'"/></div>
            <?php
        }
        else if ($_SESSION['fk_tipousuario'] == 2) {
            ?> 
            <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'agenda_med')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Atendimentos"   onclick="window.location='agenda_medico.php'"/></div>
            <?php
        }
        ?>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'meus_pets')    ?  'active' : 'menu_option'; ?>" style="border:none" value="Meus Pets" onclick="window.location='meus_pets.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'vacinas')      ?  'active' : 'menu_option'; ?>" style="border:none" value="Vacinas" onclick="window.location='vacinas.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'meu_perfil')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Meu Perfil" onclick="window.location='perfil_usuario.php'"/></div>
        <div class="mt-auto">
            <hr class="hr text-light mb-0">
            <input type="button" class="btn btn-outline-light w-100 mt-2 text-start" style="border:none;" value="Logout" onclick="window.location='../../backend/logout.php'"/>
        </div>    
    </div>
<?php
}

function petshopSideBar($active) {
    session_start();
?>
    <div class="col-3 h-100 bg-secondary p-4 pb-2 d-flex flex-column" style="height: 100vh">
        <h1 class="h1 text-light">UniPet</h1>
        <hr class="hr text-light">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start menu_option                                                         " style="border:none" value="Voltar" onclick="window.location='agenda_pet.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pet_shop')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Loja"     onclick="window.location='pet_shop.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'carrinho')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Carrinho" onclick="window.location='carrinho.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pedidos')    ?  'active' : 'menu_option'; ?>" style="border:none" value="Pedidos"  onclick="window.location='pedidos.php'"/></div>
        
    <?php
    if ($active == 'pet_shop' and $_SESSION['fk_tipousuario'] == 3) {        
        ?>
        <hr class="hr text-light mb-0">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'cadastro_produto') ?  'active' : 'menu_option';?>" style="border:none" value="Cadastrar Produto" onclick="window.location='cadastro_produto.php'"/></div>
        
        
    <?php
    }
    ?>
        <div class="mt-auto">
            <hr class="hr text-light mb-0">
            <input type="button" class="btn btn-outline-light w-100 mt-2 text-start" style="border:none;" value="Logout" onclick="window.location='../../backend/logout.php'"/>
        </div>
    </div>
    <?php
}

