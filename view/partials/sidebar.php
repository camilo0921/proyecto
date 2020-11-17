<!-- Sidebar -->

<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php
								echo $_SESSION['nombre'];
							?>
							<!--span class="user-level"><?php //echo $_SESSION['rol_desc']?></span>-->							
						</span>	
					</a>
					<div class="clearfix"></div>
				</div>
			</div>
			
				
			
			<ul class="nav nav-secondary">
				<li class="nav-item active">
					<a href="index.php">
						<i class="fas fa-home"></i>
						<p>Inicio</p>						
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Modulos</h4>
				</li>
           
				<li class="nav-item">
					<a data-toggle="collapse" href="#libro">
						<i class="flaticon-agenda"></i>
						<p>Libros</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="libro">
						<ul class="nav nav-collapse">
							<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2){?>
							<li>
								<a href="<?php echo getUrl("Libro","Libro","getCreate");?>">
									<span class="sub-item">Registrar libro</span>
								</a>
							</li>
							<?php } ?>

							<li>
								<a href="<?php echo getUrl("Libro","Libro","index");?>">
									<span class="sub-item">Consultar libro</span>
								</a>
							</li>

							<?php if ($_SESSION['rol']==3){?>
							<li>
								<a href="<?php echo getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","index");?>">
									<span class="sub-item">Consultar mis prestamos de libros</span>
								</a>
							</li>
							<?php } ?>
							
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="icon-picture"></i>
						<p>Revistas</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
								<li>
									<a href="<?php echo getUrl("Revista","Revista","getCreate");?>">
										<span class="sub-item">Regitrar Revista</span>
									</a>
								</li>
							<?php } ?>

							<li>
								<a href="<?php echo getUrl("Revista","Revista","index");?>">
									<span class="sub-item">Consultar Revista</span>
								</a>
							</li>

							<?php if ($_SESSION['rol']==3){?>
							<li>
								<a href="<?php echo getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","index");?>">
									<span class="sub-item">Consultar mis prestamos de revistas</span>
								</a>
							</li>
							<?php } ?>

						</ul>
					</div>
				</li>

				<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
					<li class="nav-item">
						<a data-toggle="collapse" href="#prestamoL">
							<i class="icon-login"></i>
							<p>Prestamos Libros</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="prestamoL">
							<ul class="nav nav-collapse">
								
									<li>
										<a href="<?php echo getUrl("PrestamoLibro","PrestamoLibro","getCreate");?>">
											<span class="sub-item">Regitrar Prestamo</span>
										</a>
									</li>
								
								<li>
									<a href="<?php echo getUrl("PrestamoLibro","PrestamoLibro","index");?>">
										<span class="sub-item">Consultar Prestamo</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php } ?>	

				<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
					<li class="nav-item">
						<a data-toggle="collapse" href="#prestamoR">
							<i class="flaticon-next"></i>
							<p>Prestamos Revistas</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="prestamoR">
							<ul class="nav nav-collapse">
								
									<li>
										<a href="<?php echo getUrl("PrestamoRevista","PrestamoRevista","getCreate");?>">
											<span class="sub-item">Regitrar Prestamo</span>
										</a>
									</li>
								
								<li>
									<a href="<?php echo getUrl("PrestamoRevista","PrestamoRevista","index");?>">
										<span class="sub-item">Consultar Prestamo</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php } ?>	

				<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
					<li class="nav-item">
						<a data-toggle="collapse" href="#devolucionL">
							<i class="icon-logout"></i>
							<p>Devoluciones Libros</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="devolucionL">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo getUrl("DevolucionLibro","DevolucionLibro","index");?>">
										<span class="sub-item">Consultar Devolucion</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php } ?>	

				<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
					<li class="nav-item">
						<a data-toggle="collapse" href="#devolucionL">
							<i class="flaticon-back"></i>
							<p>Devoluciones revistas</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="devolucionL">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo getUrl("DevolucionRevista","DevolucionRevista","index");?>">
										<span class="sub-item">Consultar Devolucion</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
				<?php } ?>	

				<?php if ($_SESSION['rol']==1  or $_SESSION['rol']==2){  ?>
				<li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-cogs"></i>
						<p>Menu</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#usuario">
									<span class="sub-item"> Usuario</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="usuario">
									<ul class="nav nav-collapse subnav">
										<?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2){  ?>
											<li>
												<a href="<?php echo getUrl("Usuario","Usuario","getCreate");?>">
													<span class="sub-item">Registrar Usuario</span>
												</a>
											</li>
										
											<li>
												<a href="<?php echo getUrl("Usuario","Usuario","index");?>">
														<span class="sub-item">Consultar Usuario</span>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>

							<li>
								<a data-toggle="collapse" href="#genero">
									<span class="sub-item">Genero</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="genero">
									<ul class="nav nav-collapse subnav">
										<?php if ($_SESSION['rol']==1){  ?>
											<li>
												<a href="<?php echo getUrl("Genero","Genero","getCreate");?>">
													<span class="sub-item">Registrar Genero</span>
												</a>
											</li>
										<?php } ?>

										
											<li>
												<a href="<?php echo getUrl("Genero","Genero","index");?>">
													<span class="sub-item">Consultar Genero</span>
												</a>
											</li>
										
									</ul>
								</div>
							</li>
				

							
							<li>
								<a data-toggle="collapse" href="#edicion">
									<span class="sub-item">Edicion</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="edicion">
									<ul class="nav nav-collapse subnav">
										<?php if ($_SESSION['rol']==1){  ?>
											<li>
												<a href="<?php echo getUrl("Edicion","Edicion","getCreate");?>">
													<span class="sub-item">Registrar Edicion</span>
												</a>
											</li>
										<?php } ?>

										
											<li>
												<a href="<?php echo getUrl("Edicion","Edicion","index");?>">
													<span class="sub-item">Consultar Edicion</span>
												</a>
											</li>
										
									</ul>
								</div>
							</li>
							


							<li>
								<a data-toggle="collapse" href="#editorial">
									<span class="sub-item">Editorial</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="editorial">
									<ul class="nav nav-collapse subnav">
										<?php if ($_SESSION['rol']==1){  ?>
											<li>
												<a href="<?php echo getUrl("Editorial","Editorial","getCreate");?>">
													<span class="sub-item">Registrar Editorial</span>
												</a>
											</li>
										<?php } ?>

										
											<li>
												<a href="<?php echo getUrl("Editorial","Editorial","index");?>">
													<span class="sub-item">Consultar Editorial</span>
												</a>
											</li>
										
									</ul>
								</div>
							</li>
							
							<li>
								<a data-toggle="collapse" href="#autor">
									<span class="sub-item">Autor</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="autor">
									<ul class="nav nav-collapse subnav">
										<?php if ($_SESSION['rol']==1){  ?>
											<li>
												<a href="<?php echo getUrl("Autor","Autor","getCreate");?>">
													<span class="sub-item">Registrar Autor</span>
												</a>
											</li>
										<?php } ?>

										
											<li>
												<a href="<?php echo getUrl("Autor","Autor","index");?>">
													<span class="sub-item">Consultar Autor</span>
												</a>
											</li>
										
									</ul>
								</div>
							</li>

							
								<li>
									<a data-toggle="collapse" href="#idioma">
										<span class="sub-item">Idioma</span>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="idioma">
										<ul class="nav nav-collapse subnav">
											<?php if ($_SESSION['rol']==1){  ?>
												<li>
													<a href="<?php echo getUrl("Idioma","Idioma","getCreate");?>">
														<span class="sub-item">Registrar Idioma</span>
													</a>
											<?php } ?>
													<a href="<?php echo getUrl("Idioma","Idioma","index");?>">
														<span class="sub-item">Consultar Idioma</span>
													</a>
												</li>
											
										</ul>
									</div>
								</li>

								<?php if ($_SESSION['rol']==1){  ?>
									<li>
										<a data-toggle="collapse" href="#rol">
											<span class="sub-item">Rol</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="rol">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="<?php echo getUrl("Rol","Rol","getCreate");?>">
														<span class="sub-item">Registrar Rol</span>
													</a>
													<a href="<?php echo getUrl("Rol","Rol","index");?>">
														<span class="sub-item">Consultar Rol</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
								<?php } ?>
						</ul>
					</div>
				</li>

				

				<?php } ?>
			
			</ul>
		</div>
	
	</div>
</div>
<!-- End Sidebar -->