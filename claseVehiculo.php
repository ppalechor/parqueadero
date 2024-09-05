<?php

class Vehiculo {
    private $placa;
    private $marca;
    private $color;

    public function __construct($placa, $marca, $color) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
    }

    public function __toString() {
        return "Placa: $this->placa, Marca: $this->marca, Color: $this->color";
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getColor() {
        return $this->color;
    }
}
