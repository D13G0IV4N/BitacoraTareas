<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Actividades que creó este usuario.
     */
    public function activitiesCreated()
    {
        return $this->hasMany(Activity::class, 'created_by');
    }

    /**
     * Actividades asignadas a este usuario.
     */
    public function activitiesAssigned()
    {
        return $this->hasMany(Activity::class, 'assigned_to');
    }

    /**
     * Categorías creadas por este usuario.
     */
    public function categories()
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    /**
     * Comentarios realizados por este usuario.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
