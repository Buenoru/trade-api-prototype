<?php

declare(strict_types=1);

namespace Trade\Api;

use GuzzleHttp\Client;

final class ClientFactory
{
    public function __construct(
        private readonly Client $client = new Client()
    ) {
    }

    public function make(): Client
    {
        return $this->client;
    }
}
