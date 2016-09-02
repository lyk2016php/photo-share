<? include "header.php" ?>
	<form class="form-inline" action="upload.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="inpPhotos">Dosyalar</label>
			<input class="form-control" type="file" name="photos[]" accept=".png, .jpg, .jpeg, image/png, image/jpeg" multiple id="inpPhotos">
		</div>
		<button type="submit" class="btn btn-primary">Fotoğrafları Yükle</button>
	</form>
	<hr>
	<div class="col-md-9">
		<h1 style="margin-top:0">Yüklenen Fotoğraflar</h1>
	</div>
	<div class="col-md-3">
		<a href="export.php" class="btn btn-primary btn-block">Tüm Fotoğrafları İndir</a>
	</div>
	<div class="col-md-12">
		<div class="photos row">
			<? foreach($photos as $photo): ?>
			<div class="col-md-2">
			<div class="row">
				<a class="lightbox" rel="group" href="photos/previews/<?=$photo['path']?>">
					<img src="photos/thumbnails/<?=$photo['path']?>" class="img-responsive">
				</a>
			</div>
			</div>
		<? endforeach; ?>
	</div>
</div>
<? include "footer.php" ?>