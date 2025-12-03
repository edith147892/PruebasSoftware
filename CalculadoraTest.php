<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Calculadora.php';

class CalculadoraTest extends TestCase {

    /** OPERACIONES BÁSICAS **/
    public function testSumar(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(8, $c->sumar(5, 3));
    }

    public function testRestar(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(2, $c->restar(5, 3));
    }

    public function testMultiplicar(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(15, $c->multiplicar(5, 3));
    }

    public function testDividir(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(2, $c->dividir(10, 5));
    }

    public function testDividirPorCero(){
        $c = new CalculadoraCientifica();
        $this->expectException(Exception::class);
        $c->dividir(10, 0);
    }

    /** POTENCIAS Y RAÍCES **/
    public function testPotencia(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(125, $c->potencia(5, 3));
    }

    public function testRaizCuadrada(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(4, $c->raizCuadrada(16));
    }

    public function testRaizCuadradaNegativa(){
        $c = new CalculadoraCientifica();
        $this->expectException(Exception::class);
        $c->raizCuadrada(-9);
    }

    public function testRaizCubica(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(3, round($c->raizCubica(27)));
    }

    public function testRaizN(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(2, round($c->raizN(8, 3)));
    }

    /** FUNCIONES TRIGONOMÉTRICAS **/
    public function testSeno(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(0, round($c->seno(0)));
    }

    public function testCoseno(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(1, round($c->coseno(0)));
    }

    public function testTangente(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(1, round($c->tangente(M_PI/4)));
    }

    public function testSenoInverso(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(0, round($c->senoInverso(0)));
    }

    public function testCosenoInverso(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(M_PI/2, $c->cosenoInverso(0));
    }

    public function testTangenteInversa(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(M_PI/4, $c->tangenteInversa(1));
    }

    public function testGradosARadianes(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(M_PI, $c->gradosARadianes(180));
    }

    public function testRadianesAGrados(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(180, $c->radianesAGrados(M_PI));
    }

    /** LOGARITMOS Y EXPONENCIALES **/
    public function testLogaritmoNatural(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(0, $c->logaritmoNatural(1));
    }

    public function testLogaritmoBase10(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(2, $c->logaritmoBase10(100));
    }

    public function testLogaritmoBaseN(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(3, round($c->logaritmoBaseN(8, 2)));
    }

    public function testLogaritmoBaseNInvalido(){
        $c = new CalculadoraCientifica();
        $this->expectException(Exception::class);
        $c->logaritmoBaseN(10, -1);
    }

    public function testExponencial(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(20.0855, round($c->exponencial(3), 4));
    }

    /** FUNCIONES DE REDONDEO Y ABSOLUTAS **/
    public function testValorAbsoluto(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(5, $c->valorAbsoluto(-5));
    }

    public function testRedondear(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(4, $c->redondear(3.6));
    }

    public function testTecho(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(4, $c->techo(3.2));
    }

    public function testPiso(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(3, $c->piso(3.8));
    }

    /** FACTORIAL Y OPERACIONES ESPECIALES **/
    public function testFactorial(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(120, $c->factorial(5));
    }

    public function testFactorialNegativo(){
        $c = new CalculadoraCientifica();
        $this->expectException(Exception::class);
        $c->factorial(-3);
    }

    public function testModulo(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(1, $c->modulo(10, 3));
    }

    public function testPorcentaje(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(20, $c->porcentaje(200, 10));
    }

    /** FUNCIONES HIPERBÓLICAS **/
    public function testSenoHiperbolico(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(0, round($c->senoHiperbolico(0)));
    }

    public function testCosenoHiperbolico(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(1, round($c->cosenoHiperbolico(0)));
    }

    public function testTangenteHiperbolica(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(0, round($c->tangenteHiperbolica(0)));
    }

    /** MÁXIMO COMÚN DIVISOR Y MÍNIMO COMÚN MÚLTIPLO **/
    public function testMCD(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(6, $c->mcd(54, 24));
    }

    public function testMCM(){
        $c = new CalculadoraCientifica();
        $this->assertEquals(216, $c->mcm(54, 24));
    }
}
?>
