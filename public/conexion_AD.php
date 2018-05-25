<?php

require_once __DIR__ . '/../vendor/autoload.php';

$adServer = "ldap://10.2.72.95";

$ldap = ldap_connect($adServer);
$username = $_POST['nom_usuario'];
$password = $_POST['password'];

$ldaprdn = 'JAVIMERINO' . "\\" . $username;
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
$bind = @ldap_bind($ldap, $ldaprdn, $password);


if (empty($username) OR empty($password)) {
    header("Location: /login_AD.php ");

}
if ($bind) {
    $msg = "Estás logueado como correctamente como $username";
} else {
    $msg = "Usuario o contraseña incorrectos";
    header("Location: /login_AD.php");
}


?>

<link href="css/activeDirectory.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<header>
    <div class="container bg-info p-5 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.html">Home <span
                                class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Features</a>
                </div>
            </div>
        </nav>
    </div>
</header>
<!---->
<main>
    <div class="container my-5">
        <div class="card-body text-center">
            <h4 class="card-title"><?php echo $msg ?></h4>
            <p class="card-text">Bienvenido <?php echo $username; ?></p>
        </div>
        <div class="card">
            <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal"
                    data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> Add a new List
            </button>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">List Name</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Edit List</th>
                    <th scope="col">list info</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> delete</a>
                    </td>
                    <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Details</a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> delete</a>
                    </td>
                    <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Details</a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> edit</a>
                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> delete</a>
                    </td>
                    <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Details</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- Large modal -->


        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card-body text-center">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class=" card col-8 offset-2 my-2 p-3">
                        <form>
                            <div class="form-group">
                                <label for="listname">List name</label>
                                <input type="text" class="form-control" name="listname" id="listname"
                                       placeholder="Enter your listname">
                            </div>
                            <div class="form-group">
                                <label for="datepicker">Deadline</label>
                                <input type="text" class="form-control" name="datepicker" id="datepicker"
                                       placeholder="Pick up a date">
                            </div>
                            <div class="form-group">
                                <label for="datepicker">Add a list item</label>
                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="Add an item"
                                           aria-label="Search for...">
                                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!---->

<!---->

</body>
