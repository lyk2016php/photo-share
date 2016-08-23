<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fotoğraf Paylaşım Alanı</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<style type="text/css">
		body{
			margin-top: 20px;
		}
		.photos img{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><i class="fa fa-camera-retro" aria-hidden="true" style="color:orange;"></i> Photo Share</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php">Çıkış Yap</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<hr>
		<? if(!is_null($message)): ?>
		<p><?=$message?></p>
		<hr>
		<? endif; ?>