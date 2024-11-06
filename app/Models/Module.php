<?php

namespace App\Models;

use App\Models\SubModels\Field;
use App\Models\SubModels\Setting;
use App\Models\SubModels\Workflow;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['category_id', 'name', 'short_description', 'fields', 'workflows', 'settings', 'queue_users'];

    protected $casts = [
        'fields' => 'array',
        'workflows' => 'array',
        'settings' => 'array',
        'queue_users' => 'array',
    ];

    public function getFieldsAttribute($value): array
    {
        $decoded = json_decode($value, true);

        return is_array($decoded) ? array_map(fn ($item) => new Field($item), $decoded) : [];
    }

    public function getWorkflowsAttribute($value): array
    {
        $decoded = json_decode($value, true);

        return is_array($decoded) ? array_map(fn ($item) => new Workflow($item), $decoded) : [];
    }

    public function getSettingsAttribute($value): array
    {
        $decoded = json_decode($value, true);

        return is_array($decoded) ? array_map(fn ($item) => new Setting($item), $decoded) : [];
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function workflows()
    {
        return $this->hasMany(Workflow::class);
    }
}

// @Example
//{
//    "category_id": "9cfa86a1-0960-4a70-af2a-8c4391c749e6",
//    "name": "Advanced Module",
//    "short_description": "Advanced module with multiple fields.",
//    "long_description": "This module contains various fields and configurations for advanced usage.",
//    "fields": [
//        {
//            "type": "text",
//            "label": "Name",
//            "required": true
//        },
//        {
//            "type": "select",
//            "label": "Category",
//            "options": ["Option1", "Option2"],
//            "required": false
//        },
//        {
//            "type": "date",
//            "label": "Date",
//            "format": "date",
//            "required": true
//        },
//        {
//            "type": "number",
//            "label": "Quantity",
//            "formula": "SUM",
//            "required": true
//        },
//        {
//            "type": "currency",
//            "label": "Price",
//            "formula": "SUM",
//            "required": true
//        },
//        {
//            "type": "table",
//            "label": "Table Data",
//            "columns": ["Column1", "Column2"],
//            "rows": [
//            ["Row1Col1", "Row1Col2"],
//            ["Row2Col1", "Row2Col2"]
//        ],
//            "formula": "SUM",
//            "required": false
//        }
//    ],
//    "workflows": [
//        {"step": 1, "assign_user_id":"1", "action": "create"},
//        {"step": 2, "assign_user_id":"2", "action": "review"},
//        {"step": 3, "assign_user_id":"3", "action": "publish"}
//    ],
//    "settings": [
//        {"key": "access_level", "value": "admin"},
//        {"key": "version", "value": "1.0.0"}
//    ]
//}
