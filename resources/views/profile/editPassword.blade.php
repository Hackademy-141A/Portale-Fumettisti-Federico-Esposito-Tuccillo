<x-layout>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <body class="p-5 mt-5">
        
    
    <div class="container-xl px-4 mt-4">
        <div class="card mb-4">
            <div class="card-header">Cambia password</div>
            <div class="card-body">
                <form action="{{ route('profile.update-password', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Form Group (current password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="current_password">Password attuale</label>
                        <input class="form-control" id="current_password" name="current_password" type="password" placeholder="Inserisci la password attuale" required>
                    </div>
                    <!-- Form Group (new password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="new_password">Nuova Password</label>
                        <input class="form-control" id="new_password" name="new_password" type="password" placeholder="Inserisci la nuova password" required>
                    </div>
                    <!-- Form Group (confirm password)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="confirm_password">Conferma Nuova Password</label>
                        <input class="form-control" id="confirm_password" name="new_password_confirmation" type="password" placeholder="Conferma la nuova password" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Salva</button>
                    
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</x-layout>