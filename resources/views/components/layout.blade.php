<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <br>
    <br>
    <x-navbar/>
    {{$slot}}
    
    
    {{-- SEZIONE ERRORE UTENTE NON ESISTENTE --}}
    @if (session('error'))
    <div class="modal" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Errore</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('error') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    
    {{--? Footer Sticky Bottom delle pagine.  --}}
    
    
    <x-footer /> 
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorModal = document.getElementById('errorModal');
            if (errorModal) {
                var modal = new bootstrap.Modal(errorModal);
                modal.show();
            }
        });
    </script>
</body>
</html>