<?php
session_start();

$middleware = include("middleware.php");
call_user_func($middleware["logged_in"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/meta.php") ?>
</head>
<body>
    <?php include("includes/nav.php") ?>
    <div class="wrapper">
        <?php
            if(isset($_SESSION["flash"]["msg"])){
        ?>
            <div class="msg">
                <?php 
                    print ("<p>".$_SESSION["flash"]["msg"]["value"]."</p>");
                ?>
            </div>
        <?php
            }
        ?>
        <h1>Belépés</h1>
        <form action="login_handler.php" method="post">
            <input type="text" value="<?php print($_SESSION["flash"]["post"]["email"]??'')?>" name="email" placeholder="Add meg az email címed!">
            <br><br>
            <input type="password" name="password" placeholder="Add meg a jelszavad!">
            <br><br>
            <button>Belépés</button>
        </form>
    </div>
</body>
</html>
<?php unset($_SESSION["flash"]);?>