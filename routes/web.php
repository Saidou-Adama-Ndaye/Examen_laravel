<?php

use App\Models\Type;
use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Referentiel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;

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

Route::get('/', function () {
    $result = DB::select(DB::raw("SELECT COUNT(prenom) as candidats, concat(age, \" ans\") as age FROM candidats GROUP BY age;"));
    $data = "";
    foreach($result as $value) {
        $data .= "['".$value->age."', ".$value->candidats."],";
    }

    $datas = $data;

    $candidats=Candidat::all();
    $formations=Formation::all();
    $referentiels=Referentiel::all()->only([1,2]);
    $types=Type::all();
    return view('welcome',['candidats' =>$candidats, 'formations'=>$formations, 
    'referentiels'=>$referentiels, 'types'=>$types, 'datas'=>$datas]);
})->name('welcome');

Route::resource('formation', FormationController::class);
Route::resource('candidat', CandidatController::class);
Route::resource('type', TypeController::class);
Route::resource('referentiel', ReferentielController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
