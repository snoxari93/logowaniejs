<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<?php
require 'database.php';
if ( !empty($_POST)) {

    $LoginError = null;
    $PasswordError = null;

    $Login = $_POST['Login'];
    $Password = $_POST['Password'];


    $valid = true;
    if (empty($Login)) {
        $LoginError = 'wprowadz login';
    }
    if (empty($Password)) {
        $PasswordError = 'wprowadz haslo';
    }
    if (!empty($LoginError) || !empty($PasswordError))
    {
        $valid = false;
    }
    if ($valid) {
        echo "ok- wprowadzenie";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // wlacza wyrzucanie bledow
        $sql = "INSERT INTO logs (Login,Password) values(?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($Login, $Password));
        Database::disconnect();
        header("Location: index.php");
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <h3>Nowy uzytkownik</h3>
    </div>
    <form class="form-horizontal" action="create.php" method="post">
        <div class="form-group">
            <label class=" col-sm-1 control-label">Login</label>
            <div class="col-sm-5">
                <input name="Login" type="text" class="form-control" placeholder="Podaj nick"
                       value="<?php echo (!empty($Login))?$Login:''; ?>">
                <?php
                if (!empty($LoginError))
                    echo "<span class='text-danger'>".$imieError."</span>";
                ?>
            </div>

        </div>

        <div class="form-group">
            <label class=" col-sm-1 control-label">Password</label>
            <div class="col-sm-5">
                <input name="Password" type="text" class="form-control" placeholder="Podaj haslo"
                       value="<?php echo (!empty($Password))?$Password:''; ?>">
                <?php
                if (!empty($nazwiskoError))
                    echo "<span class='text-danger'>".$nazwiskoError."</span>";
                ?>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Create</button>
            <a class="btn btn-light" href="index.php">Back</a>
        </div>
    </form>
</div> <!-- /container -->
</body>

