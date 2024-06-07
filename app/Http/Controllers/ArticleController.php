<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleStoreRequet;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{
    // Permetti solo agli utenti loggati di accedere alla pagina
    public function __construct()
    {
        $this->middleware('auth')->except('index','show', 'byUser', 'profile.show');
    }
    
    
    //Funzione per mostrare agli utenti ospiti e non loggati tutti i profili degli utenti che hanno inserito articoli
    
    
    // Mostra la pagina di index degli Articoli dell'utente loggato
    public function index(Request $request)
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        
        // Carica gli articoli con la relazione 'author'
        // $articles = Article::with('author')->get();
        return view('article.index', compact( 'articles'));
        // Ottieni solo gli articoli dell'utente attualmente autenticato
    }
    //  ['articles' => $articles]);
    
    // Mostra il singolo Articolo dell'utente loggato
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);
        return view('article.show', ['article' => $article]);
        
    }
    
    // Mostra la pagina di creazione di un nuovo Articolo
    public function create()
    {
        return view('article.create');
    }
    
    // Mostra la pagina di modifica di un Articolo dell'utente loggato
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }
    
    // Aggiorna un Articolo dell'utente loggato
    public function update(ArticleUpdateRequest $request, Article $article)
{
    // E ora sfruttiamo la ArticleUpdateRequest per validare i dati

    // Verifica se un nuovo file immagine è stato inviato
    if ($request->hasFile('img')) {
        // Elimina l'immagine precedente se esiste
        if ($article->image) {
            Storage::delete($article->image);
        }
        
        // Carica e memorizza la nuova immagine
        $article->image = $request->file('img')->store('public/images');
    }

    $article->update([
        'title' => $request->input('title'),
        'subtitle' => $request->input('subtitle'),
        'article_description' => $request->input('article_description'),
        'category_id' => $request->input('category_id'),
        'comic_number' => $request->input('comic_number'),
        'comic_year' => $request->input('comic_year'),
        
    ]);
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image) {
                Storage::delete($article->image);
            }
            
            // Store new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/article_images', $imageName);
            
            // Update user image path
            $article->update(['image' => 'article_images/' . $imageName]);
        }
        
        
        
        
        // Sincronizza i tag
        $tags = explode(',', $request->input('tags'));
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        $tagIds = [];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag]);
            $tagIds[] = $newTag->id;
        }
        $article->tags()->sync($tagIds);
        
        
        
        return redirect()->route('article.index','id')->with('success', 'Articolo aggiornato con successo!');
    }
    
    //! Salva un nuovo Articolo
    //?Vecchia versione store 2.0
    public function store(ArticleStoreRequet $request)
    {
        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        
        $article = Article::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'article_description' => $request->input('article_description'),
            'category_id' => $request->input('category_id'),
            'author_id' => auth()->id(),
            'image' => $request->file('image')->store('public/images'), 
            'comic_number' => $request->input('comic_number'),
            'comic_year' => $request->input('comic_year'),
            'is_accepted' => NULL,
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image) {
                Storage::delete($article->image);
            }
            
            // Store new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/article_images', $imageName);
            
            // Update user image path
            $article->update(['image' => 'article_images/' . $imageName]);
        }
        
        
        
        // Sincronizza i tag
        $tags = explode(',', $request->input('tags'));
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }
        $tagIds = [];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(['name' => $tag]);
            $tagIds[] = $newTag->id;
        }
        $article->tags()->sync($tagIds);
        
        
        return redirect()->route('article.index', 'article')->with('message', 'Articolo inserito con successo!');
    }
    
    
    
    //**************************************************************************************************** */
    
    
    
    // Elimina un Articolo dell'utente loggato
    public function destroy(Article $article)
    {
        $article = Article::findOrFail($article->id);
        // Verifica che l'utente loggato sia l'autore dell'articolo
        if ($article->author_id === auth()->id()) {
            $article->delete();
            return redirect()->route('article.index','id')->with('success', 'Articolo eliminato con successo!');
        } else {
            return redirect()->back()->with('error', 'Non sei autorizzato a eliminare questo articolo.');
        }
    }
    
    public function byUser(User $user){
        if (!$user){
            return redirect()->back()->with('error', 'Utente non disponibile.');
        }
        //Funzione per mostrare gli articoli dell'utente loggato
        $articles = Article::where('author_id', $user->id)->get();
        //Vista da mostrare
        return view('article.byUser', compact('articles', 'user'));
    }
    
    
}
