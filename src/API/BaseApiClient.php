<?php

namespace Passionatelaraveldev\FalAI\API;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Passionatelaraveldev\FalAI\Concerns\HasAuth;
use Passionatelaraveldev\FalAI\Concerns\HasStatusResponse;

class BaseApiClient
{
    use HasAuth;
    use HasStatusResponse;

    /**
     * api base url
     */
    private string $apiBaseUrl;

    public function __construct(
        string $falKey,
        string $apiBaseUrl
    ) {
        $this->apiBaseUrl = $apiBaseUrl;
        $this->authFrom($falKey);
    }

    /**
     * get full api endpoint
     */
    public function getFullUrl(string $url): string
    {
        return rtrim($this->apiBaseUrl, '/').'/'.ltrim($url, '/');
    }

    /**
     * general request
     */
    public function request(string $method, string $url, ?array $params = []): Response
    {
        return Http::withHeaders($this->getHeaders())->{$method}($this->getFullUrl($url), $params);
    }

    /**
     * get headers
     */
    protected function getHeaders(?array $headers = []): array
    {
        $authHeaders = $this->authHeader();
        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];

        return array_merge($authHeaders, $defaultHeaders, $headers);
    }
}
