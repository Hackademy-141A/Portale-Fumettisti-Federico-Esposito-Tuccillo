<x-layout>
    <div class="container-fluid d-flex justify-content-center">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="display-5">Modifica il Tuo Profilo Qui!</h1>
                <p>Sezione Informazioni Profilo: <span style="color: red">{{ Auth::user()->name ?? 'Utente'}}</span> </p>
            </div>
            <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Numero</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                    <div class="mb-3">
                        <label for="company_address" class="form-label">Indirizzo compagnia</label>
                        <input type="text" class="form-control" id="company_address" name="company_address" value="{{$user->company_address}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="short_description" class="form-label">Breve Descrizione</label>
                    <input type="text" class="form-control" id="short_description" name="short_description" value="{{$user->short_description}}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine Profilo:</label>
                    <input name="image" type="file" accept="image/jpg,image/jpeg,image/webp" id="image" class="form-control">
                </div>
                

                <button type="submit" class="btn btn-primary">Invia</button>
                
            </form>
        </div>
    </div>
</x-layout>