<?php

namespace App\Http\Controllers;

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
    public function create(Request $request){
        return view('profile.create');
    }
    //* Mostra il profilo del singolo utente loggato
    public function show(Request $request){
        return view('profile.show', ['user' => $request->user()]);
    }
    //* Mostra la pagina di modifica del profilo dell'utente loggato
    public function edit(Request $request){
        return view('profile.edit', ['user' => $request->user()]);
    }
    //* Mostra la pagina di aggiornamento del profilo dell'utente loggato
    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:15',
            'phone' => 'nullable|string|max:15',
            'company_address' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'email' => 'nullable|string|email|max:30',
        ]);
        
        $profile->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'company_address' => $request->input('company_address'),
            'short_description' => $request->input('short_description'),
            'email' => $request->input('email'),
        ]);
        
        return redirect()->route('home')->with('success', 'Profilo aggiornato con successo!');
    }
    
    //* Funzione store per i profili nuovi
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable|alpha_num',
            'company_address' => 'required',
            'short_description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $profile = new User();
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->company_address = $request->company_address;
        $profile->short_description = $request->short_description;
        $profile->img = $request->img;
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $profile->img = 'images/' . $imageName;
        }
        
        $profile->save();
        
        return redirect()->route('home')->with('message', 'Profilo creato con successo!');
    }
    
    
    
    
    
    //* Mostra la pagina di eliminazione del profilo dell'utente loggato
    public function destroy(Request $request){
        return view('profile.destroy', ['user' => $request->user()]);
        
    }
    
    
}
