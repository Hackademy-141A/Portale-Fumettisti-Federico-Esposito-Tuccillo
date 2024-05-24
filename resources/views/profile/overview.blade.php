<x-layout>
    <x-authorcard
    username="{{ $user->username }}"
    name="{{ $user->name }}"
    short_description="{{ $user->short_description }}"
    img="{{ $user->img }}"
    writer="{{ $user->name }}"
    hrefbyUser="{{ route('article.byUser',['user'=>$user->id] ) }}"
    
    
    
    />
</x-layout>