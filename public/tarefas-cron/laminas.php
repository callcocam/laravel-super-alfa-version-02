<?php

$response = $client->post('api/excluirlaminas', [
    'form_params' => ['test'=>date("Ymd")],//passar params para o post
    'headers' => $headers
]);

var_dump(json_decode($response->getBody(), true));
