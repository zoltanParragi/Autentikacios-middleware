<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/meta.php") ?>
</head>
<body>
    <?php include("includes/nav.php") ?>
    
    <div class="wrapper">
        <h1>Autentikációs middleware</h1>
        <h3>PRIORIS - próbafeladat</h3>
        <?php if(isset($_SESSION["flash"]["msg"])) { ?>
            <div><?php print($_SESSION["flash"]["msg"]["value"])?> </div>
        <?php  }?>
    </div>
</body>
</html>
<?php unset($_SESSION["flash"]);?>