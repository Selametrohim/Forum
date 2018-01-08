<main role="main">

	<div class="row marketing">

		<?php if ($this->session->userdata('role') == 1): ?>
			<div class="col-12">
				<a href="<?php echo base_url('berita/add') ?>" class="btn btn-success float-right mb-4">Buat berita</a>
			</div>
		<?php endif ?>

		<div class="col-12">
			<h1><?php echo $berita['judul'] ?></h1>
			<a href="<?php echo base_url('user/' . $berita['username']) ?>"><?php echo $berita['username'] ?></a>, <small class="text-muted"><?php echo date('d/m/Y h:i', strtotime($berita['tanggal'])) ?></small>
			<?php echo $berita['konten'] ?>

			<?php if ($this->session->userdata('user_id') == $berita['user_id'] || $this->session->userdata('role') == 1): ?>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('berita/delete/' . $berita['id']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')"><i class="fas fa-trash"></i></a>
			<?php endif ?>
		</div>

		<div class="col-12">
			<?php if ($this->session->userdata('user_id')): ?>
				<form class="my-4" action="<?php echo base_url('berita/add-komentar') ?>" method="post">
					<input type="hidden" name="berita_id" value="<?php echo $berita['id'] ?>">
					<textarea name="komentar" class="summernote" required></textarea>
					<button class="btn btn-success mt-3">Tambah komentar</button>
				</form>
			<?php endif ?>

			<ul class="list-unstyled">

				<?php foreach ($komentars as $komentar): ?>
					<li class="media p-2 <?php echo ($this->session->userdata('user_id') == $komentar['user_id'] ) ? 'bg-light' : '' ?>">
						<img class="mr-3" alt="<?php echo $komentar['username'] ?>" data-src="holder.js/64x64?size=30&text=<?php echo strtoupper(substr($komentar['username'], 0, 1)) ?>">
						<div class="media-body">

							<?php if ($this->session->userdata('user_id') == $komentar['user_id'] || $this->session->userdata('role') == 1): ?>
								<a class="btn-danger btn-sm float-right" href="<?php echo base_url('berita/delete-komentar/' . $komentar['id']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus komentar ini?')"><i class="fas fa-trash"></i></a>
							<?php endif ?>
							
							<h5 class="mt-0 mb-1"><a href="<?php echo base_url('user/' . $komentar['username']) ?>"><?php echo $komentar['username'] ?></a> <small class="text-muted"><?php echo date('d/m/Y h:i') ?></small></h5>
							<?php echo $komentar['komentar'] ?>
						</div>
					</li>
				<?php endforeach ?>
					
			</ul>
		</div>
	</div>

</main>

<script>
	$(function(){
		$('.summernote').summernote({
			height: 150
		});
	})
</script>