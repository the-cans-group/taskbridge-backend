<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notification_settings';

    protected $fillable = ['tenant_id', 'event_key', 'notify_requester', 'notify_assignee'];
}
