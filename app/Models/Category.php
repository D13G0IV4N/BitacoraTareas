<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Activity;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
