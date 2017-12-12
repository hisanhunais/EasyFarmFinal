<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css"
</head>
<body>
<h1>WELCOME!!!</h1>
<?php
	echo $_SESSION['username'];
?>
</body>
</html>