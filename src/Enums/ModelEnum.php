<?php

namespace Passionatelaraveldev\FalAI\Enums;

use Passionatelaraveldev\FalAI\Enums\Kling\DurationEnum as KlingDurationEnum;
use Passionatelaraveldev\FalAI\Enums\Veed\AvatarEnum;
use Passionatelaraveldev\FalAI\Enums\Veo3\DurationEnum;

enum ModelEnum: string
{
    case KLING = 'kling-video';
    case VEED = 'veed';
    case VEO3 = 'veo3';

	/**
	 * validation rules for submit task using model
	 */
	public function rules(): array {
		return match($this) {
			self::VEED => [
				'avatar_id' => 'required|string|in:' . implode(',', AvatarEnum::getValues()),
				'text' => 'required|string'
			],
			self::VEO3 => [
				'prompt' => 'required|string',
				'aspect_ratio' => 'sometimes|string|in:' . implode(',', AspectRatioEnum::getValues()),
				'duration' => 'sometimes|string|in:' . implode(',', DurationEnum::getValues()),
				'negative_prompt' => 'sometimes|string',
				'enhance_prompt' => 'sometimes|boolean',
				'seed' => 'sometimes|integer',
				'generate_audio' => 'sometimes|boolean'
			],
			self::KLING => [
				'prompt' => 'required|string',
				'duration' => 'sometimes|string|in:' . implode(',', KlingDurationEnum::getValues()),
				'aspect_ratio' => 'sometimes|string|in:' . implode(',', AspectRatioEnum::getValues()),
				'negative_prompt' => 'sometimes|string',
				'cfg_scale' => 'sometimes|float'
			]
		};
	}
}
