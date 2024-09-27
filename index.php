<?php
header('Content-Type: application/json');  // Establecer el tipo de contenido a JSON

// URL y token
$token = 'e517cabd-218b-4611-a804-20db421607d6';  // Tu token de autorización
$url = 'https://baloto.com/api/v1/results/full/';

// Inicializar cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: ' . $token,  // Solo el token sin 'Bearer'
    'User-Agent: MyCustomUserAgent/1.0'
]);

// Ejecutar la solicitud cURL
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Obtener el código HTTP

if (curl_errno($ch)) {
    // Manejar errores de cURL
    $error = ['error' => curl_error($ch)];
    echo json_encode($error, JSON_PRETTY_PRINT);
} else {
    // Responder con el código HTTP y la respuesta de la API
    $result = json_decode($response, true);// Decodificar la respuesta JSON de la API
    echo json_encode($result, JSON_PRETTY_PRINT);
}

// Cerrar cURL
curl_close($ch);
?>
