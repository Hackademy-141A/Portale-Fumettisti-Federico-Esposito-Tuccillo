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
        'author_id', // Modifica il nome della colonna per l'ID dell'autore
        'category_id', // Modifica il nome della colonna per l'ID della categoria
        'image',
    ];
    
    // Definisci la relazione con l'autore
    public function author_id(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'author_id');
    }
    
    // Definisci la relazione con la categoria
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
