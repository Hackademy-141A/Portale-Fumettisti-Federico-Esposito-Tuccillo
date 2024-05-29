<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'username',
        'surname',
        'company_address',
        'short_description',
        'phone',
        'email',
        'github',
        'instagram',
        'x',
        'image',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    //! Definisci la relazione con gli articoli
    public function articles(): HasMany{
        return $this->hasMany(Article::class, 'author_id');
    }

    protected static function boot(){
        parent::boot();
        static::deleting(function ($user) {
            $user->articles()->update([
                'author_id' => null,
            ]);
        });
    }
}
