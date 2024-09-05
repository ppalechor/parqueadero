<?php
require_once 'claseVehiculo.php';
require_once 'claseCliente.php';

class Parqueadero {
    private $vehiculos = array();
    private $clientes = array();

    public function agregarVehiculo(Vehiculo $vehiculo, Cliente $cliente, $horaIngreso) {
        $this->vehiculos[] = array("vehiculo" => $vehiculo, "cliente" => $cliente, "horaIngreso" => $horaIngreso, "horaSalida" => null);
        $this->clientes[] = $cliente;
    }

    public function buscarVehiculo($placa) {
        foreach ($this->vehiculos as $vehiculo) {
            if ($vehiculo["vehiculo"]->getPlaca() == $placa) {
                return $vehiculo;
            }
        }
        return null;
    }

    public function registrarSalida($placa, $horaSalida) {
        $vehiculo = $this->buscarVehiculo($placa);
        if ($vehiculo) {
            $vehiculo["horaSalida"] = $horaSalida;
            $this->calcularValorPagar($vehiculo);
            return $vehiculo;
        }
        return null;
    }

    public function calcularValorPagar($vehiculo) {
        $horaIngreso = $vehiculo["horaIngreso"];
        $horaSalida = $vehiculo["horaSalida"];
        $tiempoEstadia = ($horaSalida - $horaIngreso) / 3600;
        $valorPagar = $tiempoEstadia * 2; // $2 USD por hora
        $vehiculo["valorPagar"] = $valorPagar;
    }

    public function imprimirInfoVehiculo($placa) {
        $vehiculo = $this->buscarVehiculo($placa);
        if ($vehiculo) {
            echo "Placa: " . $vehiculo["vehiculo"]->getPlaca() . "\n";
            echo "Marca: " . $vehiculo["vehiculo"]->getMarca() . "\n";
            echo "Color: " . $vehiculo["vehiculo"]->getColor() . "\n";
            echo "Nombre del cliente: " . $vehiculo["cliente"]->getNombre() . "\n";
            echo "Documento del cliente: " . $vehiculo["cliente"]->getDocumento() . "\n";
            echo "Hora de ingreso: " . $vehiculo["horaIngreso"] . "\n";
            echo "Hora de salida: " . $vehiculo["horaSalida"] . "\n";
            echo "Valor a pagar: $" . $vehiculo["valorPagar"] . "\n";
        } else {
            echo "Vehículo no encontrado\n";
        }
    }
}
