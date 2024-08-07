<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Events\UserDeleting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



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
        'is_admin',
        'is_revisor',
        'is_writer',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_revisor' => 'boolean',
        'is_writer' => 'boolean',
        'is_accepted' => 'boolean',
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
    

    protected $dispatchesEvents = [
        'deleting' => UserDeleting::class,
    ];

    
}
