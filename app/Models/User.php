<?php

namespace App\Models;

use App\Models\Contracts\UserAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static create(array $validated)
 * @method static where(string $field, string $value)
 */
class User extends UserAuthenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return HasMany
     */
    public function polls()
    {
        return $this->hasMany(Poll::class);
    }

    /**
     * @return HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
