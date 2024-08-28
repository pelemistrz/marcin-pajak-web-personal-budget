<?php
  session_start();

  if(!isset($_SESSION["isRegisterCompleted"])) {
    header("Location: index.php");
    exit();
  } else {
    unset($_SESSION["isRegisterCompleted"]);
  }
  if (isset($_SESSION['givenUsername'])) unset($_SESSION['givenUsername']);
	if (isset($_SESSION['givenEmail'])) unset($_SESSION['givenEmail']);
	if (isset($_SESSION['givenPassword'])) unset($_SESSION['givenPassword']);
	if (isset($_SESSION['givenRepeatedPassword'])) unset($_SESSION['givenRepeatedPassword']);

	
	//Usuwanie błędów rejestracji
	if (isset($_SESSION['errorUsername'])) unset($_SESSION['errorUsername']);
	if (isset($_SESSION['errorEmail'])) unset($_SESSION['errorEmail']);
	if (isset($_SESSION['errorPassword'])) unset($_SESSION['errorPassword']);


  ?>
  <!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>
	
	Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto!<br /><br />
	
	<a href="../login.php">Zaloguj się na swoje konto!</a>
	<br /><br />

</body>
</html>