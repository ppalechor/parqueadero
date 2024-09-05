<?php

require_once 'claseParqueadero.php';

$parqueadero = new Parqueadero();

// Agregar vehículos y clientes
$vehiculo1 = new Vehiculo("ABC123", "Toyota", "Rojo");
$cliente1 = new Cliente("Juan Pérez", "123456789");
$parqueadero->agregarVehiculo($vehiculo1, $cliente1, date("Y-m-d H:i:s"));

$vehiculo2 = new Vehiculo("DEF456", "Honda", "Azul");
$cliente2 = new Cliente("María García", "987654321");
$parqueadero->agregarVehiculo($vehiculo2, $cliente2, date("Y-m-d H:i:s"));

// Imprimir información de los vehículos
echo "Información de los vehículos:\n";
$parqueadero->imprimirInfoVehiculo("ABC123");
echo "\n";
$parqueadero->imprimirInfoVehiculo("DEF456");

// Registrar salida de un vehículo
$horaSalida = date("Y-m-d H:i:s");
$parqueadero->registrarSalida("ABC123", $horaSalida);

// Imprimir información del vehículo después de registrar la salida
echo "\nInformación del vehículo después de registrar la salida:\n";
$parqueadero->imprimirInfoVehiculo("ABC123");

?>
