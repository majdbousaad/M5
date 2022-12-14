<?php


function auth($passwort, $email)
{
    $link = connectdb();
    $salt = "baby";
    $hash = sha1($passwort.$salt);
    $sql = "SELECT * FROM benutzer WHERE email = '$email' AND passwort = '$hash'";
    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);
    if ($data != null) {
        $id = $data['id'];
        $sql = "UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen +1 WHERE id = '$id'";
        mysqli_query($link,$sql);
    }
    var_dump($data);
    mysqli_close($link);
    return $data;
}

function anmeldung_increment()
