<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priority extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'priorities';

    protected $fillable = ['name', 'day', 'hour', 'minute'];
}
