<?php

include_once 'conexion.php';

$id = $_GET['id'];

$sql_eliminar = 'DELETE FROM colores WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));

//cerramos conexión base de datos y sentencia
$pdo = null;
$sentencia_eliminar = null;

header('location:index.php');