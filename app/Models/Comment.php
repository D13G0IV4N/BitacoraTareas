<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Activity;
use App\Models\User;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at', 'commented_at', 'edited_at'];

    protected $fillable = [
        'activity_id',
        'user_id',
        'comment',
        'commented_at',
        'edited_at',
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
