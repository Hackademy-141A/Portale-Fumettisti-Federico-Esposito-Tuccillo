<x-layout>
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
                <div class="col-5 ">
                    <img class="img-fluid" src="{{Storage::url($article->image)}}" alt="">
                </div>
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