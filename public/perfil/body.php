<div class="container target mt-5">
    <div class="row">
        <div class="col-3">
            <div class="row justify-content-md-center">
                <h1 class="m-2">Starfox221</h1>
            </div>
            <div class="row justify-content-md-center">
                <a href="/users" class="pull-right m-2">
                    <img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg">
                </a>
            </div>
            <div class="row">
                <ul class="list-group m-2 col-12">
                    <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">Día registro</strong>
                        </span> 2.13.2014</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">Nombre</strong>
                        </span>Alejandro</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">Apellido</strong>
                        </span>Artes</li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                            <strong class="">Rol</strong>
                        </span>Administrador
                    </li>
                </ul>
            </div>
            <br>
        </div>
        <div class="col-9">
            <div class="row">
                <ul class="column my-1">
                    <div class="row">
                        <h1>Escribe cosas sobre ti!</h1>
                        <div class="form-group col-md-10 mt-3">
                            <textarea class="form-control input-sm " type="textarea" id="message" placeholder="Escribe cosas sobre ti..." maxlength="300"
                                rows="10"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <button class="form-control input-sm btn btn-success disabled" id="btnSubmit" name="btnSubmit" type="button" style="height:35px">GUARDAR</button>
                        </div>
                    </div>
                </ul>
                </div>
        </div>

    </div>
    <h1 text align="center">Mis Favoritos</h1>

    <table id="example" class="display main-center" style="width:100%">
        <thead class="text-center">
        <th style="height: auto">NOMBRE</th>
        <th >CITA</th>
        <th >CATEGORÍA</th>
        <th >PUBLICADO</th>

        </thead>
        <tbody>
        <?php
        // aquí hay que configurar el foreach, este es el de otro proyecto
        $seleccion = $consulta->getUsuarios();
        foreach ($seleccion as $fila) {

            echo "<tr>"."<td style='height: auto'>"
                .$fila['nom_usuario']."</td>"."<td style='height: auto'>"
                .$fila['frase']."</td>"."<td style='height: auto'>"
                .$fila['nom_clase']."</td>"."<td style='height: auto'>"
                .$fila['fecha_publicacion']."</td>"."<td style='height: auto'>"
                ."</tr>";
        }

        ?>
        </tbody>
    </table>
</div>



