<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>title</title>
</head>
<body>


<?php
if($_SESSION['user']=="")
    header('Location: index.php');
else
echo"<p>Zalogowano uzytkownika: </p> ".$_SESSION['user'];
echo "<a href='logout.php'><br>Wyloguj sie</a>";


?>

</body>
</html>