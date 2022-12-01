<div class="container" align="center">
	<div>
		<div class="card-body">
			<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
				<h1>Crear Equipos</h1>
			</div>
		</div>
	</div>
</div>

<div class="container" align="">
	<div class="card-body" style="max-width: 40rem;">
		<div class="row g-5">
			<div class="col-md-7 col-lg-8">
				<h4 class="mb-3">Formulario</h4>
				<form action="POST">
					<div class="row g-3">
						<div class="col-sm-6" align="center">
							<label for="NombreTorneo" class="form-label">Nombre del Equipo</label>
							<input type="text" class="form-control" id="NombreTorneo" name="NombreTorneo" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-sm-6" align="center">
						</div>
						<div class="col-sm-6" align="center">
							<label for="JuegoTorneo" class="form-label">Juego del Torneo</label>
							<input type="text" class="form-control" id="JuegoTorneo" name="JuegoTorneo" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<hr class="my-4">
						<button class="w-10 btn btn-primary" style="width: 50%;" type="submit">Crear Equipo</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

<br>
<br>

<div class="container" align="left">
	<div class="card-body" style="max-width: 20rem;">
		<h3 align="center">Equipos para Asignar</h3>
		<br>
		<select class="form-select" aria-label="Equipos">
			<option align="center" selected>Equipos</option>
			<option align="center" value="1">Koi</option>
			<option align="center" value="2">Psg</option>
			<option align="center" value="3">Kru</option>
		</select>
	</div>
</div>

<br>
<br>

<div class="container" align="left">
	<div class="card-body" style="max-width: 20rem;">
		<h3 align="center">Jugadores para Asignar</h3>
		<br>
		<select class="form-select" aria-label="Jugadores">
			<option align="center" selected>Jugadores</option>
			<option align="center" value="1">Pablo</option>
			<option align="center" value="2">Luis</option>
			<option align="center" value="3">Aarón</option>
		</select>
	</div>
</div>


<br>
<br>


	<div class="container" align="left">
		<div class="card-body" style="max-width: 20rem;">
			<h3 align="center" style="width: 322px;">Mostrar datos del Equipo</h3>
			<br>
			<select class="form-select" aria-label="Jugadores">
				<option align="center" selected>Equipos</option>
				<option align="center" value="1">Koi</option>
				<option align="center" value="2">Psg</option>
				<option align="center" value="3">Kru</option>
			</select>
		</div>
	</div>
</div>

<br>
<br>

<div align="center">
	<h4>Koi</h4>
	<table class="table" style="max-width: 50%;">
		<thead align="center">
			<tr >
				<th scope="col">#</th>
				<th scope="col" style="max-width: 25%;">Componente del Equipo</th>
				<th scope="col">Juego</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody align="center">
			<tr>
				<th scope="row">1</th>
				<td style="max-width: 25%;">Pablo</td>
				<td>LOL</td>
				<td><a href='#'><i class='fa-regular fa-trash-can'></i></a></td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Luis</td>
				<td>LOL</td>
				<td><a href='#'><i class='fa-regular fa-trash-can'></i></a></td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Aarón</td>
				<td>LOL</td>
				<td><a href='#'><i class='fa-regular fa-trash-can'></i></a></td>
			</tr>
		</tbody>
	</table>
</div>
<!-- <a href='#'><i class='fa-regular fa-trash-can'></i></a>&nbsp;&nbsp;
<a href='#'><i class='fa-solid fa-eye'></i></a> -->