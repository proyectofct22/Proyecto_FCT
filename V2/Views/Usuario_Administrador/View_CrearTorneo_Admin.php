<div class="container" align="">
	<div class="card-body" style="padding-top: 50px;max-width: 40rem;">
		<div class="row g-5">
			<div class="col-md-7 col-lg-8">
				<h4 class="fw-normal fs-4 fw-bolder">Crear Torneo</h4>
				<form action="POST">
					<div class="row g-3">
						<div class="col-sm-6">
							<label for="NombreTorneo" class="form-label text-lg-center fw-normal fs-5">Nombre del Torneo</label>
							<input type="text" class="form-control" id="NombreTorneo" name="NombreTorneo" placeholder="" value="" required>
						</div>

						<div class="col-sm-6">
							<label for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Juego del Torneo</label>
							<input type="text" class="form-control" id="JuegoTorneo" name="JuegoTorneo" placeholder="" value="" required>
						</div>
						<hr class="my-4">
						<button class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;" type="submit">Crear Torneo</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>


<br>

<div align="center">
<table class="table" style="max-width: 50%;">
	<thead align="center">
		<tr >
			<th scope="col">#</th>
			<th scope="col" style="max-width: 25%;">Nombre del Torneo</th>
			<th scope="col">Juego</th>
			<th scope="col">Equipo Ganador</th>
			<th scope="col">Estado</th>
			<th scope="col">Acciones</th>
			
		</tr>
	</thead>
	<tbody align="center">
		<tr>
			<th scope="row">1</th>
			<td style="max-width: 25%;">GamesLol</td>
			<td>Lol</td>
			<td>KOI</td>
			<td>Finalizado</td>
			<td>       
					<!-- 		<a href='#'><i class='fa-regular fa-trash-can'></i></a>&nbsp;&nbsp; -->
				<a href='#'><i class='fa-solid fa-eye'></i></a>
			</td>

		</tr>
		<tr>
			<th scope="row">2</th>
			<td>ValorantCup</td>
			<td>Valorant</td>
			<td></td>
			<td>Activo</td>
			<td>       
					<!-- 		<a href='#'><i class='fa-regular fa-trash-can'></i></a>&nbsp;&nbsp; -->
				<a href='#'><i class='fa-solid fa-eye'></i></a>
			</td>


		</tr>
		<tr>
			<th scope="row">2</th>
			<td>LoLCup</td>
			<td>Lol</td>
			<td></td>
			<td>Activo</td>
			<td>       
					<!-- 		<a href='#'><i class='fa-regular fa-trash-can'></i></a>&nbsp;&nbsp; -->
				<a href='#'><i class='fa-solid fa-eye'></i></a>
			</td>

		</tr>
	</tbody>
</table>
</div>
<br>
<br>