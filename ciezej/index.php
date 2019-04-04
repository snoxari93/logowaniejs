<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    header('Location: gra.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
</head>
<body>
<p>Logowanie</p>

<form action="zaloguj.php" method="post">
    Login <br /> <input type="text" name="login"/> <br />
    Haslo <br /> <input type="password" name="haslo"/> <br />
    <input type="submit" value="Zaloguj" />
    <a href="create.php" type="button" class="btn btn-default subs-btn">Rejestracja</a>
</form>


<?php
if(isset($_SESSION['blad']))
{
    echo $_SESSION['blad'];

}
?>


</body>
</html>