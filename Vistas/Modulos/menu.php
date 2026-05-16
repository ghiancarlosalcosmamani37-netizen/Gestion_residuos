<div>
	<?php if ($rutasC->sesionIniciadaC()) : ?>
	<?php else : ?>

		<head>
			<meta charset="UTF-8">
			<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
		</head>

		<body>
			<div class="sidebar close">
				<div class="logo-details">
					<i class='bx bxl-c-plus-plus'></i>
					<span class="logo_name">UNAJMA</span>
				</div>
				<ul class="nav-links">
					<?php
					$conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');

					// Check if the user is logged in and fetch their data if available
					if (isset($_SESSION['username'])) {
						$username = $_SESSION['username'];

						// Query to fetch user's TipoUS based on their username
						$query = "SELECT TipoUS FROM usuario WHERE username = '$username'";
						$result = mysqli_query($conn, $query);

						// Check if the query was successful and fetch the TipoUS
						if ($result && mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$email = $row['TipoUS'];
							if ($email == 1) {
					?>

								<li>
									<div class="iocn-link">
										<a href="index.php?ruta=Salidas">
											<i class='bx bxs-purchase-tag'></i>
											<span class="link_name">Venta de Boletos</span>
										</a>
										<i class='bx bxs-chevron-down arrow'></i>
									</div>
									<ul class="sub-menu">
										<li><a class="link_name" href="index.php?ruta=Salidas">Nuevo Boleto</a></li>
										<li><a href="index.php?ruta=boletos_vendidos">Boletos Vendidos</a></li>
									</ul>
								</li>

								<li>
									<a href="index.php?ruta=generar_boleta">
										<i class='bx bxs-printer'></i>
										<span class="link_name">Boletas</span>
									</a>
									<ul class="sub-menu">
										<li><a class="link_name" href="index.php?ruta=generar_boleta">Imprimir Boleta</a></li>
									</ul>
								</li>

							<?php
							}
							if ($email == 2) {
							?>
								<li>
									<div class="iocn-link">
										<a href="index.php?ruta=Encomiendas">
											<i class='bx bxs-truck'></i>
											<span class="link_name">Encomiendas</span>
										</a>
										<i class='bx bxs-chevron-down arrow'></i>
									</div>
									<ul class="sub-menu">
										<li><a class="link_name" href="index.php?ruta=Encomiendas">Encomiendas</a></li>
										<li><a href="index.php?ruta=Envios">Envios</a></li>
										<li><a href="index.php?ruta=Seguimiento">Seguimiento</a></li>
										<li><a href="index.php?ruta=Entregados">Entregados</a></li>
									</ul>
								</li>
							<?php
							}
							if ($email == 3) {
							?>
								<li>
									<a href="index.php?ruta=RutaLista">
										<i class='bx bx-git-compare'></i>
										<span class="link_name">Salidas</span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="index.php?ruta=RutaLista">Salidas</a></li>
										<li><a href="index.php?ruta=RutaRegistrar">Nuevo</a></li>

									</ul>
								</li>
								<li>
									<a href="index.php?ruta=DestinoLista">
										<i class='bx bx-map-pin'></i>
										<span class="link_name">Destinos</span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="index.php?ruta=DestinoLista">Destinos</a></li>
										<li><a href="index.php?ruta=DestinoRegistrar">Nuevos</a></li>
									</ul>
								</li>
								<li>
									<a href="index.php?ruta=ConductorLista">
										<i class='bx bxs-face'></i>
										<span class="link_name">Choferes</span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="index.php?ruta=ConductorLista">Choferes</a></li>
										<li><a href="index.php?ruta=ConductorRegistrar">Nuevo</a></li>
										<li><a href="index.php?ruta=ConductorSuspendido">Suspendidos</a></li>

									</ul>
								</li>
								<li>
									<a href="index.php?ruta=VanLista">
										<i class='bx bx-bus'></i>
										<span class="link_name">Van</span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="index.php?ruta=VanLista">Van</a></li>
										<li><a href="index.php?ruta=VanRegistrar">Nuevo</a></li>
										<li><a href="index.php?ruta=VanSuspendido">Suspendidos</a></li>

									</ul>
								</li>
								<li>
									<a href="index.php?ruta=UsuariosLista">
										<i class='bx bxs-user-account'></i>
										<span class="link_name">Trabajadores</span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="index.php?ruta=UsuariosLista">Trabajadores</a></li>
										<li><a href="index.php?ruta=UsuariosRegistrar">Nuevo</a></li>
									</ul>
								</li>

								<li>
									<a href="">
										<i class='bx bxs-report'></i>
										<span></span>
									</a>
									<ul class="sub-menu blank">
										<li><a class="link_name" href="">Reportes</a></li>
										<li><a href="index.php?ruta=reportes_ventas">Reporte de Ventas</a></li>
										<li><a href="index.php?ruta=reportes_viaje">Reporte de Viajes</a></li>
									</ul>
								</li>

					<?php
							}
						}
					}
					?>


					<li>

					</li>
					<li>
						<div class="profile-details">
							<a href="index.php?ruta=salir">
								<div class="profile-content">
									<img src="Imagenes/usuario.png" alt="profileImg">
								</div>
							</a>
							<a href="index.php?ruta=salir">
								<div class="name-job">
									<div class="profile_name">Usuario</div>
									<div class="job">Cargo</div>
								</div>
							</a>
							<a href="index.php?ruta=salir">
								<i class="exit-icon">&#x23FB;</i>
								<span class="link_name">Cerrar Sesión</span>
							</a>
							<ul class="sub-menu blank">
								<li><a class="link_name" href="index.php?ruta=salir">Cerrar Sesión</a></li>
							</ul>
						</div>
					</li>

				</ul>
			</div>
			<br>
			<script>
				let arrow = document.querySelectorAll(".arrow");
				for (var i = 0; i < arrow.length; i++) {
					arrow[i].addEventListener("click", (e) => {
						let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
						arrowParent.classList.toggle("showMenu");
					});
				}
				let sidebar = document.querySelector(".sidebar");
				let sidebarBtn = document.querySelector(".bx-menu");
				console.log(sidebarBtn);
				sidebarBtn.addEventListener("click", () => {
					sidebar.classList.toggle("close");
				});
			</script>
		</body>
	<?php
	endif; ?>
</div>