<div class="container">
	<div class="row main justify-content-md-center pt-3">
			<form class="col-sm-12 col-md-6">
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
					<label for="inlineFormInputGroup">Contraseña</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fa fa-lock fa" aria-hidden="true"></i></div>
						</div>
						<input type="password" name="contrasenya" id="contrasenya" class="form-control" id="inlineFormInputGroup" placeholder="Introduce tu contraseña">
					</div>
				</div>
				<div class="form-group">
					<input type="button" onclick="peticion()" class="btn btn-primary btn-lg btn-block login-button" value="Login" />
				</div>
				<div class="form-group">
					<a href="/registro" type="button" class="btn btn-primary btn-lg btn-block login-button">Registrate</a>
				</div>
			</form>
		</div>
</div>
