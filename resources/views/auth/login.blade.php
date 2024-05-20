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
        <div class="container my-5 text-center">
            <div class="row">
                <div class="col-8">
                    
                    <form method="POST" action="{{route('login') }}">
                        
                        @csrf
                        
                        
                        {{-- <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nome">
                            
                        </div>  --}}
                        
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">E-Mail</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="e-Mail">
                            
                        </div>
                        
                        <div class=" mb-3">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        
                        
                        
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                    
                    <a href="{{route('register')}}">Se non sei ancora registrato clicca qui!</a>
                    
                </div>
            </div>
        </div>

                </x-layout>