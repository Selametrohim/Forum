<main role="main">

	<div class="jumbotron">
		<h1 class="display-3">Mulai diskusi</h1>
		<p><a class="btn btn-lg btn-success" href="<?php echo base_url('thread/add') ?>" role="button">Buat thread</a></p>
	</div>

	<div class="row marketing">
		<div class="col-12">
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