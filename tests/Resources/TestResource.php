<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource;

class TestResource extends AutoCastingJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function castings(): array
    {
        return [
          'integer' => fn ($value) => (int) ($value / 100),
        ];
    }
}
