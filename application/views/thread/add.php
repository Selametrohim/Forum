<main role="main">

	<div class="row marketing">
		<div class="col-12">
			<form action="<?php echo base_url('thread/save') ?>" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="judul" placeholder="Judul thread" required>
				</div>
				<div class="form-group">
					<textarea class="form-control summernote" name="konten" required></textarea>
				</div>
				<div class="form-group">
					<label for="">Kategori</label>
					<select class="form-control" name="kategori_id" required>
						
						<?php foreach ($kategories as $kategori): ?>
							<option value="<?php echo $kategori['id'] ?>"><?php echo $kategori['kategori'] ?></option>
						<?php endforeach ?>
							
					</select>
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