<?php


function auth($passwort, $email) : bool
{
    $link = connectdb();
    $salt = "baby";
    $hash = sha1($passwort.$salt);
    $sql = "SELECT * FROM benutzer WHERE email = '$email' AND passwort = '$hash'";
    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    var_dump($data);
    mysqli_close($link);
    if (empty($data)) {
        echo "false";
        return false;
    }
    else {
        echo "true";
        return true;
    }
}
