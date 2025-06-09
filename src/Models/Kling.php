<?php

namespace Passionatelaraveldev\FalAI\Models;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\FalAI\API\BaseApiClient;
use Passionatelaraveldev\FalAI\Contracts\TextToVideoModelInterface;

/**
 * Kling video v2.1 model to generate video from text prompt
 *
 * @see https://fal.ai/models/fal-ai/kling-video/v2.1/master/text-to-video/api
 */
class Kling implements TextToVideoModelInterface
{
    public function __construct(protected BaseApiClient $client) {}

    /**
     * submit task to generate the video
     *
     * @see Passionatelaraveldev\FalAI\Enums\AspectRatioEnum, Passionatelaraveldev\FalAI\Enums\Kling\DurationEnum
     */
    public function submit(array $params): JsonResponse
    {
        $res = $this->client->request('post', 'fal-ai/kling-video/v2.1/master/text-to-video', $params);

        return $this->client->jsonStatusResponse($res);
    }

    // check status of submitted task
    public function checkStatus(string $requestId): JsonResponse
    {
        $res = $this->client->request('get', "fal-ai/kling-video/requests/$requestId/status");

        return $this->client->jsonStatusResponse($res);
    }

    // get the final result
    public function getResult(string $requestId): JsonResponse
    {
        $res = $this->client->request('get', "fal-ai/kling-video/requests/$requestId");

        return $this->client->jsonStatusResponse($res);
    }
}
