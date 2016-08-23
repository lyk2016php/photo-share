<? include "header.php" ?>
	<form class="form-inline" action="upload.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inpPhotos">Dosyalar</label>
			<input class="form-control" type="file" name="photos[]" accept=".png, .jpg, .jpeg, image/png, image/jpeg" multiple id="inpPhotos">
		</div>
		<button type="submit" class="btn btn-primary">Fotoğrafları Yükle</button>
	</form>
	<hr>
	<h1>Yüklenen Fotoğraflar</h1>
	<div class="col-md-12">
		<div class="photos row">
			<? foreach($photos as $photo): ?>
			<div class="col-md-3">
				<a href="photos/<?=$photo['path']?>" target="_blank">
					<img src="photos/<?=$photo['path']?>" class="img-responsive img-thumbnail">
				</a>
			</div>
		<? endforeach; ?>
	</div>
</div>
<? include "footer.php" ?>