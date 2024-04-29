<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar/>
    {{$slot}}
    
    
    {{--? Footer Sticky Bottom delle pagine.  --}}


<footer class="footer fixed-bottom bg-light py-5">
    <div class="container text-center">
        <ul class="list-unstyled">
            <li>
                <a href="">Test</a>
                <a href="">Test</a>
                <a href="">Test</a>
            </li>
        </ul>
    </div>
</footer>

</body>
</html>