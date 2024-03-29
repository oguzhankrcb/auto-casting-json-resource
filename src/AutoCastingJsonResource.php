<?php

namespace Oguzhankrcb\AutoCastingJsonResource;

trait AutoCastingJsonResource
{
    abstract public function casts(): array;

    /**
     * @return string[]
     */
    public function excludedColumns(): array
    {
        return [
            'id',
        ];
    }

    /**
     * @return string[]
     */
    private function getKnownTypes(): array
    {
        return [
            'boolean',
            'integer',
            'double',
            'string',
        ];
    }

    /**
     * @param $value
     * @param $isValueTypeOfClass
     * @return bool
     */
    private function isValueInCastings($value, $isValueTypeOfClass = false): bool
    {
        return $isValueTypeOfClass === false
            ? array_key_exists($value, $this->casts())
            : array_key_exists(get_class($value), $this->casts());
    }

    /**
     * @param string $valueType
     * @return bool
     */
    private function isValueIsKnownType(string $valueType): bool
    {
        if (in_array($valueType, $this->getKnownTypes())) {
            return true;
        }

        return false;
    }

    /**
     * @param string $key
     * @param array $data
     * @return bool
     *
     * @see \Tests\Unit\AutoCastingJsonResourceTest::it_must_exclude_columns_in_excluded_columns_array()
     */
    private function isKeyExcluded(string $key): bool
    {
        return in_array($key, $this->excludedColumns());
    }

    /**
     * @param $key
     * @param $value
     * @param array $data
     * @return bool
     *
     * @see \Tests\Unit\AutoCastingJsonResourceTest::it_must_cast_object_type_values()
     */
    private function isValueIsObjectAndInCastings($key, $value, array &$data): bool
    {
        if (
            is_object($value) &&
            $this->isValueInCastings($value, true)
        ) {
            $castingFunction = $this->casts()[get_class($value)];
            $newValue = $castingFunction($value);

            $data[$key] = $newValue;

            return true;
        }

        return false;
    }

    /**
     * @param $key
     * @param $value
     * @param array $data
     * @return bool
     *
     * @see \Tests\Unit\AutoCastingJsonResourceTest::it_must_cast_known_types()
     */
    private function isValueIsKnownTypeAndInCastings($key, $value, array &$data): bool
    {
        $valueType = gettype($value);

        if ($this->isValueIsKnownType($valueType) && $this->isValueInCastings($valueType)) {
            $castingType = $this->casts()[$valueType];
            $newValue = $value;

            if (is_callable($castingType)) {
                $newValue = $castingType($newValue);
            } else {
                settype($newValue, (string) $castingType);
            }

            $data[$key] = $newValue;

            return true;
        }

        return false;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function autoCast($data)
    {
        foreach ($data as $key => $value) {
            if (
                $this->isKeyExcluded($key) ||
                $this->isValueIsObjectAndInCastings($key, $value, $data) ||
                $this->isValueIsKnownTypeAndInCastings($key, $value, $data)
            ) {
                continue;
            }


            if (is_array($value)) {
                $data[$key] = $this->autoCast($value);
            }
        }

        return $data;
    }
}
