<x-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container p-5">
        <div class="row">
            <div class="col-8">

                <form method="POST" action="{{route('login') }}">

                    @csrf

                    {{-- ? Nome
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nome">
                        
                    </div> --}}
                    {{--? Email --}}

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">E-Mail</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="e-Mail">
                        
                    </div>

                    <div class=" mb-3">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    {{--? Conferma Password --}}
                    {{-- <div class=" mb-3">
                        <label for="passwordConfirmation">Conferma Password</label>
                        <input name="password_confirmation" type="password_confirmation" class="form-control" id="passwordConfirmation" placeholder="Password">
                    </div> --}}

                    <div class="form-check">
                        {{-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> --}}
                        {{-- <label class="form-check-label" for="exampleCheck1">Check me out</label> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>

                <a href="{{route('register')}}">Se non sei ancora registrato clicca qui!</a>

            </div>
        </div>
    </div>
</x-layout>