<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    protected $fillable = [
        'message',
        'user_send_id',
        'user_receive_id',
    ];

    public function user_send(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_send_id');
    }

    public function user_receive(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_receive_id');
    }
}
