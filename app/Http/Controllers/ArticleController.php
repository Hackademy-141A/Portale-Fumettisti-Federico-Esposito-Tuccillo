<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequet;

class ArticleController extends Controller
{
    // Permetti solo agli utenti loggati di accedere alla pagina
    public function __construct()
    {
        $this->middleware('auth')->except('index','show', 'byUser');
    }
    
    // Mostra la pagina di index degli Articoli dell'utente loggato
    public function index(Request $request)
    {
        $articles = Article::all();
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
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'article_description' => 'required|string',
            'category_id' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
        ]);
        
        $article->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'article_description' => $request->input('article_description'),
            'category_id' => $request->input('category_id'),
            'image' => $request->file('image')->store('public/images'),
            
        ]);
        
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
            
        ]);
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
        //Funzione per mostrare gli articoli dell'utente loggato
        $articles = Article::where('author_id', $user->id)->get();
        //Vista da mostrare
        return view('article.byUser', compact('articles', 'user'));
    }
    
    
}
