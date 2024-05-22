<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    //* permetti solo a chi è loggato di accedere alla pagina
    public function __construct(){
        $this->middleware('auth');
    }
    
    //* Mostra la pagina di index del profilo dell'utente loggato
    public function index(Request $request){
        return view('profile.index', ['user' => $request->user()]);
    }
    
    // public function create(Request $request){
    //     return view('profile.create');
    // }
    
    //* Mostra il profilo del singolo utente loggato
    public function show(Request $request){
        return view('profile.show', ['user' => $request->user()]);
    }
    
    //* Mostra la pagina di modifica del profilo dell'utente loggato
    public function edit(Request $request){
        return view('profile.edit', ['user' => $request->user()]);
    }
    
    //* Mostra la pagina di aggiornamento del profilo dell'utente loggato
    public function update(ProfileUpdateRequest $request, $user)
    {
        $profile = User::findOrFail($user);
        
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'surname' => $request->input('surname'),
            'phone' => $request->input('phone'),
            'company_address' => $request->input('company_address'),
            'short_description' => $request->input('short_description'),
            'image' => $request->input('image'),
            'email' => $request->input('email'),
            'image' => $request->file('image')->store('public/images'),
        ];
        
        // Controllo se è stato caricato un nuovo file immagine
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName); // Salva l'immagine nel percorso specificato
            $data['image'] = 'images/' . $imageName; // Imposta il percorso dell'immagine nel database
        }
        
        // Aggiorna il profilo con i nuovi dati
        $profile->update($data);
        
        return redirect()->route('home')->with('success', 'Profilo aggiornato con successo!');
    }
    
    //* Funzione store per i profili nuovi
    public function store(Request $request, $user)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable|alpha_num',
            'company_address' => 'required',
            'short_description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $profile = new User();
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->company_address = $request->company_address;
        $profile->short_description = $request->short_description;
        
        // Controllo se è stato caricato un nuovo file immagine
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $profile->image = 'images/' . $imageName;
        }
        
        $profile->save();
        
        return redirect()->route('home')->with('message', 'Profilo creato con successo!');
    }
    
    
    //* Mostra la pagina di eliminazione del profilo dell'utente loggato
    public function destroy(Request $request){
        return view('profile.destroy', ['user' => $request->user()]);
    }
    
}
