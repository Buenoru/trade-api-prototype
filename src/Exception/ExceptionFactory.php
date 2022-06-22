<?php

declare(strict_types=1);

namespace Trade\Api\Exception;

/**
 * Подразумевается, что на каждый код ошибки своё исключение.
 * Это не обязательно, но так удобнее будет их при необходимости разбросать по тапам. Например по критичности.
 * {@link https://github.com/payeer/docs/blob/main/trade-api/ru.md#%D0%BE%D1%88%D0%B8%D0%B1%D0%BA%D0%B8}.
 */
class ExceptionFactory
{
    /**
     * @param array{"code": string} $error
     * @return void
     * @throws TradeApiException
     */
    public static function create(array $error): void
    {
        $code = $error['code'];
        $class = mb_strtolower($code);
        $class = preg_replace_callback('~_([A-z])~', fn($f) => mb_strtoupper($f[1]), $class);
        $class = sprintf('%s\%sException', __NAMESPACE__, ucfirst($class));

        if (class_exists($class)) {
            throw new $class($error);
        } else {
            throw new TradeApiException($error);
        }
    }
}
