<?php use Daw\models\PeticionAPI; ?>
<div class="container md-12 mt-5">
    <div class="text ml-5">
      <font color="#000000" size="20" face="Freestyle Script">Es hora de crear tus quootes!</font>
    </div>
    <div class="row">
            <div class="form-group col-md-10 mt-3">
                <textarea class="form-control input-sm " type="textarea" id="message" placeholder="Escribe aqui tu cita..." maxlength="900" rows="10"></textarea>
            </div>
            <div class="form-group col-md-6">
                <?php
                    $PeticionAPI = new PeticionAPI;
                    $response = $PeticionAPI->requestGet("Categoria","Categorias");
                ?>
                <select class="form-control" id="Selecciona tu categoria!">
                    <?php foreach($response as $value): ?>
                        <option value="<?=$value["id_clase"]?>"><?=$value["nom_clase"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <button class="form-control input-sm btn btn-success disabled" id="btnSubmit" name="btnSubmit" type="button" style="height:35px">PUBLICAR</button>
            </div>
    </div>
</div>
