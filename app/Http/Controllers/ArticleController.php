<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
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
            
        ]);
        
        $article->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'article_description' => $request->input('article_description'),
        ]);
        
        return redirect()->route('article.index','id')->with('success', 'Articolo aggiornato con successo!');
    }
    
    //! Salva un nuovo Articolo
    //?Vecchia versione store 1.0
    // public function store(Request $request)
    // {
        //     $request->validate([
            //         'title' => 'required|string|max:255',
            //         'subtitle' => 'nullable|string|max:255',
            //         'article_description' => 'required|string',
            //         'author' => 'required|integer',
            //     ]);
            
            //     $article = new Article();
            //     $article->title = $request->input('title');
            //     $article->subtitle = $request->input('subtitle');
            //     $article->article_description = $request->input('article_description');
            //     $article->author = auth()->id(); // Imposta l'ID dell'autore sull'ID dell'utente loggato
            
            //     $article->save();
            
            //     return redirect()->route('article.index','id')->with('message', 'Articolo inserito con successo!');
            // }
            
            //?Vecchia versione store 2.0
            public function store(ArticleStoreRequet $request)
            {
                // $article = new Article();
                // $article->title = $request->input('title');
                // $article->subtitle = $request->input('subtitle');
                // $article->article_description = $request->input('article_description');
                // $article->category_id = $request->input('category_id');
                // $article->author_id = auth()->id(); // Associa l'ID dell'utente autenticato come autore dell'articolo
                
                // $article->save();
                
                $article = Article::create([
                    'title' => $request->input('title'),
                    'subtitle' => $request->input('subtitle'),
                    'article_description' => $request->input('article_description'),
                    'category_id' => $request->input('category_id'),
                    'author_id' => auth()->id(),
                    'image' => $request->file('img')->store('public/images'),
                ]);
                    
                    return redirect()->route('article.index', 'article')->with('message', 'Articolo inserito con successo!');
                }
                
                
                
                //**************************************************************************************************** */
                
                
                
                // Elimina un Articolo dell'utente loggato
                public function destroy(Article $article)
                {
                    $article = Article::findOrFail($article->id);
                    // Verifica che l'utente loggato sia l'autore dell'articolo
                    if ($article->author === auth()->id()) {
                        $article->delete();
                        return redirect()->route('article.index','id')->with('success', 'Articolo eliminato con successo!');
                    } else {
                        return redirect()->back()->with('error', 'Non sei autorizzato a eliminare questo articolo.');
                    }
                }
                
                public function byUser(User $user){
                    //Funzione per mostrare gli articoli dell'utente loggato
                    $articles = Article::where('author_id', auth()->id())->get();
                    //Vista da mostrare
                    return view('article.byUser', compact('articles', 'user'));
                }
                
                
            }
            