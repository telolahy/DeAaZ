<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AttribcourseController extends Controller
{
    function course($id,$idcourse){
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($id);
 
        $user->courses()->attach($idcourse);

        

        foreach ($user->roles as $role) {
            if($role->role=="etudiant"){
                return redirect()->route('etudiant.index');
            }
        }
        return redirect()->route('formateur.index');
    }

    function detacher($id,$idcourse){
        if (! Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($id);
        $user->courses()->detach($idcourse);
        foreach ($user->roles as $role) {
            if($role->role=="etudiant"){
                return redirect()->route('etudiant.index');
            }
        }
        return redirect()->route('formateur.index');
    }
}
