<?php

namespace Trade\Api\Contract;

interface ExceptionInterface
{
    public function getError(): array;
}
