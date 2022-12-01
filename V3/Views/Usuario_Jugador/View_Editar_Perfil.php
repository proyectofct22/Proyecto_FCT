<div class="container" align="center">
	<div class="px-4 pt-5 my-5 text-center">
		<header>
			<h1 class="display-5 fw-bold pt-5">Editar perfil</h1>
		</header>
		<div class="card-body">
			<br>
			<form method="POST" action="../Usuario_Jugador/Controller_Editar_Perfil.php" enctype="multipart/form-data">
				<label class="btn btn-outline-warning" style="width:200px;">Adjuntar archivo
					<input type="file" name="uploadedFile" hidden>
				</label>
				<input type="submit" name="uploadBtn" value="Upload" class="btn btn-outline-success"/>
			</form>
		</div>
	</div>
</div>
