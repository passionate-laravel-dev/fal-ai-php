<?php

namespace Passionatelaraveldev\FalAI\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response as FacadesResponse;

trait HasStatusResponse
{
    /**
     * response with status for api response handle
     */
    public function jsonStatusResponse(Response $res): JsonResponse
    {
        if ($res->successful()) {
            return FacadesResponse::json([
                'status' => 'success',
                'resData' => $res->json(),
            ]);
        }

        if ($res->unauthorized()) {
            return FacadesResponse::json([
                'status' => 'error',
                'message' => $res->json('detail') ?? 'Unauthorized',
            ], 401);
        }

        Log::error('FAL API error response', [
            'status' => $res->status(),
            'body' => $res->body(),
        ]);

        return FacadesResponse::json([
            'status' => 'error',
            'message' => $res->json('detail') ?? 'Unexpected error happen',
        ], $res->status());
    }
}
