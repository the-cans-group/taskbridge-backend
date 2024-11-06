<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModuleData extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['user_id', 'module_id', 'title', 'comment', 'tagged_users', 'values', 'attachments', 'status', 'tags', 'is_archive'];

    protected $casts = [
        'tagged_users' => 'array',
        'values' => 'array',
        'attachments' => 'array',
        'tags' => 'array',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getModule()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}

// @Example
//{
//    "user_id":"1",
//    "module_id":"9d0a2592-ccd7-4009-a5b1-914354c7d320",
//    "title":"Test Title",
//    "comment":"comment @1 dmkdmek @2",
//    "values": [
//        {
//            "Name": "Test Name",
//            "Category": "Option1",
//            "Date": "2023-12-31",
//            "Quantity": 10,
//            "Price": 100.50,
//            "Table_Data": {
//            "rows": [
//                    {
//                        "Column1": "Row1Col1",
//                        "Column2": 9
//                    },
//                    {
//                        "Column1": "Row2Col1",
//                        "Column2": 15
//                    }
//                ]
//            }
//        }
//    ],
//    "attachments": [
//        {
//            "link": [
//                {
//                    "url":"dkjebkde",
//                    "text":"nslwn"
//                }
//            ],
//            "priority": "p0"
//        }
//    ]
//}
