<div class="col-md-6 col-lg-3 ftco-animate d-flex align-items-stretch">
	<div class="staff">
		<div class="img-wrap d-flex align-items-stretch">
			<?php
			$db = db_connect();

			$ft_usu = $db->table('fotosusuarios')->where('id_usuario', $professor['usu_id'])->get()->getResultArray();

			if ($ft_usu) {
				$_SESSION['fotousu']['caminho'] = $ft_usu[0]['pasta'];
			} else {
				// se o usuário não tem foto define a foto padrao dele como a foto de usuario
				$_SESSION['fotousu']['caminho'] = 'img/ProfilePhotos/UndefinedPhoto.jpg';
			}

			?>
			<a href="<?= $GLOBALS['baseurl'] ?>Professor/<?= toslug($professor['usu_nome']) ?>" class="img align-self-stretch" style="background-image: url(<?= $GLOBALS['baseurl'] ?><?= $_SESSION['fotousu']['caminho'] ?>);background-position: center;width: 40rem;">
		</div>
		</a>
		<div class="text pt-3">
			<h3><a href="<?= $GLOBALS['baseurl'] ?>Professor/<?= toslug($professor['usu_nome']) ?>"><?= $professor['usu_nome'] ?></a></h3>
			<span class="position mb-2"><?= $professor['profissao'] ?></span>
			<div class="faded">
				<p><?= $professor['descricao_usu'] ?></p>
				<ul class="ftco-social text-center">
					<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="fa fa-google"></span></a></li>
					<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>