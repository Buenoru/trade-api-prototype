<?php

declare(strict_types=1);

namespace Tests\Unit;

use Trade\Api\Exception\ExceptionFactory;
use PHPUnit\Framework\TestCase;
use Tests\Traits\ExceptionsDataProviderTrait;

class ExceptionFactoryTest extends TestCase
{
    use ExceptionsDataProviderTrait;

    /**
     * @dataProvider exceptionsDataProvider
     */
    public function testExceptions(string $code, string $exception): void
    {
        $this->expectException($exception);

        $error = ['code' => $code];
        ExceptionFactory::create($error);
    }
}
