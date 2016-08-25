<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Giriş Yap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>
	<div class="container">
		<? include "partials/alerts.php" ?>
		<form class="form-signin" action="login.php" method="post">
			<h2 class="form-signin-heading">Lütfen Giriş Yapın</h2>
			<label for="inputEmail" class="sr-only">E-Posta Adresiniz</label>
			<input name="email" type="email" id="inputEmail" class="form-control" placeholder="E-Posta Adresiniz" required="" autofocus="">
			<label for="inputPassword" class="sr-only">Parolanız</label>
			<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Parolanız" required="">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
		</form>
	</div>
</body>
</html>