<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\OrdenadoreController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('/auth/login');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/search', [App\Http\Controllers\AulaController::class, 'search']);
// Route::resource('centros', CentroController::class);
// Route::resource('aulas',AulaController::class);
// Route::resource('ordenadores',OrdenadoreController::class);
// Route::resource('programas', ProgramaController::class);
// Route::resource('licencias',LicenciaController::class);
// Route::resource('componentes',ComponenteController::class);
// Route::get('/searcho', [App\Http\Controllers\OrdenadoreController::class, 'searcho']);
// Route::get('/searchl', [App\Http\Controllers\LicenciaController::class, 'searchl']);
// Route::get('/api/ordenadores/{aula_id}', [OrdenadoreController::class, 'getOrdenadoresPorAula']);
Auth::routes();
Route::middleware(['auth'])->group(function () {
    // aquí van todas las rutas protegidas
    Route::get('/search', [App\Http\Controllers\AulaController::class, 'search']);
    Route::resource('centros', CentroController::class);
    Route::resource('aulas',AulaController::class);
    Route::resource('ordenadores',OrdenadoreController::class);
    Route::resource('programas', ProgramaController::class);
    Route::resource('componentes',ComponenteController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('licencias', LicenciaController::class);

    Route::get('/searcho', [App\Http\Controllers\OrdenadoreController::class, 'searcho']);
    Route::get('/searchl', [App\Http\Controllers\LicenciaController::class, 'searchl']);
    Route::get('/api/ordenadores/{aula_id}', [OrdenadoreController::class, 'getOrdenadoresPorAula']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
    Route::get('/licencias/export', [App\Http\Controllers\LicenciaController::class, 'exportExcel'])->name('licencias.export');
   


});

Route::get('/', function () {
    return view('/auth/login');
});



