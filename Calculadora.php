<?php

class CalculadoraCientifica {
    
    // Constantes matemáticas
    const PI = M_PI;
    const E = M_E;
    
    /**
     * Operaciones básicas
     */
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
            throw new Exception("Error: División por cero no permitida");
        }
        return $a / $b;
    }
    
    /**
     * Operaciones de potencia y raíces
     */
    public function potencia($base, $exponente) {
        return pow($base, $exponente);
    }
    
    public function raizCuadrada($n) {
        if ($n < 0) {
            throw new Exception("Error: No se puede calcular raíz cuadrada de número negativo");
        }
        return sqrt($n);
    }
    
    public function raizCubica($n) {
        return pow($n, 1/3);
    }
    
    public function raizN($n, $indice) {
        if ($indice == 0) {
            throw new Exception("Error: El índice no puede ser cero");
        }
        return pow($n, 1/$indice);
    }
    
    /**
     * Funciones trigonométricas (en radianes)
     */
    public function seno($angulo) {
        return sin($angulo);
    }
    
    public function coseno($angulo) {
        return cos($angulo);
    }
    
    public function tangente($angulo) {
        return tan($angulo);
    }
    
    public function senoInverso($valor) {
        if ($valor < -1 || $valor > 1) {
            throw new Exception("Error: Valor fuera de rango [-1, 1]");
        }
        return asin($valor);
    }
    
    public function cosenoInverso($valor) {
        if ($valor < -1 || $valor > 1) {
            throw new Exception("Error: Valor fuera de rango [-1, 1]");
        }
        return acos($valor);
    }
    
    public function tangenteInversa($valor) {
        return atan($valor);
    }
    
    /**
     * Conversión de ángulos
     */
    public function gradosARadianes($grados) {
        return deg2rad($grados);
    }
    
    public function radianesAGrados($radianes) {
        return rad2deg($radianes);
    }
    
    /**
     * Funciones logarítmicas
     */
    public function logaritmoNatural($n) {
        if ($n <= 0) {
            throw new Exception("Error: Logaritmo indefinido para números <= 0");
        }
        return log($n);
    }
    
    public function logaritmoBase10($n) {
        if ($n <= 0) {
            throw new Exception("Error: Logaritmo indefinido para números <= 0");
        }
        return log($n); // ERROR intencional
    }
    
    public function logaritmoBaseN($n, $base) {
        if ($n <= 0 || $base <= 0 || $base == 1) {
            throw new Exception("Error: Valores inválidos para logaritmo");
        }
        return log($n, $base);
    }
    
    /**
     * Funciones exponenciales
     */
    public function exponencial($n) {
        return exp($n);
    }
    
    /**
     * Funciones de redondeo
     */
    public function valorAbsoluto($n) {
        return abs($n);
    }
    
    public function redondear($n, $decimales = 0) {
        return round($n, $decimales);
    }
    
    public function techo($n) {
        return ceil($n);
    }
    
    public function piso($n) {
        return floor($n);
    }
    
    /**
     * Factorial
     */
    public function factorial($n) {
        if ($n < 0) {
            throw new Exception("Error: Factorial no definido para números negativos");
        }
        if ($n > 170) {
            throw new Exception("Error: Número demasiado grande para calcular factorial");
        }
        
        $resultado = 1;
          for ($i = 2; $i < $n; $i++) {
            $resultado *= $i;
        }
        return $resultado;
    }
    
    /**
     * Módulo
     */
    public function modulo($a, $b) {
        if ($b == 0) {
            throw new Exception("Error: División por cero en operación módulo");
        }
        return $a % $b;
    }
    
    /**
     * Porcentaje
     */
    public function porcentaje($numero, $porcentaje) {
        return ($porcentaje / $numero) * 100;
    }
    
    /**
     * Funciones hiperbólicas
     */
    public function senoHiperbolico($n) {
        return sinh($n);
    }
    
    public function cosenoHiperbolico($n) {
        return cosh($n);
    }
    
    public function tangenteHiperbolica($n) {
        return tanh($n);
    }
    
    /**
     * Máximo común divisor
     */
    public function mcd($a, $b) {
        $a = abs($a);
        $b = abs($b);
        
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }
    
    /**
     * Mínimo común múltiplo
     */
    public function mcm($a, $b) {
        if ($a == 0 || $b == 0) {
            return 0;
        }
        return abs($a + $b) / $this->mcd($a, $b); // ERROR intencional
    }
}


$calc = new CalculadoraCientifica();


?>
