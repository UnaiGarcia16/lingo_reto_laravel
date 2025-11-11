<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PalabraController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\RankingController;

Route::get('/', function () {
    return view('lingo.welcome');
});



//Route::get('/palabras', [PalabraController::class, 'index'])->name('palabras.index');
//Route::get('/palabrasStyled', [PalabraController::class, 'indexStyled'])->name('palabras.indexStyled');
//Route::get('/palabrasBlade', [PalabraController::class, 'indexBlade'])->name('palabras.indexBlade');


//Ruta que devuelve de la tabla 'palabras' la cantidad de palabras aleatorias solicitada por URL y sino, devuelve 5 palabras
Route::get('/palabrasRandom/{cantidad?}', [PalabraController::class, 'indexRandom'])->name('palabras.indexRandom');


//Ruta para verificar si una palabra existe en la base de datos
Route::get('/verificarPalabra/{palabra}', [PalabraController::class, 'verificarPalabra'])->name('palabras.verificarPalabra');





//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');





Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');






Route::get('/lingo', function () {
    return view('lingo.index');
})->middleware('auth')->name('lingo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/logout', function (\Illuminate\Http\Request $request) {
    // Cierra la sesión del usuario actual
    Auth::guard('web')->logout(); 

    // Invalida la sesión actual para prevenir el reuso
    $request->session()->invalidate(); 

    // Regenera el token CSRF
    $request->session()->regenerateToken(); 

    // Redirige al usuario a la página de bienvenida
    return redirect()->route('welcome'); 
})->name('logout');


require __DIR__.'/auth.php';
