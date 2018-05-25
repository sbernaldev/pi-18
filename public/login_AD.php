<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/registro.css">
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>LOGIN</title>
	</head>
	<body>
		<div align="center">
			<img src="images/logo.png"/>
		</div>
		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
					<form class="" method="post" action="conexion_AD.php">
					<div class="form-group">
                            <h1 class="display-4">Active directory</h1>
							<label for="name" class="cols-sm-2 control-label">Nombre de usuario</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="nom_usuario" id="nom_usuario"  placeholder="Introduce un nombre de usuario  de active directory"/>
								</div>
							</div>
                        </div>
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Contraseña</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Introduce tu contraseña"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" id="button" value="Login" class="btn btn-primary btn-lg btn-block login-button"></input>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
