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
								<span class="nav-label">Cellar</span> 
						</a>
					</li>
				';
			}
			
			
			
			$left_nav = $left_nav . '
				<li>
					<a href="#" class=" hvr-bounce-to-right">
						<i class="fa fa-cog nav_icon"></i> 
						<span class="nav-label">User</span>
						<span class="fa arrow"></span>
					</a>
					';
				
				if (isset($_SESSION['PageCode5']) && !empty($_SESSION['PageCode5'])) {
					$left_nav = $left_nav . '
						<ul class="nav nav-second-level">
							<li>
								<a href="../Permission/index.php" class=" hvr-bounce-to-right">
									<i class="fa fa-sign-in nav_icon"></i>Permission
								</a>
							</li>
						</ul>
					';
				}
				 
				
					if (isset($_SESSION['PageCode2']) && !empty($_SESSION['PageCode2'])) {
						$left_nav = $left_nav . '
							<ul class="nav nav-second-level">
								<li>
									<a href="../Add_roles/index.php" class=" hvr-bounce-to-right">
										<i class="fa fa-sign-in nav_icon"></i>Roles
									</a>
								</li>
							</ul>
						';
					}
				
						
				
					if (isset($_SESSION['PageCode1']) && !empty($_SESSION['PageCode1'])) {
						$left_nav = $left_nav . '
							<ul class="nav nav-second-level">
								<li>
									<a href="../Users/index.php" class=" hvr-bounce-to-right">
										<i class="fa fa-sign-in nav_icon"></i>Users
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
									<i class="fa fa-sign-in nav_icon"></i>Webpages
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
					<span class="nav-label">Products</span>
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