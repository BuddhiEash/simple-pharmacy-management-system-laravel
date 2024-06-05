<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\HttpStatusCodes;

class RecordResource extends JsonResource
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
            'data' => $this['data'] ?? '',
        ];
    }

    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('Status Code', $this['status_code'] ?? HttpStatusCodes::SUCCESS);
    }
}
