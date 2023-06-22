<?php 
session_start();
$middleware = include("middleware.php");
call_user_func($middleware["not_logged_in"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/meta.php") ?>
</head>
<body>
    <?php include("includes/nav.php") ?>
    <header>
        <h1>Védett tartalom</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste sunt aliquid labore sed eaque nesciunt optio repellat accusamus? Dolor similique sunt explicabo! Adipisci corporis, cupiditate soluta voluptate quae unde omnis?</p>
    </header>
</body>
</html>