<?php 

return [
    'not_logged_in' => function(){
        if( !isset($_SESSION["user"] ) ) {
            header("location: /login.php");
            return;
        }
    },
    'logged_in' => function(){
        if( isset($_SESSION["user"] ) ) {
            header("location: /index.php");
            return;
        }
    }
];
