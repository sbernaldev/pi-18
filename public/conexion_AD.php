<?php

require_once  __DIR__.'/../vendor/autoload.php';

    $adServer = "ldap://10.2.72.95";

    $ldap = ldap_connect($adServer);
    $username = $_POST['nom_usuario'];
    $password = $_POST['password'];

    $ldaprdn = 'JAVIMERINO' . "\\" . $username;
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap, $ldaprdn, $password);
    if ($bind) {
        $msg = "Estás logueado como correctamente como $username";
    } else {
        $msg = "Usuario o contraseña incorrectos";
    }
    echo $msg;
