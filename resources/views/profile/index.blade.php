<x-layout>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    
    <style>
        .container-fluid {
            padding: 0 15px;
        }
        
        .row {
            margin-top: 20px; /* Add margin between rows */
        }
        
        .col-12.col-md-3 {
            margin-bottom: 20px; /* Add margin to the bottom of each card */
        }
    </style>
    
    <div class="container-fluid mt-5">
        @php
        $chunks = $users->chunk(4);
        @endphp
        
        <div class="row mt-5 text-center">
            <div class="col-12">
                <h1 class="display-3">Tutti i Fumettisti</h1>
                <div class="container">
                    <div class="row ">
                        @forelse ($users as $user)
                        <div class="col-12 col-md-6">
                            <x-authorcard 
                                username="{{ $user->username }}"
                                name="{{ $user->name }}"
                                bio="{{ $user->short_description }}"
                                img="{{ $user->image }}"
                                phone="{{ $user->phone }}"
                                hrefbyUser="{{ route('article.byUser',['user'=>$user->id] ) }}"
                                hrefProfile="{{ route('profile.user', ['id' => $user->id]) }}"
                                profile="{{ route('profile.user', ['id' => $user->id]) }}"
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
