<?php
session_start();
session_destroy();

unset($_SESSION['carrito']);
$_SESSION['carrito'] = array();

$_SESSION['Total'] = 0;


echo 'Sesión cerrada correctamente';
