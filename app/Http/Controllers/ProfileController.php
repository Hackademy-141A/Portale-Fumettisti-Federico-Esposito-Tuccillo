<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    
    
    //* permetti solo a chi è loggato di accedere alla pagina
    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    
    //* Mostra la pagina di index del profilo dell'utente loggato
    public function index(Request $request){
        return view('profile.index', ['user' => $request->user()]);
    }
    
    // public function create(Request $request){
        //     return view('profile.create');
        // }
        
        //* Mostra il profilo del singolo utente loggato
        public function show(){
            $users = User::whereHas('articles')->get();
            return view('profile.show', ['users' => $users]);;
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
                'email' => $request->input('email'),
            ];
            
            // Controllo se è stato caricato un nuovo file immagine
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/profile_images', $imageName);
                $data['image'] = 'profile_images/' . $imageName;
            }
            
            // Aggiorna il profilo con i nuovi dati
            $profile->update($data);
            
            return redirect()->route('home')->with('success', 'Profilo aggiornato con successo!');
        }
        
        public function updateImage(Request $request, $id)
        {
            $user = User::findOrFail($id);
            
            $request->validate([
                'image' => 'required|image|max:6144', // max 6MB
            ]);
            
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($user->image) {
                    Storage::delete($user->image);
                }
                
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/profile_images', $imageName);
                
                // Update user image path
                $user->update(['image' => 'profile_images/' . $imageName]);
            }
            
            return redirect()->back()->with('message', 'Immagine del profilo aggiornata con successo');
        }
        
        
        //* Funzione store per i profili nuovi
        public function store(ProfileStoreRequest $request, $user)
        {
            
            $profile = new User();
            $profile->name = $request->name;
            $profile->phone = $request->phone;
            $profile->company_address = $request->company_address;
            $profile->short_description = $request->short_description;


            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($user->image) {
                    Storage::delete($user->image);
                }
                
                // Store new image
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/profile_images', $imageName);
                
                // Update user image path
                $user->update(['image' => 'profile_images/' . $imageName]);
            }
            
            // Controllo se è stato caricato un nuovo file immagine
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->storeAs('public/images', $imageName);
            //     $profile->image = 'images/' . $imageName;
            // }
            
            $profile->save();
            
            return redirect()->route('home')->with('message', 'Profilo creato con successo!');
        }
        
        
        //* Mostra la pagina di eliminazione del profilo dell'utente loggato
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            
            // Verifica se l'utente loggato è lo stesso che si vuole eliminare
            if (Auth::id() !== $user->id) {
                return redirect()->route('home')->with('error', 'Non sei autorizzato a eliminare questo account.');
            }
            
            // Elimina l'immagine del profilo se esiste
            if ($user->image) {
                Storage::delete($user->image);
            }
            
            // Elimina l'utente dal database
            $user->delete();
            
            // Effettua il logout dell'utente
            Auth::logout();
            
            return redirect()->route('home')->with('success', 'Account eliminato con successo.');
        }
        
        public function editPassword(){
            return view('profile.editPassword');
        }
        
        public function updatePassword(Request $request){
            $request->validate([
                'current_password' => 'required',
                'new_password' => ['required', 'confirmed', Password::defaults()],
            ]);
            
            $user = $request->user();
            
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'La password attuale non è corretta']);
            }
            
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            
            return redirect()->route('home')->with('success', 'Password aggiornata con successo!');
            
        }
        
        
        
        
        public function fumettisti(){
            return view('profile.fumettisti');
        }
    }
    
    
    
    