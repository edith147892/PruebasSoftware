<?php

require __DIR__ . '/../src/CalculadoraCientifica.php';



$calc = new CalculadoraCientifica();

$input = json_decode(file_get_contents("php://input"), true);
$accion = $input["accion"] ?? null;

$response = [];

try {

    switch ($accion) {

        case "sumar":
            $response["status"] = "success";
            $response["resultado"] = $calc->sumar($input["a"], $input["b"]);
            break;

        case "restar":
            $response["status"] = "success";
            $response["resultado"] = $calc->restar($input["a"], $input["b"]);
            break;

        case "multiplicar":
            $response["status"] = "success";
            $response["resultado"] = $calc->multiplicar($input["a"], $input["b"]);
            break;

        case "dividir":
            $response["status"] = "success";
            $response["resultado"] = $calc->dividir($input["a"], $input["b"]);
            break;

        case "potencia":
            $response["status"] = "success";
            $response["resultado"] = $calc->potencia($input["a"], $input["b"]);
            break;

        case "mcm":
            $response["status"] = "success";
            $response["resultado"] = $calc->mcm($input["a"], $input["b"]);
            break;

        /* NUEVA OPERACIÓN */
        case "operacion_nueva":
            $response["status"] = "success";
            $response["resultado"] = $calc->raizCuadrada($input["a"]);
            break;

        default:
            throw new Exception("Acción no válida.");
    }

    http_response_code(200);

} catch (Exception $e) {

    http_response_code(500);
    $response["status"] = "error";
    $response["mensaje"] = $e->getMessage();
}

echo json_encode($response);
