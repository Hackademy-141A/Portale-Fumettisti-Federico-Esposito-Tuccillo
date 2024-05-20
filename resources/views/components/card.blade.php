<div>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{Storage::url($img)}}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$title}}</h4>
            <h5 class="card-text">{{$subtitle}}</h5>
            <p class="card-text">{{Str::limit($body,10)}}</p>
            <a href="{{$hrefbyUser}}">Pubblicato da {{$writer}}</a>
            <a href="{{$hrefShow}}" class="btn btn-warning">Vai al dettaglio</a>
        </div>
    </div>
</div>