<?php
session_start();

if($_SERVER["REQUEST_METHOD"] !== 'POST') {
    http_response_code(403);
    exit;
}

include('config.php');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($err = mysqli_connect_error()) {
    exit($err);
}

$post = $_POST;

extract($post); 

$email_error = "";

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_error = "Az email formátuma nem megfelelő";
}

if(strlen($email_error) > 0){
    $_SESSION["flash"]["post"] = $post;
    $_SESSION["flash"]["msg"] = ['value' => $email_error, 'type' => 'errormsg'];
} else {
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);

    $user_in_db = mysqli_query($connection, "select * from users where email = '$email' ");

    if( mysqli_num_rows($user_in_db) === 1 ) {
        $user_in_db = mysqli_fetch_assoc($user_in_db);
        $user_password_in_db = $user_in_db["password"];
        if( !password_verify( $password , $user_password_in_db )) {
            $_SESSION["flash"]["post"] = $post;
            $_SESSION["flash"]["msg"] = ['value' => 'Hibás belépési adatok.'];
        } else {
            $_SESSION["flash"]["msg"] = ['value' => 'Sikeres belépés. :)'];
            $_SESSION["user"] = $user_in_db;
            header("location: index.php");
            exit;
        }
    } else {
        $_SESSION["flash"]["msg"] = ['value' => 'Hibás belépési adatok.'];
    }
}

header("location: ". $_SERVER["HTTP_REFERER"]);