<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleDataLog extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['module_data_id', 'action_type', 'comment', 'changes'];

    protected $casts = [
        'changes' => 'array',
    ];

    public function getModuleData()
    {
        return $this->belongsTo(ModuleData::class, 'module_data_id', 'id');
    }
}

// @Example
//{
//    "module_data_id":"9d129787-acda-43b5-8254-a33e437fb461",
//    "action_type": "change_priority",
//    "comment": "The comment..",
//    "changes": {
//      "new_priority": "p0"
//    }
//}

//{
//    "module_data_id":"9d129787-acda-43b5-8254-a33e437fb461",
//    "action_type": "reassign",
//    "comment": "The comment..",
//    "changes": {
//      "user_id": "35425142"
//    }
//}

//{
//    "module_data_id":"9d129787-acda-43b5-8254-a33e437fb461",
//    "action_type": "Confirm",
//    "comment": "The comment..",
//}

//{
//    "module_data_id":"9d25ec32-f0ea-4db1-9fdc-d2edc3c1891a",
//    "action_type": "reassign",
//    "changes": [
//        {
//            "new_user_id":3
//        }
//    ],
//    "auth_user_id":2
//}
