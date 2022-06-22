<?php

declare(strict_types=1);

namespace Trade\Api\Exception;

use Exception;
use Trade\Api\Contract\ExceptionInterface;

class TradeApiException extends Exception implements ExceptionInterface
{
    public function __construct(
        protected readonly array $error
    ) {
        // @todo выяснить сигнатуру ответа
        parent::__construct($error['message'] ?? 'Unknown error message');
    }

    public function getError(): array
    {
        return $this->error;
    }
}
