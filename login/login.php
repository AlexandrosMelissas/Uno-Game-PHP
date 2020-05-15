<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
	<title> Login Page </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href = "style.css">
</head>

<body>

	<div class="text-center" id="frm">
		<form action="./../index.php" method="GET">
				<h1 class="text-center pb-1 underline display-4"><u>Uno Game</u></h1>
				<p class="lead">by Alexandros Melissas</p>
				<input class="form-control text-center" type="text" name="nickname" placeholder="Enter your nickname" required>
			
				<button type="submit" class="btn btn-primary mt-3" name="p" value="do_login">Είσοδος στο παιχνίδι!</button>
		</form>
	</div>
</body>

</html>