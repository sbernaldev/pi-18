<div class="container">
	<div class="row main justify-content-md-center pt-3">
			<form class="col-sm-12 col-md-6" method="post" action="/" onsubmit="return peticion();">
				<div class="form-group">
					<label for="inlineFormInputGroup">Nombre de usuario</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-user fa" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="nom_usuario" id="nom_usuario" class="form-control" id="inlineFormInputGroup" placeholder="Nombre de usuario">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Nombre</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-user fa" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="nombre" id="nombre" class="form-control" id="inlineFormInputGroup" placeholder="Nombre">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Apellido</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-user fa" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="apellido" id="apellido" class="form-control" id="inlineFormInputGroup" placeholder="Apellido">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Correo</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-envelope fa" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="correo" id="correo" class="form-control" id="inlineFormInputGroup" placeholder="Correo">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Correo</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-envelope fa" aria-hidden="true"></i></div>
						</div>
						<input type="text" name="correoConfirmacion" id="correoConfirmacion" class="form-control" id="inlineFormInputGroup" placeholder="Repite tu correo">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Contraseña</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock fa" aria-hidden="true"></i></div>
						</div>
						<input type="password" name="contrasenya" id="contrasenya" class="form-control" id="inlineFormInputGroup" placeholder="Introduce tu contraseña">
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Repite tu contraseña</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock fa" aria-hidden="true"></i></div>
						</div>
						<input type="password" name="repiteContrasenya" id="repiteContrasenya" class="form-control" id="inlineFormInputGroup" placeholder="Repite tu contraseña">
					</div>
				</div>
				<div class="form-group">
					<input type="button" onclick="peticion();" class="btn btn-primary btn-lg btn-block login-button" value="Registrate" />
				</div>
				<div class="form-group">
					<a href="login.php" target="_self" type="button" class="btn btn-primary btn-lg btn-block login-button">Login</a>
				</div>
				<div class="form-group">
					<a href="index.php" target="_self" type="button" class="btn btn-primary btn-lg btn-block login-button">Entra como invitado!</a>
				</div>
			</form>
		</div>
</div>
