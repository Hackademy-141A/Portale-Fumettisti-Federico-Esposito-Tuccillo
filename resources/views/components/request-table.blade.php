<table class="table table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col-12">#</th>
            <th scope="col-12">Nome</th>
            <th scope="col-12">Email</th>
            <th scope="col-12">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user )
        <tr>
            <th scope="row"> {{$user->id}} </th>
            <td> {{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td>
                @switch($role)
                @case('admin')
                <form action="{{route('admin.setAdmin', compact('user'))}} method="POST" ">
                    @csrf
                    @method('PATCH')
                    <td><button type="submit" class="btn btn-info text-white">Attiva {{$role}} </button></td>
                </form>
                @break
                @case('revisor')
                <form action="{{route('admin.setRevisor', compact('user'))}} method="POST" ">
                    @csrf
                    @method('PATCH')
                    <td><button type="submit" class="btn btn-info text-white">Attiva {{$role}} </button></td>
                </form>
                @break
                @case('writer')
                <form action="{{route('admin.setWriter', compact('user'))}} method="POST" ">
                    @csrf
                    @method('PATCH')
                    <td><button type="submit" class="btn btn-info text-white">Attiva {{$role}} </button></td>
                </form>
                @break
                
                @endswitch
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>