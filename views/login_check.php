<?php

$login = $_POST['login'];
$passwd =  $_POST['passwd'];

$u = new User();
$user = $u -> authenticate($login, $passwd);

if (!$user) {

    echo "Ihr Benutzername oder Passwort ist falsch!";
}
else {
    echo $user -> getLogin();
}


?>
