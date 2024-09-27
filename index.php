<?php
$token = 'e517cabd-218b-4611-a804-20db421607d6';  // Tu token de autorización
$url = 'https://baloto.com/api/v1/results/full/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: ' . $token,  // Solo el token sin 'Bearer'
    'User-Agent: MyCustomUserAgent/1.0'
]);

$response = curl_exec($ch);
// Obtener el código de respuesta HTTP
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    // Manejar errores de curl
    echo 'Error:' . curl_error($ch);
} else {
    echo 'HTTP Code: ' . $httpCode . "\n";  // Muestra el código de respuesta
    // Procesar la respuesta
    echo "Response: \n";
    echo $response;;  // Muestra la respuesta
}

curl_close($ch);
?>
