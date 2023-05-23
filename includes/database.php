<?php

// $db = mysqli_connect(
//     $_ENV['DB_HOST'],
//     $_ENV['DB_USER'],
//     $_ENV['DB_PASS'],
//     $_ENV['DB_BD'],
// );

$db = mysqli_connect('localhost', 'administrador', 'mar120314mar', 'admin_coyote');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
