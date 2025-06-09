<?php

namespace Passionatelaraveldev\FalAI;

use Passionatelaraveldev\FalAI\API\BaseApiClient;
use Passionatelaraveldev\FalAI\Contracts\TextToVideoModelInterface;
use Passionatelaraveldev\FalAI\Enums\ModelEnum;
use Passionatelaraveldev\FalAI\Models\Kling;
use Passionatelaraveldev\FalAI\Models\Veed;
use Passionatelaraveldev\FalAI\Models\Veo3;

class FalAI
{
    protected BaseApiClient $client;

    public function __construct(
        string $falKey,
        string $apiBaseUrl = 'https://queue.fal.run'
    ) {
        $this->client = new BaseApiClient($falKey, $apiBaseUrl);
    }

    /** text to video model */
    public function textToVideoModel(ModelEnum $model): TextToVideoModelInterface {
        return match($model) {
            ModelEnum::KLING => new Kling($this->client),
            ModelEnum::VEED => new Veed($this->client),
            ModelEnum::VEO3 => new Veo3($this->client)
        };
    }
}
