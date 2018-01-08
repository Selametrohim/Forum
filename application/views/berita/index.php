<main role="main">

	<div class="row marketing">

		<?php if ($this->session->userdata('role') == 1): ?>
			<div class="col-12">
				<a href="<?php echo base_url('berita/add') ?>" class="btn btn-success float-right">Buat berita</a>
			</div>
		<?php endif ?>		
		
		<?php foreach ($beritas as $berita): ?>
			<div class="col-md-4 col-sm-6">
				<h3><a href="<?php echo base_url('berita/view/' . $berita['id']) ?>"><?php echo $berita['judul'] ?></a></h3>
				<a href="<?php echo base_url('user/' . $berita['username']) ?>"><?php echo $berita['username'] ?></a>, <small class="text-muted"><?php echo date('d/m/Y h:i', strtotime($berita['tanggal'])) ?></small>
				<p><?php echo substr(strip_tags($berita['konten']), 0, 100) . '...' ?></p>
				<a href="<?php echo base_url('berita/view/' . $berita['id']) ?>" class="btn btn-dark btn-sm">Baca selengkapnya</a>
			</div>
		<?php endforeach ?>

	</div>

</main>