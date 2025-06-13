<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // <-- Importar SoftDeletes
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Activity;

class Category extends Model
{
    use SoftDeletes;  // para lo del borrado logico

    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    protected $dates = ['deleted_at']; // <-- Columna para borrado lógico

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
