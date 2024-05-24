<x-layout>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif


    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-1">Tutti i Fumettisti</h1>
                <div class="container">
                    @php
                    $chunks = $user->chunk(4); // Dividi gli articoli in gruppi di massimo 4
                    @endphp
                    @forelse ($chunks as $chunk)
                    <div class="row">
                        @foreach ($chunk as $article)
                        <div class="col-12 col-md-3 mb-5">
                            {{-- @dd($article); --}}
                            <x-card 
                            
                            username="{{ $user->title }}"

                            name="{{ $user->subtitle }}"

                            short_description="{{ $user->user_description }}"

                            img="{{ $user->image }}"

                            writer="{{ $user->name }}"


                            hrefbyUser="{{ route('article.byUser',['user'=>$article->user->id] ) }}"

                            hrefShow="{{ route('article.show', compact('article')) }}"

                            href="{{ route('article.show', compact('article')) }}"
                            
                            />
                        </div>
                        @endforeach
                    </div>
                    @empty
                    <div class="col-12">
                        <p>Questo utente non ha ancora inserito articoli!</p>
                    </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</x-layout>
