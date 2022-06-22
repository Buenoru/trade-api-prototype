<?php

declare(strict_types=1);

use Trade\Api\ApiRequest;
use Trade\Api\ClientFactory;
use Trade\Api\ClientParams;
use Trade\Api\Exception\InvalidSignatureException;
use Trade\Api\Exception\TradeApiException;
use Trade\Api\Request\InfoRequest;
use Trade\Api\Request\TimeRequest;

require_once __DIR__ . '/vendor/autoload.php';


$clientParams = new ClientParams(id: '1', key: '1');
$clientFactory = new ClientFactory();
$api = new ApiRequest($clientParams, $clientFactory);

try {
    $request = new TimeRequest();
    $response = $api->send($request);
    var_dump($response);
} catch (InvalidSignatureException $e) {
    // отлов специфичной ошибки
    echo $e->getMessage();
} catch (TradeApiException $e) {
    // отлов любой ошибки библиотеки
    echo $e->getMessage();
}


try {
    $request = new InfoRequest('BTC_USD,BTC_RUB');
    $response = $api->send($request);
    var_dump($response);
} catch (TradeApiException $e) {
    echo $e->getMessage();
}

