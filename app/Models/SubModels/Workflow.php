<?php

namespace App\Models\SubModels;

class Workflow
{
    public ?string $step;

    public ?string $assign_user_id;

    public ?string $action;

    // ...

    public function __construct(array $attributes)
    {
        $this->step = $attributes['step'] ?? null;
        $this->assign_user_id = $attributes['assign_user_id'] ?? null;
        $this->action = $attributes['action'] ?? null;
    }
}
