<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this['status'],
            'message' => $this['message'] ?? '',
            'token' => $this['token'] ?? '',
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('Status Code', $this['status_code'] ?? 200);
    }
}
