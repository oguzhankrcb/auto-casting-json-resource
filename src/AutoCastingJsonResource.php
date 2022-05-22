<?php

namespace Oguzhankrcb\AutoCastingJsonResource;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class AutoCastingJsonResource extends JsonResource
{
    abstract public function castings(): array;

    public function excludedColumns(): array
    {
        return [
            'id',
        ];
    }

    public function toArray($request)
    {
        $data = parent::toArray($request);

        return $this->autoCast($data);
    }

    private function getKnownTypes(): array
    {
        return [
            'boolean',
            'integer',
            'double',
            'string',
        ];
    }

    private function isValueIsKnownType($valueType): bool
    {
        if (in_array($valueType, $this->getKnownTypes())) {
            return true;
        }

        return false;
    }

    private function autoCast($data)
    {
        $castingKeys = array_keys($this->castings());

        foreach ($data as $key => $value) {
            if (in_array($key, $this->excludedColumns())) {
                continue;
            }

            if (is_object($value) && in_array(get_class($value), $castingKeys)) {
                $castingFunction = $this->castings()[$value];
                $newValue = $castingFunction($value);

                $data[$key] = $newValue;

                continue;
            }

            $valueType = gettype($value);

            if ($this->isValueIsKnownType($valueType) && in_array($valueType, $castingKeys)) {
                $castingType = $this->castings()[$valueType];
                $newValue = $value;

                if (is_callable($castingType)) {
                    $newValue = $castingType($newValue);
                } else {
                    settype($newValue, $castingType);
                }

                $data[$key] = $newValue;

                continue;
            }

            if (is_array($value)) {
                $data[$key] = $this->autoCast($value);
            }
        }

        return $data;
    }
}
