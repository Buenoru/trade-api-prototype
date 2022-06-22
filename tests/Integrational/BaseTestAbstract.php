<?php

declare(strict_types=1);

namespace Tests\Integrational;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use Trade\Api\ClientFactory;
use Trade\Api\ClientParams;

abstract class BaseTestAbstract extends TestCase
{
    protected ClientParams $clientParams;

    protected function setUp(): void
    {
        $this->clientParams = new ClientParams(
            id: '1',
            key: '1'
        );
    }

    protected function mockHttp(array $queue): ClientFactory
    {
        $mock = new MockHandler($queue);
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        return new ClientFactory($client);
    }
}
