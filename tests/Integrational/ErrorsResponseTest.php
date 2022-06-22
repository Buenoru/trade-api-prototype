<?php

declare(strict_types=1);

namespace Tests\Integrational;

use GuzzleHttp\Psr7\Response;
use Tests\Traits\ExceptionsDataProviderTrait;
use Trade\Api\ApiRequest;
use Trade\Api\Request\TimeRequest;

class ErrorsResponseTest extends BaseTestAbstract
{
    use ExceptionsDataProviderTrait;

    /**
     * @dataProvider exceptionsDataProvider
     */
    public function testError(string $code, string $exception)
    {
        $this->expectException($exception);

        $response = [
            "error" => ['code' => $code],
        ];

        $clientFactory = $this->mockHttp([
            new Response(200, [], json_encode($response)),
        ]);

        $request = new ApiRequest($this->clientParams, $clientFactory);

        $info = new TimeRequest();

        $request->send($info);
    }
}
