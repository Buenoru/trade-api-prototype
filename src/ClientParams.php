<?php

declare(strict_types=1);

namespace Trade\Api;

class ClientParams
{
    public function __construct(
        readonly public string $id,
        readonly public string $key,
    )
    {
    }
}
