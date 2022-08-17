<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AttributionController extends Controller
{

    function roles($id, $idrole)
    {
        // dd($id);
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($id);

        $user->roles()->attach($idrole);
        return redirect()->route('utilisateur.index');
    }

    function detacher($id, $idrole)
    {
        // dd($id);
        if (!Gate::allows('admin')) {
            abort(403);
        }
        $user = User::find($id);

        $user->roles()->detach($idrole);
        return redirect()->route('utilisateur.index');
    }
}
