<x-layout>
    <style>
        body{
            background-color: rgb(52, 112, 146);
            
        }

        .form-control{
            border-radius: 20px;
            border: 1px solid #fff;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5);
        }
    </style>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{--! Form --}}
        <div class="container">
            <div class="mx-auto col-5 text-center">
                <div class="form-control">
                    
                    <form method="POST" action="{{route('login') }}" class="col-10 mx-auto mb-3 p-2 rounded">
                        <h3>Benvenuto Utente</h3>
                        <p>Accedi con i tuoi dati</p>
                        
                        @csrf
                        
                        
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