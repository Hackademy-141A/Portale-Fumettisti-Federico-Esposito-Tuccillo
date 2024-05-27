<x-layout>
    <style>
        .container{
            margin-top: 10vh;
        }
    </style>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1>Articoli di: {{$user->name}} </h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            @forelse ($articles as $article)
            <div class="col-12 col-md-4 p-4">
                <x-card 

                title="{{$article->title}}"
                
                subtitle="{{$article->subtitle}}"
                
                body="{{$article->article_description}}"
                
                :tags="$article->tags"

                img="{{$article->image}}"
                
                writer="{{$article->user->name}}"
                
                hrefbyUser="{{route('article.byUser',['user'=>$article->user->id] )}}"
                
                hrefShow="{{route('article.show', compact('article'))}}"
                
                href="{{route('article.show', compact('article', 'user'))}}"
                />
            </div>
            @empty
            <p>Questo utente non ha ancora caricato nulla.</p>
            @endforelse
            
        </div>
    </div>
</x-layout>