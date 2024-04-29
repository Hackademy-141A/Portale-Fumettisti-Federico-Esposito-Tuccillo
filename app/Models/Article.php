<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'subtitle',
        'article_description',
        'author', // Modifica il nome della colonna per l'ID dell'autore
    ];

    // Definisci la relazione con l'autore
    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }
}
