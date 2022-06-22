<?php

namespace Trade\Api\Contract;

use Trade\Api\HttpRequestEnum;
use Trade\Api\RequestMethodEnum;

interface ApiRequestInterface
{
    public function getRequestMethod(): RequestMethodEnum;

    public function getHttpMethod(): HttpRequestEnum;
}
