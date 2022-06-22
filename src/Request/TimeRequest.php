<?php

declare(strict_types=1);

namespace Trade\Api\Request;

use Trade\Api\Contract\ApiRequestInterface;
use Trade\Api\HttpRequestEnum;
use Trade\Api\RequestMethodEnum;

class TimeRequest implements ApiRequestInterface
{
    public function __construct(
    ) {
    }

    public function getRequestMethod(): RequestMethodEnum
    {
        return RequestMethodEnum::TIME;
    }


    public function getHttpMethod(): HttpRequestEnum
    {
        return HttpRequestEnum::GET;
    }
}
