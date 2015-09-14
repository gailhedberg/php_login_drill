


<!DOCTYPE html>
<html lang="en">
<head> 	<meta charset="UTF=8">
	<title>Gail's Web Page</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="loginForm.css">
</head>

<body>
	<form method="get">
	<pre> <?php print_r($_GET); ?>
	</pre>
	<h2>Hello <?php echo $_GET["name"]; ?>,
	<br><br> Welcome to Gail's World</h2>
	</form>
</body>
</html>

