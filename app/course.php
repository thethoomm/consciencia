<!DOCTYPE html>
<html lang="en">

<head>
	<title>LearnVerse</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?= $css ?>
	<?= $scripts ?>
</head>

<body>
	<?= $navbar ?>

	<section class="hero-wrap hero-wrap-2" style="background-image: url('templatepublic/images/bg_2.jpg');">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="template">Início <i class="fa fa-chevron-right"></i></a></span> <span>Lista De Cursos <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Nossos Cursos</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 sidebar">
					<div class="sidebar-box bg-white ftco-animate">
						<form action="" class="search-form" method="post">
							<div class="form-group">
								<span class="icon fa fa-search"></span>
								<input type="text" name="busca" style="border:1px solid black;border-radius:5px;-moz-box-shadow: 6px 8px 23px 4px rgba(73,73,73,0.68) inset;" class="form-control" placeholder="Buscar...">
							</div>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Categorias dos Cursos</h3>
						<form action="#" class="browse-form">
							<?php
							foreach ($categorias as $categoria) {
								echo view('newtemplate/inputcategoria.php', ['categoria' => $categoria]);
							} ?>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Professores</h3>
						<form action="#" class="browse-form">

							<?php
							foreach ($professores as $professor) {
								echo view('newtemplate/inputinstrutor.php', ['professor' => $professor]);
							} ?>
						</form>
					</div>
					<!--
					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Course Type</h3>
						<form action="#" class="browse-form">
							<label for="option-course-type-1"><input type="checkbox" id="option-course-type-1" name="vehicle" value="" > Basic</label><br>
							<label for="option-course-type-2"><input type="checkbox" id="option-course-type-2" name="vehicle" value=""> Intermediate</label><br>
							<label for="option-course-type-3"><input type="checkbox" id="option-course-type-3" name="vehicle" value=""> Advanced</label><br>
						</form>
					</div>

					<div class="sidebar-box bg-white p-4 ftco-animate">
						<h3 class="heading-sidebar">Software</h3>
						<form action="#" class="browse-form">
							<label for="option-software-1"><input type="checkbox" id="option-software-1" name="vehicle" value="" > Adobe Photoshop</label><br>
							<label for="option-software-2"><input type="checkbox" id="option-software-2" name="vehicle" value=""> Adobe Illustrator</label><br>
							<label for="option-software-3"><input type="checkbox" id="option-software-3" name="vehicle" value=""> Sketch</label><br>
							<label for="option-software-4"><input type="checkbox" id="option-software-4" name="vehicle" value=""> WordPress</label><br>
							<label for="option-software-5"><input type="checkbox" id="option-software-5" name="vehicle" value=""> HTML &amp; CSS</label><br>
						</form>
					</div>
-->
				</div>


				<div class="col-lg-9">
					<div class="row">


						<?php foreach ($disciplinas as $disciplina) {
							echo view("newtemplate/card2curso.php", ['disciplina' => $disciplina]);
						} ?>

					</div>
					<div class="row mt-5">
						<div class="col">
							<div class="block-27">
								<ul>
									<li><a href="#">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
<!--esconder blog de duvidas < ? = //$blog ?> -->


	<?= $footer ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg>
	</div>




</body>

</html>