<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Daw\models\Sesion;

Sesion::start();

?>
<div class="container target mt-5">
        <div class="col-sm">
            <div class="row">
                <div class="col-3">
                    <div class="row justify-content-md-center">
                        <h1 class="m-2"><?php echo $_SESSION["user_data"]['nom_usuario']; ?></h1>
                    </div>
                        <div class="row justify-content-md-center">
                            <a href="/users" class="pull-right m-2">
                            <img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg"></a>
                        </div>
                    <div class="row">
                        <ul class="list-group m-2 col-12">
                            <li class="list-group-item text-muted" contenteditable="false">Perfil</li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong class="">Día registro</strong>
                                </span><?php echo $_SESSION["user_data"]['fech_registro']; ?></li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong class="">Nombre</strong>
                                </span><?php echo $_SESSION["user_data"]['nombre']; ?></li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong class="">Apellido</strong>
                                </span><?php echo $_SESSION["user_data"]['apellido']; ?></li>
                            <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong class="">Rol</strong>
                                </span><?php echo $_SESSION["user_data"]['id_rol']; ?></li>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm">
                    <h1> Mis Favoritos</h1>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Frase</th>
                            <th scope="col">Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Marianico</th>
                            <td>It’s very difficult todo esto.</td>
                            <td>2018-05-18</td>
                        </tr>
                        <tr>
                            <th scope="row">Casanova</th>
                            <td>No hay nada que un hombre no sea capaz de hacer cuando una mujer le mira.</td>
                            <td>2018-05-16</td>
                        </tr>
                        <tr>
                            <th scope="row">Marilyn</th>
                            <td>Vivir sola es como estar en una fiesta donde nadie te hace caso.</td>
                            <td>2018-05-14</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     </div>






