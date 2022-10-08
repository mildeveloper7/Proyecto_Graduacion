<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Fisioterapeuta"){

			echo '<li>

				<a href="pacientes">

					<i class="fa fa-users"></i>
					<span>Pacientes</span>

				</a>

			</li>

			<li>

				<a href="citas">
				<i class="fa fa-calendar"></i>
					<span>citas</span>

				</a>

			</li>
			<li>

				<a href="examenes">
				<i class="fa fa-list-ul"></i>
					<span>Examenes</span>

				</a>

			</li>

			';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Fisioterapeuta"){

			echo '<li>

				<a href="pacientes">

					<i class="fa fa-sky"></i>
					<span>Avances</span>

				</a>

			</li>


			<li>

				<a href="financiero">

					<i class="fa fa-money"></i>
					<span>Finanzas</span>

				</a>

			</li>

			';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Fisioterapeuta"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Citas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="Fletes">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Fletes</span>

						</a>

					</li>

					<li>

						<a href="crear-flete">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear Flete</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de Fletes</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		?>

		</ul>

	 </section>

</aside>