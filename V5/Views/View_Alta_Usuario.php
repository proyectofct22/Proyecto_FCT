<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.columnasAltaUsuario { float: left; width: 48%; }
</style>
<div class="container py-5">
	<div class="card border-light text-center px-5 py-5 my-5" style="background:rgba(0,0,0,0.8);">
		<h1 class="display-4 text-white fuentePersonalizada">Registro de usuarios</h1>
		<p class="lead text-white">Disfrute de todo el contenido del Gaming Room creando una cuenta con sus datos personales.</p>
		<form method="post" class="needs-validation" novalidate>
			<div class="columnasAltaUsuario pt-3" style="margin-right: 4%;">
				<div class="form-floating pb-4">
					<input type="text" class="form-control" name="nombre" pattern="^[A-Z][A-Za-z ]{0,14}[A-Za-z]$" placeholder="Nombre" autofocus required>
					<label class="form-label">Nombre</label>
					<div class="invalid-feedback">El nombre debe ser rellenado y empezar por una letra mayúscula.</div>
				</div>
				<div class="form-floating pb-4">
					<input type="text" class="form-control" name="apellidos" pattern="^[A-Z][A-Za-z -]{1,28}$" placeholder="Apellidos" required>
					<label class="form-label">Apellidos</label>
					<div class="invalid-feedback">Los apellidos deben ser rellenados y empezar con mayúsculas.</div>
				</div>
				<div class="form-floating pb-4">
					<input type="text" class="form-control" name="usuario" pattern="^([A-Za-z])([A-Za-z0-9-._]){2,12}$" placeholder="Usuario" required>
					<label class="form-label">Usuario</label>
					<div class="invalid-feedback">El usuario debe ser rellenado, único y tener entre 2 y 20 carácteres.</div>
				</div>
			</div>
			<div class="columnasAltaUsuario pt-3">
				<div class="form-floating pb-4">
					<input type="email" class="form-control" name="email"pattern="^[a-z][0-9a-z-._]+[a-z0-9]@((gmail)|(hotmail)|(educa.madrid))\.((com)|(es)|(org))$" placeholder="Email" required>
					<label class="form-label">Email</label>
					<div class="invalid-feedback">El email debe ser rellenado y ser gmail, hotmail o educamadrid.</div>
				</div>
				<div class="form-floating pb-4">
					<input type="text" class="form-control" name="ciclo" pattern="^[A-Z0-9-]{2,10}$" placeholder="Ciclo" required>
					<label class="form-label">Ciclo</label>
					<div class="invalid-feedback">El ciclo debe ser rellenado y tener el siguiente formato: 1-CICLO-TURNO.</div>
				</div>
				<div class="form-floating pb-4">
					<input type="password" class="form-control" name="password" pattern="^[A-Za-z0-9.\-\$]{8,16}$" placeholder="Contraseña" required>
					<label class="form-label">Contraseña</label>
					<div class="invalid-feedback">La contraseña debe ser rellenada y tener entre 8 y 16 carácteres.</div>
				</div>
			</div>
			<button type="submit" class="w-50 btn btn-outline-light btn-lg">Registrarse</button>
		</form>
		<h5 class="text-white pt-4">¿Ya tiene cuenta?&nbsp;<a style="color: #41a5ee;" href="../Controllers/Controller_Login.php" style="width: 150px;">Inicie sesión</a></h5>
	</div>
</div>
<script type="text/javascript">
	(function () {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
		.forEach(function (form) {
			form.addEventListener('submit', function (event) {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')
			}, false)
		})
	})()
</script>
