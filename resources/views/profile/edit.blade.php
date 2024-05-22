{{-- <x-layout>
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
</x-layout> --}}






<x-layout style="/css/edit-profile.css">
    <link  rel="stylesheet" href="{{asset('css/edit-profile.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
    
    <div class="container-xl px-4 mt-4">
        <h3 class="text-center">Ciao {{$user->name}} qui potrai modificare i tuoi dati personali:</h3>
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="#" target="__blank">Profilo</a>
            <a class="nav-link" href="#" target="__blank"></a>
            <a class="nav-link" href="#" target="__blank"></a>
            <a class="nav-link" href="#"  target="__blank"></a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Immagine Profilo:</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        
                        <img class="img-account-profile rounded-circle mb-4" src="{{Storage::url($user->image ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png')}}" alt="Immagine utente">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">Carica un immagine, MAX: 6MB</div>
                        <!-- Profile picture upload button-->
                        


                        <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <button class="btn btn-primary"> --}}
                                <a class="btn btn-primary" style="color: whitesmoke; text-decoration: none;">
                                    <input type="file" name="image" id="image" for="image">
                                </a>
                            {{-- </button> --}}
                        




                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Informazioni Account: {{$user->username}} </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="username">Username (Come appari agli altri utenti della piattaforma)</label>
                                <input class="form-control" name="username" id="username" type="text" placeholder="Inserisci Nome" value="{{$user->username}}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="name">Nome</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Inserisci Nome" value="{{$user->name}}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="surname">Cognome</label>
                                    <input class="form-control" id="surname" name="surname" for="surname" type="text" placeholder="Enter your first name" value="{{$user->surname}}">
                                </div>
                                <!-- Form Group (last name)-->
                                {{-- <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                                </div> --}}
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                {{-- <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Organization name</label>
                                    <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                                </div> --}}
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="email">E-Mail</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter your email address" value="{{$user->email}}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone">Telefono</label>
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Enter your phone number" value="{{$user->phone}}">
                                </div>
                                <!-- Form Group (birthday)-->
                                {{-- <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                </div> --}}
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Salva modifiche</button>
                        </form>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>