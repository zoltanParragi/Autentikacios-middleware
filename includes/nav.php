<nav>
    <ul>
        <li><a href="/index.php">Kezdőlap</a></li>
        <li><a href="/public.php">Publikus oldal</a></li>
        <li><a href="/login.php">Belépés</a></li>
        <li><a href="/protected.php">Védett oldal</a></li>
        <li><a href="/logout.php">Kilépés</a></li>
        <?php if(isset($_SESSION["user"]["name"])) { ?>
            <li>Belépve: <?php print($_SESSION["user"]["name"])?> </li>
        <?php  }?>
    </ul>
</nav>