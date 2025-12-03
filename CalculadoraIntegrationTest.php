<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class CalculadoraIntegrationTest extends TestCase {

    private $client;

    protected function setUp(): void {
        $this->client = new Client([
            "base_uri" => "http://localhost:8000"
        ]);
    }

    /** PRUEBA YA EXISTENTE: SUMA */
    public function testApiSumaCorrectamente() {
        $response = $this->client->post("/api.php", [
            "json" => ["accion" => "sumar", "a" => 10, "b" => 20]
        ]);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("success", $data["status"]);
        $this->assertEquals(30, $data["resultado"]);
    }

    /** PRUEBA YA EXISTENTE: ERROR DIVISIÓN */
    public function testApiManejaErrorDivision() {
        $this->expectException(\GuzzleHttp\Exception\ServerException::class);

        $this->client->post("/api.php", [
            "json" => ["accion" => "dividir", "a" => 50, "b" => 0]
        ]);
    }

    /** NUEVA PRUEBA DE INTEGRACIÓN */
    public function testOperacionNuevaRaizCuadrada() {
        $response = $this->client->post("/api.php", [
            "json" => [
                "accion" => "operacion_nueva",
                "a" => 16
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("success", $data["status"]);
        $this->assertEquals(4, $data["resultado"]); // √16 = 4
    }
}

