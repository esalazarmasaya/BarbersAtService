<?php $left_nav = ""; ?>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			
			<?php if (isset($_SESSION['PageCode4']) && !empty($_SESSION['PageCode4'])) {
				$left_nav = $left_nav . '
					<li>
						<a href="../main/index.php" class=" hvr-bounce-to-right">
								<i class="fa fa-dashboard nav_icon "></i>
								<span class="nav-label">Home</span> 
						</a>
					</li>
				';
			}
			
			if (isset($_SESSION['PageCode4']) && !empty($_SESSION['PageCode4'])) {
				$left_nav = $left_nav . '
					<li>
						<a href="../Cellar/index.php" class=" hvr-bounce-to-right">
								<i class="fa fa-dashboard nav_icon "></i>
								<span class="nav-label">Tienda</span> 
						</a>
					</li>
				';
			}
			
			
			
			$left_nav = $left_nav . '
				<li>
					<a href="#" class=" hvr-bounce-to-right">
						<i class="fa fa-cog nav_icon"></i> 
						<span class="nav-label">Usuario</span>
						<span class="fa arrow"></span>
					</a>
					';
				
				/*if (isset($_SESSION['PageCode5']) && !empty($_SESSION['PageCode5'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Permission/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Permisos
								</a>
							</li>
						</ul>
					';
				}*/
				 
				
					/*if (isset($_SESSION['PageCode2']) && !empty($_SESSION['PageCode2'])) {
						$left_nav = $left_nav . '
							<ul class="nav nav-second-level">
								<li>
									<a href="../Roles/index.php" class=" hvr-bounce-to-right">
										<i class="fa fa-sign-in nav_icon"></i>Roles
									</a>
								</li>
							</ul>
						';
					}*/
				
						
				
					if (isset($_SESSION['PageCode1']) && !empty($_SESSION['PageCode1'])) {
						$left_nav = $left_nav . '
							<ul class="nav nav-second-level">
								<li>
									<a href="../Users/index.php" class=" hvr-bounce-to-right">
										<i class="fa fa-sign-in nav_icon"></i>Usuarios
									</a>
								</li>
							</ul>
						';
					} 
				
					if (isset($_SESSION['PageCode6']) && !empty($_SESSION['PageCode6'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Webpages/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Paginas
								</a>
							</li>
						</ul>
					';
					} 
						
						
			$left_nav = $left_nav . '
			</li>
			
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Productos</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode7']) && !empty($_SESSION['PageCode7'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Products/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Productos
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode10']) && !empty($_SESSION['PageCode10'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../ProductAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Producto nuevo
								</a>
							</li>
						</ul>
					';
				}
				
				
				if (isset($_SESSION['PageCode3']) && !empty($_SESSION['PageCode3'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Brand/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Marca
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode8']) && !empty($_SESSION['PageCode8'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../ProductPresentation/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Presentación
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode9']) && !empty($_SESSION['PageCode9'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../ProductType/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Tipo
								</a>
							</li>
						</ul>
					';
				}
						
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Servicios</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode11']) && !empty($_SESSION['PageCode11'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../ServiceAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Servicio nuevo
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode12']) && !empty($_SESSION['PageCode12'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Services/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Servicios
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode17']) && !empty($_SESSION['PageCode17'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../AverageTimeAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Nuevo Tiempo
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode18']) && !empty($_SESSION['PageCode18'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../AverageTime/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Tiempo servicio
								</a>
							</li>
						</ul>
					';
				}
				
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Empleados</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode13']) && !empty($_SESSION['PageCode13'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../EmployeeAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Empleado nuevo
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode14']) && !empty($_SESSION['PageCode14'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Employees/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Empleados
								</a>
							</li>
						</ul>
					';
				}
				
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Ticket</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode15']) && !empty($_SESSION['PageCode15'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Ticket nuevo
								</a>
							</li>
						</ul>
					';
				}
				
				
				
				if (isset($_SESSION['PageCode19']) && !empty($_SESSION['PageCode19'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../MyTicket/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Mi Ticket
								</a>
							</li>
						</ul>
					';
				}
				
				
				
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Ticket Admin</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode14']) && !empty($_SESSION['PageCode14'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Tickets/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Tickets
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode22']) && !empty($_SESSION['PageCode24'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketsToProve/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Por comprobar
								</a>
							</li>
						</ul>
					';
				}
			
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Ver Tickets</span>
					<span class="fa arrow"></span>
				</a>';
				
				
				if (isset($_SESSION['PageCode20']) && !empty($_SESSION['PageCode20'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketsPendant/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>En Espera
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode21']) && !empty($_SESSION['PageCode21'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketsInitialized/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Iniciados
								</a>
							</li>
						</ul>
					';
				}
				
				if (isset($_SESSION['PageCode22']) && !empty($_SESSION['PageCode22'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketsFinished/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Finalizados
								</a>
							</li>
						</ul>
					';
				}
				
			
			
			
			if (isset($_SESSION['PageCode22']) && !empty($_SESSION['PageCode23'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TicketsProved/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Comprobados
								</a>
							</li>
						</ul>
					';
				}
				
			
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Transaccion Admin</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode14']) && !empty($_SESSION['PageCode14'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Transactions/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Transacciones
								</a>
							</li>
						</ul>
					';
				}
			
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			
			
			
			$left_nav = $left_nav . '
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Transaccion</span>
					<span class="fa arrow"></span>
				</a>';
				
				if (isset($_SESSION['PageCode25']) && !empty($_SESSION['PageCode25'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../TransactionAdd/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Tensaccion nueva
								</a>
							</li>
						</ul>
					';
				}
			$left_nav = $left_nav . '
			</li>';
			
			
			
			
			echo $left_nav;
			
			
			 /*
			<li>
				<a href="index.html" class=" hvr-bounce-to-right">
						<i class="fa fa-dashboard nav_icon "></i>
						<span class="nav-label">Dashboards</span> 
				</a>
			</li>
			
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-indent nav_icon"></i> 
					<span class="nav-label">Menu Levels</span><span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li>
						<a href="graphs.html" class=" hvr-bounce-to-right"> 
							<i class="fa fa-area-chart nav_icon"></i>Graphs
						</a>
					</li>
					
					<li>
						<a href="maps.html" class=" hvr-bounce-to-right">
							<i class="fa fa-map-marker nav_icon"></i>Maps
						</a>
					</li>
					
					<li>
						<a href="typography.html" class=" hvr-bounce-to-right">
							<i class="fa fa-file-text-o nav_icon"></i>Typography
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="inbox.html" class=" hvr-bounce-to-right">
					<i class="fa fa-inbox nav_icon"></i> 
					<span class="nav-label">Inbox</span> 
				</a>
			</li>
			
			<li>
				<a href="gallery.html" class=" hvr-bounce-to-right">
					<i class="fa fa-picture-o nav_icon"></i> 
					<span class="nav-label">Gallery</span> 
				</a>
			</li>
			
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-desktop nav_icon"></i> 
					<span class="nav-label">Pages</span>
					<span class="fa arrow"></span>
				</a>
				
				<ul class="nav nav-second-level">
					<li>
						<a href="404.html" class=" hvr-bounce-to-right"> 
							<i class="fa fa-info-circle nav_icon"></i>Error 404
						</a>
					</li>
					
					<li>
						<a href="faq.html" class=" hvr-bounce-to-right">
							<i class="fa fa-question-circle nav_icon"></i>FAQ
						</a>
					</li>
					
					<li>
						<a href="blank.html" class=" hvr-bounce-to-right">
							<i class="fa fa-file-o nav_icon"></i>Blank
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="layout.html" class=" hvr-bounce-to-right">
					<i class="fa fa-th nav_icon"></i> 
					<span class="nav-label">Grid Layouts</span> 
				</a>
			</li>
			
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-list nav_icon"></i> 
					<span class="nav-label">Forms</span>
					<span class="fa arrow"></span>
				</a>
				
				<ul class="nav nav-second-level">
					<li>
						<a href="forms.html" class=" hvr-bounce-to-right">
							<i class="fa fa-align-left nav_icon"></i>Basic forms
						</a>
					</li>
					
					<li>
						<a href="validation.html" class=" hvr-bounce-to-right">
							<i class="fa fa-check-square-o nav_icon"></i>Validation
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="#" class=" hvr-bounce-to-right">
					<i class="fa fa-cog nav_icon"></i> 
					<span class="nav-label">Settings</span>
					<span class="fa arrow"></span>
				</a>
				
				<ul class="nav nav-second-level">
					<li>
						<a href="signin.html" class=" hvr-bounce-to-right">
							<i class="fa fa-sign-in nav_icon"></i>Signin
						</a>
					</li>
					
					<li>
						<a href="signup.html" class=" hvr-bounce-to-right">
							<i class="fa fa-sign-in nav_icon"></i>Singup
						</a>
					</li>
				</ul>
			</li>
			 * 
			 */
			 ?>
		</ul>
	</div>
</div>