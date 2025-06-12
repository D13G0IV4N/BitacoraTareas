<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Activity;
use App\Models\User;

class Comment extends Model
{
    // Usamos timestamps manuales (commented_at / edited_at)
    public $timestamps = false;

    protected $fillable = [
        'activity_id',
        'user_id',
        'comment',
        'commented_at',
        'edited_at',
    ];

    protected $dates = [
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
