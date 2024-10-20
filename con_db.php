<?php

$conex = mysqli_connect("localhost", "root", "", "usuariosdashboards");

if (!$conex) {
    die("Conexión fallida: " . mysqli_connect_error());
}
