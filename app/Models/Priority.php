<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Activity;

class Priority extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'level', 'color'];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
