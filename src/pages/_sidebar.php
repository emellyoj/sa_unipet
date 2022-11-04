<?php 
function mainSideBar($active) {
?>
    <div class="col-3 h-100 bg-secondary p-4" style="height: 100vh">
        <h1 class="h1 text-light">UniPet</h1>
        <hr class="hr text-light">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pet_shop')     ?  'active' : 'menu_option'; ?>" style="border:none" value="Pet Shop" onclick="window.location='pet_shop.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'agenda')       ?  'active' : 'menu_option'; ?>" style="border:none" value="Agenda"   onclick="window.location='agenda_pet.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'meus_pets')    ?  'active' : 'menu_option'; ?>" style="border:none" value="Meus Pets" onclick="window.location='meus_pets.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'vacinas')      ?  'active' : 'menu_option'; ?>" style="border:none" value="Vacinas" onclick="window.location='vacinas.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'meu_perfil')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Meu Perfil" onclick="window.location='perfil_usuario.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start" style="border:none;" value="Sair" onclick="window.location='../../backend/logout.php'"/></div>
    </div>
<?php
}

function petshopSideBar($active, $isadmin) {
?>
    <div class="col-3 h-100 bg-secondary p-4" style="height: 100vh">
        <h1 class="h1 text-light">UniPet</h1>
        <hr class="hr text-light">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start menu_option                                                         " style="border:none" value="Voltar" onclick="window.location='agenda_pet.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pet_shop')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Loja"     onclick="window.location='pet_shop.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'carrinho')   ?  'active' : 'menu_option'; ?>" style="border:none" value="Carrinho" onclick="window.location='carrinho.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'pedidos')    ?  'active' : 'menu_option'; ?>" style="border:none" value="Pedidos"  onclick="window.location='pedidos.php'"/></div>
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start" style="border:none;" value="Sair" onclick="window.location='../../backend/logout.php'"/></div>
        <?php
    if ($isadmin) {        
        ?>
        <hr class="hr text-light">
        <div><input type="button" class="btn btn-outline-light w-100 mt-2 text-start <?php echo ($active == 'cadastro_produto') ?  'active' : 'menu_option';?>" style="border:none" value="Cadastrar Produto" onclick="window.location='cadastro_produto.php'"/></div>
        
        
        <?php
}
    ?>
    </div>
    <?php
}

