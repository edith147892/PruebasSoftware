<?php
// tests/Sistema/CalculadoraSistemaTest.php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class CalculadoraSistemaTest extends TestCase
{
    /** @var RemoteWebDriver */
    private $driver;

    protected function setUp(): void
    {
        // ChromeDriver escuchando en el puerto 9515
        $host = 'http://localhost:9515';
        $this->driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
    }

    protected function tearDown(): void
    {
        if ($this->driver) {
           // $this->driver->quit();
        }
    }

    /**
     * Espera hasta que el elemento #resultado tenga texto no vacío.
     */
    private function waitForResultadoNotEmpty(): void
    {
        $this->driver->wait(5, 500)->until(function (RemoteWebDriver $driver) {
            $text = $driver->findElement(WebDriverBy::id('resultado'))->getText();
            return trim($text) !== '';
        });
    }

    /** PRUEBA 1: Flujo de usuario SUMA */
    public function testUsuarioPuedeSumar()
    {
        // 1. Abrir la página web
        $this->driver->get('http://localhost:8000/index.html');

        // 2. Localizar elementos
        $inputA = $this->driver->findElement(WebDriverBy::id('numA'));
        $inputB = $this->driver->findElement(WebDriverBy::id('numB'));
        $boton  = $this->driver->findElement(WebDriverBy::id('btnSumar'));

        // 3. Interacción
        $inputA->clear()->sendKeys('50');
        $inputB->clear()->sendKeys('50');
        $boton->click();

        // 4. Esperar a que #resultado tenga texto
        $this->waitForResultadoNotEmpty();

        // 5. Validación
        $textoResultado = $this->driver
            ->findElement(WebDriverBy::id('resultado'))
            ->getText();

        $this->assertEquals('Resultado: 100', $textoResultado);
    }

    /** PRUEBA 2: Error al dividir entre cero */
    public function testUsuarioVeErrorAlDividirPorCero()
    {
        // 1. Abrir la página
        $this->driver->get('http://localhost:8000/index.html');

        // 2. Localizar elementos
        $inputA = $this->driver->findElement(WebDriverBy::id('numA'));
        $inputB = $this->driver->findElement(WebDriverBy::id('numB'));
        $botonDividir = $this->driver->findElement(WebDriverBy::id('btnDividir'));

        // 3. Interacción
        $inputA->clear()->sendKeys('10');
        $inputB->clear()->sendKeys('0');
        $botonDividir->click();

        // 4. Esperar a que #resultado tenga texto
        $this->waitForResultadoNotEmpty();

        // 5. Validación: debe contener la palabra "Error"
        $textoResultado = $this->driver
            ->findElement(WebDriverBy::id('resultado'))
            ->getText();

        $this->assertStringContainsString('Error', $textoResultado);
    }
}
