<x-layout>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-1">Tutti i nostri articoli</h1>
                <div class="container">
                    @php
                        $chunks = $articles->chunk(4); // Dividi gli articoli in gruppi di massimo 4
                    @endphp

                    @forelse ($chunks as $chunk)
                        <div class="row">
                            @foreach ($chunk as $article)
                                <div class="col-12 col-md-3 mb-5">
                                    <x-card 
                                        title="{{ $article->title }}"
                                        subtitle="{{ $article->subtitle }}"
                                        body="{{ $article->article_description }}"
                                        :tags="$article->tags"
                                        img="{{ $article->image }}"
                                        writer="{{ $article->user ? $article->user->name : 'Unknown Author' }}" 
                                        hrefbyUser="{{ $article->user ? route('article.byUser', ['user' => $article->user->id]) : '#' }}"
                                        hrefShow="{{ route('article.show', ['article' => $article->id]) }}"
                                        href="{{ route('article.show', ['article' => $article->id]) }}"
                                    />
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="col-12">
                            <a href="{{ route('article.create') }}" class="btn btn-info">Non Ci sono articoli. Clicca qui per inserirne uno.</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
