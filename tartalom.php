<?php

switch ($menu) {
    case 'főoldal':
        require_once './pages/fooldal.php';
        break;
    case 'kapcsolat':
        require_once './pages/kapcsolat.php';
        break;
    case 'rolunk':
        require_once './pages/rolunk.php';
        break;
    case 'kivalasztottauto':
        require_once './pages/kivalasztottauto.php';
        break;
    case 'szurtautok':
        require_once './pages/szurtautok.php';
        break;
    case 'register':
        require_once './pages/register.php';
        break;
    case 'bejelentkezes':
        require_once './pages/login.php';
        break;
    case 'szerzodes':
        require_once './pages/szerzodes.php';
        break;
    default:
        require_once './pages/fooldal.php';
        break;
}

