<?php

declare(strict_types=1);

namespace Tests\Traits;

use Trade\Api\Exception\InvalidSignatureException;
use Exception;
use Trade\Api\Exception\TradeApiException;

trait ExceptionsDataProviderTrait
{
    protected function exceptionsDataProvider(): array
    {
        return [
            ['Not_Existing_Error_Code_Mamoy_Klyanus!', TradeApiException::class],
            ['INVALID_SIGNATURE', InvalidSignatureException::class],
        ];
    }
}
