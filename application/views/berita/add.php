<main role="main">

	<div class="row marketing">
		<div class="col-12">
			<form action="<?php echo base_url('berita/save') ?>" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="judul" placeholder="Judul berita" required>
				</div>
				<div class="form-group">
					<textarea class="form-control summernote" name="konten" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary btn-lg">Publish</button>
			</form>
		</div>
	</div>

</main>

<script>
	$(function(){
		$('.summernote').summernote({
			height: 300
		});
	})
</script>