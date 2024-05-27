<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', //titolo del fumetto
        'subtitle', //sottotitolo del fumetto
        'article_description', //descrizione fumetto
        'comic_number', //Numero del fumetto    
        'comic_year', //Anno del fumetto
        'author_id', // Modifica il nome della colonna per l'ID dell'autore
        'category_id', // Modifica il nome della colonna per l'ID della categoria
        'image', //Immagine del fumetto
    ];
    
    // Definisci la relazione con l'autore
    public function author_id(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }
    
    // Definisci la relazione con la categoria
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany{
        return $this->BelongsToMany(Tag::class);
    }
}
