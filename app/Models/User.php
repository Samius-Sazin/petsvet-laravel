<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; 
use App\Models\PostComment;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $photo
 * @property string|null $photo_public_id
 * @property string|null $location
 * @property string|null $bio
 * @property int $role
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Roles constants
    public const ROLE_ADMIN = 0;
    public const ROLE_USER = 1;
    public const ROLE_VET = 2;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'photo_public_id',
        'role',
        'location',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'integer',
        'photo_public_id' => 'string',
    ];
    
    // --- Helper Methods ---

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function isVet(): bool
    {
        return $this->role === self::ROLE_VET;
    }

    

    /**
     * A user can ask many questions
     */
    public function questions(): HasMany
    {
        return $this->hasMany(QnaQuestion::class);
    }

    /**
     * A user can write many answers
     */
    public function answers(): HasMany
    {
        return $this->hasMany(QnaAnswer::class);
    }

    /**
     * A user can write many comments on posts
     */
    public function postComments(): HasMany
    {
        return $this->hasMany(PostComment::class);
    }
}