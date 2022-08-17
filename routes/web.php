<?php

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\AttributionController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AttribcourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    $courses=Course::all();
    return view('ecoleTemplates/index',compact('courses'));
});



Route::middleware(['auth'])->group(function () {
    
    Route::resource('/utilisateur', UtilisateurController::class);
    Route::get('/attributionRoles/{id}/{idrole}', [AttributionController::class ,'roles'])->name('attributionRoles');
    Route::get('/detacherRoles/{id}/{idrole}', [AttributionController::class ,'detacher'])->name('detacherRoles');

    //Attribution cours

    Route::get('/attributionCours/{id}/{idcourse}', [AttribcourseController::class ,'course'])->name('attributionCours');
    Route::get('/detacherCours/{id}/{idcourse}', [AttribcourseController::class ,'detacher'])->name('detacherCours');

    //ADMIN
    Route::middleware(['auth'])->group(function(){
        Route::get('/admin', function () {
             if (! Gate::allows('formateur')) {
                 abort(403);
             }
           
            $users=User::all();
            return view('dashboard/index',compact('users'));
        })->name('admin');

        Route::get('/button', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/button');
        });
        Route::get('/typography', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/typography');
        });
        Route::get('/element', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/element');
        });
        Route::get('/widget', function () {
            if (! Gate::allows('admin')) {
                abort(403);
            }
            return view('dashboard/widget');
        });
        Route::get('/form', function () {
            if (! Gate::allows('admin')) {
                abort(403);
            }
            return view('dashboard/form');
        });
        Route::get('/table', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/table');
        });
        Route::get('/chart', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
           return view('dashboard/chart');
        }); 
        Route::get('/signin', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/signin');
         }); 
         Route::get('/signup', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/signup');
         }); 
         Route::get('/error', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/404');
         }); 
    
         Route::get('/blank', function () {
            if (! Gate::allows('admin')){
                abort(403);
            }
            return view('dashboard/blank');
         }); 
    });

    //COURS
    Route::resource('/cours', CoursController::class); 

    //ETUDIANTS
    Route::resource('/etudiant', EtudiantController::class);




    //FORMATEURS
    Route::middleware(['auth'])->group(function(){
        Route::resource('/formateur', FormateurController::class); 
    }); 
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
