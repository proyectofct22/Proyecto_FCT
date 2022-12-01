<div class="container" align="center">
	<div class="card-body">
		<div class="row flex-lg-row-reverse align-items-center g-3 py-4">
			<h1 class="fw-normal fs-3 text-lg-center fw-bolder">Gestion de Equipos</h1>
		</div>
	</div>
</div>

<br>

<div class="row g-2 col-md g-2" align="center">
	
	<div class="col">
		<div class="container">
			<div style="max-width: 20rem;">
				<form action="POST">
					<div class="row g-2 col-md g-2" style="max-width: 20rem;">
						<div class="row">
							<h1 class="fw-normal fs-4 fw-bolder" align="center">Crear Equipo</h1>
							<h4 style="max-width: 40rem;"class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
							<input type="text" class="form-control" style="max-width: 40rem;" id="NombreTorneo" name="NombreTorneo" placeholder="" value="">
						</div> 
						<div align="center">
						</div> 
						<div class="row">
							<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Selecciona Torneo</h4>
							<select class="form-select" aria-label="Jugadores">
								<option align="center" selected></option>
								<option align="center" value="1">ValorantCup</option>
								<option align="center" value="2">LoLCup</option>
							</select>
						</div>
						<br>
						<div align="center">
							<button class="btn btn-primary" style="width: 50%;" type="submit">Crear Equipo</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<br>

	<div class="col">
		<div class="container">
			<div style="max-width: 20rem;">
				<form action="POST">
					<div class="row g-2 col-md g-2" style="max-width: 20rem;">
						<div class="row" align="center">
							<h1 class="fw-normal fs-4 fw-bolder" align="center">Asignar Jugadores</h1>
							<h4 style="max-width: 40rem;"class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
							<select class="form-select" aria-label="Equipos">
								<option align="center" selected></option>
								<option align="center" value="1">Koi</option>
								<option align="center" value="2">Psg</option>
								<option align="center" value="3">Kru</option>
							</select>
						</div> 
						<div align="center">
						</div> 
						<div class="row" align="center">
							<h4 style="max-width: 40rem;"class="fw-normal fs-5 text-lg-center">Asignar Jugadores</h4>
							<select class="form-select" aria-label="Equipos">
								<option align="center" selected></option>
								<option align="center" value="1">Pablo</option>
								<option align="center" value="2">Luis</option>
								<option align="center" value="3">Aarón</option>
							</select>
						</div> 
						<div align="center">
							<button class="btn btn-primary" style="width: 50%;" type="submit">Asignar Jugadores</button>
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>

	<br>
</div>


<br>

<div class="row g-3 col-md g-2" align="center">
	<div class="col">
		<div class="container">
			<div style="max-width: 20rem;">
				<form action="POST">
					<div align="center">
						<h4 align="center">Mostrar datos del Equipo</h4>
						<select class="form-select" aria-label="Equipo">
							<option align="center" selected>---------</option>
							<option align="center" value="1">Koi</option>
							<option align="center" value="2">Psg</option>
							<option align="center" value="3">Kru</option>
						</select>
					</div>	
				</form>
			</div>
		</div>
	</div>

	<br>
	<br>

	<div class="row-3">
		<div align="center">
			<h4 align="center">Koi</h4>
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
	</div>
</div>
