<?php

declare(strict_types=1);

namespace Trade\Api\Request;

use Trade\Api\Contract\ApiRequestInterface;
use Trade\Api\HttpRequestEnum;
use Trade\Api\RequestMethodEnum;

class InfoRequest implements ApiRequestInterface
{
    public function __construct(
        public readonly string $pair
    ) {
    }

    public function getRequestMethod(): RequestMethodEnum
    {
        return RequestMethodEnum::INFO;
    }


    public function getHttpMethod(): HttpRequestEnum
    {
        return HttpRequestEnum::POST;
    }
}
