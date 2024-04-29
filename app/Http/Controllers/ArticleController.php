<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        // Ottieni solo gli articoli dell'utente attualmente autenticato
        return view('article.index', ['articles' => $articles]);
        
    }
    
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
    //?Vecchia versione store
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
            public function store(Request $request)
            {
                $request->validate([
                    'title' => 'required|string|max:255',
                    'subtitle' => 'nullable|string|max:255',
                    'article_description' => 'required|string',
                    
                ]);
                
                $article = new Article();
                $article->title = $request->input('title');
                $article->subtitle = $request->input('subtitle');
                $article->article_description = $request->input('article_description');
                $article->author = auth()->id(); // Imposta l'ID dell'autore sull'ID dell'utente loggato
                
                $article->save();
                
                return redirect()->route('article.index','id')->with('message', 'Articolo inserito con successo!');
            }
            
            
            
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
            
        }
        