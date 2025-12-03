<?php

class CalculadoraCientifica {

    public function sumar($a, $b) {
        return $a + $b;
    }

    public function restar($a, $b) {
        return $a - $b;
    }

    public function multiplicar($a, $b) {
        return $a * $b;
    }

    public function dividir($a, $b) {
        if ($b == 0) {
            throw new Exception("Error: no se puede dividir entre cero.");
        }
        return $a / $b;
    }

    public function potencia($a, $b) {
        return pow($a, $b);
    }

    public function mcd($a, $b) {
        return $b == 0 ? abs($a) : $this->mcd($b, $a % $b);
    }

    public function mcm($a, $b) {
        return abs($a * $b) / $this->mcd($a, $b);
    }

    /* NUEVA OPERACIÓN */
    public function raizCuadrada($a) {
        if ($a < 0) {
            throw new Exception("No se puede sacar raíz cuadrada de un número negativo");
        }
        return sqrt($a);
    }
}

?>
