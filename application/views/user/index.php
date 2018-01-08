<main role="main">

	<div class="row marketing">

		<div class="col-12 col-md-4">
			<div class="row">
				<dt class="col-12">Nama lengkap</dt>
			  <dd class="col-12"><?php echo $user['nama'] ?></dd>

				<dt class="col-12">Username</dt>
			  <dd class="col-12"><?php echo $user['username'] ?></dd>

				<dt class="col-12">Email</dt>
			  <dd class="col-12"><?php echo $user['email'] ?></dd>
			</div>
		</div>

		<div class="col-12 col-md-8">
			<table class="table datatable">
				<thead>
					<tr>
						<th>Judul</th>
						<th>Tanggal</th>
						<th>Kategori</th>
						<th>User</th>
					</tr>
				</thead>
				<tbody>
			
					<?php foreach ($threads as $thread): ?>
						<tr>
							<td><a href="<?php echo base_url('thread/view/' . $thread['id']) ?>"><strong><?php echo $thread['judul'] ?></strong></a></td>
							<td><?php echo date('d/m/Y h:i', strtotime($thread['tanggal'])) ?></td>
							<td><?php echo $thread['kategori'] ?></td>
							<td><a href="<?php echo base_url('user/' . $thread['username']) ?>"><?php echo $thread['username'] ?></a></td>
						</tr>
					<?php endforeach ?>
					
				</tbody>
			</table>
		
			<?php foreach ($beritas as $berita): ?>
				<div class="col-md-6">
					<h4><a href="<?php echo base_url('berita/view/' . $berita['id']) ?>"><?php echo $berita['judul'] ?></a></h4>
					<a href="<?php echo base_url('user/' . $berita['username']) ?>"><?php echo $berita['username'] ?></a>, <small class="text-muted"><?php echo date('d/m/Y h:i', strtotime($berita['tanggal'])) ?></small>
					<p><?php echo substr(strip_tags($berita['konten']), 0, 100) . '...' ?></p>
					<a href="<?php echo base_url('berita/' . $berita['id']) ?>" class="btn btn-dark btn-sm">Baca selengkapnya</a>
				</div>
			<?php endforeach ?>
		</div>

	</div>

</main>

<script>
	$(function(){
		$('.datatable').DataTable({
			lengthChange: false,
			order: [[1, 'desc']]
		})
	})
</script>