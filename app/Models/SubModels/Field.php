<?php

namespace App\Models\SubModels;

use App\Models\Types\FieldType;

class Field
{
    //    public FieldType $type; // Type of field, text, checkbox, selection, date, ...
    public string $type; // Type of field, text, checkbox, selection, date, ...

    public ?string $label; // The label or name of the field

    public bool $required; // Whether the field is required

    public ?array $options; // For fields like selection, checkbox, this holds options

    public ?string $format; // For fields like date, number, this can hold specific formats or formulas

    public ?string $formula; // For fields like number, currency, this can hold formulas

    public ?int $groupLimit; // For User field types that may have group limits

    public ?array $columns; // For table field type columns

    public ?int $rows;

    public function __construct(array $attributes)
    {
        $this->type = $attributes['type'] ?? null;
        $this->name = isset($attributes['label'])
            ? $this->generateUniqueName($attributes['label'])
            : null;
        $this->label = $attributes['label'] ?? null;
        $this->required = $attributes['required'] ?? null;
        $this->options = array_map(function ($option, $index) {
            return [
                'id' => $index + 1,
                'label' => $option,
            ];
        }, $attributes['options'] ?? [], array_keys($attributes['options'] ?? []));
        $this->format = $attributes['format'] ?? null;
        $this->formula = $attributes['formula'] ?? null;
        $this->groupLimit = $attributes['groupLimit'] ?? null;
        $this->columns = $attributes['columns'] ?? [];
        $this->rows = $attributes['rows'] ?? null;
    }

    protected function generateUniqueName($label)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $label))).'-'.uniqid();
    }
}
