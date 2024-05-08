<x-layout>

    <h1>Questo è il index.blade.php del profilo</h1>

    <div class="container col-12 col-md-4 mt-5">

        <div class="card">

            <img src="{{ $user->img }}" class="card-img-top" alt="Profile Image">

            <div class="card-body">

                <h5 class="card-title">{{ $user->artist_name }}</h5>

                <p class="card-text">Phone: {{ $user->phone }}</p>

                <p class="card-text">Address: {{ $user->company_address }}</p>

                <p class="card-text">{{ $user->short_description }}</p>

                <a href="{{ route('profile.show','id', $user->id) }}" class="btn btn-primary">Mostra Profilo</a>

            </div>

        </div>

    </div>

    

</x-layout>
