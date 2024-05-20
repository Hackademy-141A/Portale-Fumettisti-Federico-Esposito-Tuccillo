<x-layout>
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
            <div class="col-12 col-md-4 mt-4">
                <x-card 
                title="{{$article->title}}"
                
                subtitle="{{$article->subtitle}}"
                
                body="{{$article->body}}"
                
                img="{{$article->img}}"
                
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