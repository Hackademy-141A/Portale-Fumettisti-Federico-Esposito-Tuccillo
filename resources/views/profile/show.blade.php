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
                        <div class="row">
                            @forelse ($users as $user)
                            <div class="col-12 col-md-3 mb-5">
                                <x-authorcard 
                                username="{{ $user->username }}"
                                name="{{ $user->name }}"
                                bio="{{ $user->short_description }}"
                                img="{{ $user->image }}"
                                phone="{{ $user->phone }}"
                                hrefbyUser="{{ route('article.byUser',['user'=>$user->id] ) }}"
                                />
                            </div>
                            @empty
                            <div class="col-12">
                                <p>Non ci sono profili disponibili...</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
</x-layout>