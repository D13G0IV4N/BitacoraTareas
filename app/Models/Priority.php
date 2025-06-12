<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Activity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priority extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'level', 'color'];
}

class Priority extends Model
{
    protected $fillable = [
        'name',
        'level',
        'color',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
