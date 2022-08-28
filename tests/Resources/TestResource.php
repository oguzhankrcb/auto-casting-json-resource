<?php

namespace Tests\Resources;

use Brick\Money\Money;
use Illuminate\Http\Resources\Json\JsonResource;
use Oguzhankrcb\AutoCastingJsonResource\AutoCastingJsonResource;

class TestResource extends JsonResource
{
    use AutoCastingJsonResource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request)
    {
        return $this->autoCast(parent::toArray($request));
    }

    public function castings(): array
    {
        return [
            'integer' => fn ($value) => (int) ($value / 100),
            Money::class => fn (Money $value) => $value->getMinorAmount()->toInt() / 2,
        ];
    }
}
