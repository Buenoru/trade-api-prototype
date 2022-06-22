<?php

declare(strict_types=1);

namespace Tests\Integrational;

use GuzzleHttp\Psr7\Response;
use Trade\Api\ApiRequest;
use Trade\Api\Request\TimeRequest;

class TimeRequestTest extends BaseTestAbstract
{
    public function testSuccess()
    {
        $response = [
            "success" => true,
            "time" => 1644322909335
        ];

        $clientFactory = $this->mockHttp([
            new Response(200, [], json_encode($response)),
        ]);

        $request = new ApiRequest($this->clientParams, $clientFactory);

        $info = new TimeRequest();
        $actual = $request->send($info);

        $this->assertEquals($response, $actual);
    }
}
