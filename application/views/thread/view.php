<main role="main">

	<div class="row marketing">
		<div class="col-12">
			<a href="<?php echo base_url('thread/add') ?>" class="btn btn-success float-right mb-4">Buat thread</a>
		</div>
		<div class="col-12">

			<div class="card">
				<div class="card-header">
					<span><a href="<?php echo base_url('user/' . $thread['username']) ?>"><?php echo $thread['username'] ?></a>, <small class="text-muted"><?php echo date('d/m/Y h:i', strtotime($thread['tanggal'])) ?></small></span>

					<?php if ($this->session->userdata('user_id') == $thread['user_id'] || $this->session->userdata('role') == 1): ?>
						<div class="float-right">
							<a class="btn btn-danger btn-sm" href="<?php echo base_url('thread/delete/' . $thread['id']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus thread ini?')"><i class="fas fa-trash"></i></a>
						</div>
					<?php endif ?>
						
				</div>
				<div class="card-body">
					<h5 class="card-title"><?php echo $thread['judul'] ?></h5>
					<hr>
					<?php echo $thread['konten'] ?>
				</div>
			</div>

			<?php if ($this->session->userdata('user_id')): ?>
				<form class="my-4" action="<?php echo base_url('thread/add-komentar') ?>" method="post">
					<input type="hidden" name="thread_id" value="<?php echo $thread['id'] ?>">
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
								<a class="btn-danger btn-sm float-right" href="<?php echo base_url('thread/delete-komentar/' . $komentar['id']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus komentar ini?')"><i class="fas fa-trash"></i></a>
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