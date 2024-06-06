<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function dashboard()
    {
        
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
        
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
        
    }

    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();
        return redirect()->route('admin.dashboard')->with('message', 'Admin Set!');
    }

    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();
        return redirect()->route('admin.dashboard')->with('message', 'Revisor Set!');
    }


    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();
        return redirect()->route('admin.dashboard')->with('message', 'Writer Set!');
    }
}
