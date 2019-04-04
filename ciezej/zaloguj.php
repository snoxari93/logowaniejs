<?php

session_start();
require_once "connect.php";

$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno."Opis".$polaczenie->connect_error;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM logs WHERE Login='$login' AND Password='$haslo'";

    if ($rezultat = $polaczenie->query($sql)) {
        $ilu_userow = $rezultat->num_rows;

        if ($ilu_userow > 0)
        {
            $_SESSION['zalogowany'] = true;
            $wiersz = $rezultat->fetch_assoc();
            $_SESSION['user'] = $wiersz['Login'];
            $_SESSION['dane'] = $wiersz['Dane'];

            $rezultat->free_result();

            header('Location: gra.php');

        }
        else
        {
            $_SESSION['blad'] = '<span style="color:red">Zle dane logowania</span>';
            header('Location: index.php');

        }
    }

    $poloczenie->close();
}




?>