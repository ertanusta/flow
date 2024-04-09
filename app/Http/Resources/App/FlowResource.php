<?php

namespace App\Http\Resources\App;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'application' => $this->resource->application->name,
            'status' => $this->resource->status,
            'working_count' => $this->resource->working_count,
            'trigger_name' => $this->resource->trigger_name,
        ];
    }

}
