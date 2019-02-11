<?php
/**
 * Created by PhpStorm.
 * User: paulinho
 * Date: 10/02/19
 * Time: 19:09
 * header payload e signatura
 */

$header = [
    'alg' => 'HS256',
    'typ' => 'JWT'
];

// pega um array em PHP e transforma em Json
$header_json = json_encode($header);
$header_base64 = base64_encode($header_json);
echo "Cabecalho JSON: $header_json";
echo "\n";
echo "Cabecalho JWT: $header_base64";
echo "\n\n";

$payload = [
    'first_name' => 'Paulo',
    'last_name' => 'Henrique',
    'email' => 'paulo.mendes00@hotmail.com',
    'exp' => (new \DateTime())->getTimestamp()
];

$payload_json = json_encode($payload);
$payload_base64 = base64_encode($payload_json);
echo "Payload JSON: $payload_json";
echo "\n";
echo "Payload JWT: $payload_base64";

echo "\n\n";
$key = 'pauloLindoAnaClara124kld54jdixuxu65civic';
echo "\n\n";

$signature = hash_hmac('sha256', "$header_base64.$payload_base64", $key, true);
$signature_base64 = base64_encode($signature);
echo "Assinatura: $signature_base64";

$token = "$header_base64.$payload_base64.$signature_base64";
echo "\n\n";

echo "TOKEN: $token";