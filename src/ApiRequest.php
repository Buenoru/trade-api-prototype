<?php

declare(strict_types=1);

namespace Trade\Api;

use Throwable;
use Trade\Api\Contract\ApiRequestInterface;
use Trade\Api\Exception\ExceptionFactory;
use Trade\Api\Exception\TradeApiException;

class ApiRequest
{
    /** @var string @todo это должно быть где-то в конфигурации. */
    private const BASE_URL = 'https://payeer.com/api/trade';

    public function __construct(
        private readonly ClientParams $clientParams,
        private readonly ClientFactory $clientFactory,
    ) {
    }

    /**
     * @throws TradeApiException
     */
    public function send(ApiRequestInterface $apiRequest): array
    {
        $requestMethod = $apiRequest->getRequestMethod()->value;
        $uri = sprintf('%s/%s', self::BASE_URL, $requestMethod);
        $method = $apiRequest->getHttpMethod();
        if (HttpRequestEnum::GET !== $method) {
            $post = json_encode($apiRequest);
        } else {
            $post = null;
        }

        $client = $this->clientFactory->make();

        $headers = [
            'Content-Type' => 'application/json',
            'API-ID' => $this->clientParams->id,
            'API-SIGN' => hash_hmac('sha256', $requestMethod . $post, $this->clientParams->key)
        ];

        try {
            $request = $client->request(
                $method->name,
                $uri,
                [
                    'headers' => $headers
                ]
            );
            $stream = $request->getBody();
        } catch (Throwable $t) {
            ExceptionFactory::create(['code' => $t->getCode(), 'message' => $t->getMessage()]);
        }

        $content = json_decode($stream->getContents(), true);

        if (isset($content['error'])) {
            ExceptionFactory::create($content['error']);
        }

        return $content;
    }
}
