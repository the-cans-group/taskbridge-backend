<?php

namespace App\Models\SubModels;

class Setting
{
    public ?string $accessLevel;

    public ?string $allowUser;
    // ...

    public function __construct(array $attributes)
    {
        $this->accessLevel = $attributes['accessLevel'] ?? null;
        $this->allowUser = $attributes['allowUser'] ?? null;
    }
}
