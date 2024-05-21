<x-layout>
    <style>
        .cardb {
    --background: linear-gradient(to left, #f7ba2b 0%, #ea5358 100%);
    width: 500px;
    height: 500px;
    padding: 5px;
    border-radius: 1rem;
    overflow: visible;
    background: #f7ba2b;
    background: var(--background);
    position: relative;
    z-index: 1;
}

.cardb::after {
    position: absolute;
    content: "";
    top: 30px;
    left: 0;
    right: 0;
    z-index: -1;
    height: 100%;
    width: 100%;
    transform: scale(0.8);
    filter: blur(25px);
    background: #f7ba2b;
    background: var(--background);
    transition: opacity .5s;
}

.cardb-body {
    --color: #181818;
    background: var(--color);
    color: var(--color);
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    overflow: visible;
    border-radius: .7rem;
}

.cardb .cardb-title {
    font-weight: bold;
    letter-spacing: .1em;
}

.cardb:hover::after {
    opacity: 0;
}

.cardb:hover .cardb-body {
    color: #f7ba2b;
    transition: color 1s;
}

#btnb {
    padding: 10px 20px!important;
    text-transform: uppercase;
    border-radius: 8px;
    font-size: 17px;
    font-weight: 500;
    color: #ffffff80;
    text-shadow: none;
    background: transparent;
    cursor: pointer;
    box-shadow: transparent;
    border: 1px solid #ffffff80;
    transition: 0.5s ease;
    user-select: none;
}

.leggianchorindexb {
    color: whitesmoke;
    text-decoration: none; /* Rimuove la linea sotto l'ancora */
}

#btnb:hover,
#btnb:focus {
    color: #ffffff;
    background: #008cff;
    border: 1px solid #008cff;
    text-shadow: 0 0 5px #ffffff, 0 0 10px #ffffff, 0 0 20px #ffffff;
    box-shadow: 0 0 5px #008cff, 0 0 20px #008cff, 0 0 50px #008cff,
                0 0 100px #008cff;
}

    </style>
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="display-4 fst-italic">Stai leggendo: {{$article->title}}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                
                <div class="cardb col-5">
                    <div class="card-infob">
                        <img class="img-fluid p-2 rounded-4" src="{{Storage::url($article->image)}}" alt=""></img>
                        
                    </div>
                </div>
                
                
                {{-- <div class="col-5 ">
                </div> --}}
                
                
                <div class="col-7">
                    <h1 class="display-1">{{$article->subtitle}}</h1>
                    <p >{{$article->body}}</p>
                    @if (Auth::id()== $article->author_id)
                    <a class="btn btn-warning container-fluid" href="{{route('article.edit', compact('article'))}}">Modifica</a>
                    <form  class="container-fluid" method="POST" action="{{route('article.destroy', compact('article'))}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Elimina Articolo</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        
        
        
    </x-layout>