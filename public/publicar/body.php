<?php use Daw\models\PeticionAPI; ?>
<div class="container">
    <div class="row justify-content-md-center">
        <form action="" method="post" class="col-sm-8" onsubmit="return false">
            <input type="hidden" name="id_usuario" value="<?=isset($_SESSION['user_data']['id_usuario']) ? $_SESSION['user_data']['id_usuario'] : '' ?>">
            <input type="hidden" id="id_usuario" name="id_usuario" value="1">
            <div class="form-group col-md-12 mt-3">
                <textarea class="form-control input-sm-12" type="textarea" name="frase" id="frase" placeholder="Escribe aqui tu cita..." maxlength="900" rows="10"></textarea>
            </div>
            <div class="form-group col-md-6">
                <?php
                    $PeticionAPI = new PeticionAPI;
                    $response = $PeticionAPI->requestGet("Categoria","Categorias");
                ?>
                <select class="form-control" id="id_categoria">
                    <?php foreach($response as $value): ?>
                        <option value="<?=$value["id_clase"]?>"><?=$value["nom_clase"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <button type="button" id="btnSubmit" name="btnSubmit" onclick="peticion()" class="form-control input-sm btn btn-success disabled" style="height:35px">PUBLICAR</button>
            </div>
        </form>
    </div>
</div>
