<?php

namespace Passionatelaraveldev\FalAI\Models;

use Illuminate\Http\JsonResponse;
use Passionatelaraveldev\FalAI\API\BaseApiClient;
use Passionatelaraveldev\FalAI\Contracts\TextToVideoModelInterface;

/**
 * Veed model to generate video from text prompt
 *
 * @see https://fal.ai/models/veed/avatars/text-to-video/api
 */
class Veed implements TextToVideoModelInterface
{
    public function __construct(protected BaseApiClient $client) {}

    /**
     * submit task to generate the video
     *
     * @see Passionatelaraveldev\FalAI\Enums\Veed\AvatarEnum
     */
    public function submit(array $params): JsonResponse
    {
        $res = $this->client->request('post', 'veed/avatars/text-to-video', $params);

        return $this->client->jsonStatusResponse($res);
    }

    // check status of submitted task
    public function checkStatus(string $requestId): JsonResponse
    {
        $res = $this->client->request('get', "veed/avatars/requests/$requestId/status");

        return $this->client->jsonStatusResponse($res);
    }

    // get the final result
    public function getResult(string $requestId): JsonResponse
    {
        $res = $this->client->request('get', "veed/avatars/requests/$requestId");

        return $this->client->jsonStatusResponse($res);
    }
}
