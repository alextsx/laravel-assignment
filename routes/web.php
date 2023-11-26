<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleDamageEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VehicleController;
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

Route::get('/', function () {
    return view('home');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//only authenticated users can view search history
Route::get('/search', [SearchController::class, 'search'])
    ->middleware(['auth', 'verified'])
    ->name('search');

Route::get('/search-history', [SearchController::class, 'history'])
    ->middleware(['auth', 'verified'])
    ->name('search-history');





Route::get('/damage-event/{id}', [VehicleDamageEventController::class, 'show'])
    //alternative is $this->authorize('view', VehicleDamageEvent::class); in DamageEventController
    ->middleware(['auth', 'verified', 'can:view,App\Models\VehicleDamageEvent'])
    ->whereNumber('id')
    ->name('damage-event');

Route::get('/damage-event/new', [VehicleDamageEventController::class, 'showCreateForm'])
    ->middleware(['auth', 'verified', 'can:create,App\Models\VehicleDamageEvent'])
    ->name('damage-event.createForm');

Route::post('/damage-event', [VehicleDamageEventController::class, 'create'])
    ->middleware(['auth', 'verified', 'can:create,App\Models\VehicleDamageEvent'])
    ->name('damage-event.create');

Route::get('/damage-event/{id}/edit', [VehicleDamageEventController::class, 'showEditForm'])
    ->middleware(['auth', 'verified', 'can:update,App\Models\VehicleDamageEvent'])
    ->whereNumber('id')
    ->name('damage-event.editForm');

Route::put('/damage-event/{id}/edit', [VehicleDamageEventController::class, 'update'])
    ->middleware(['auth', 'verified', 'can:update,App\Models\VehicleDamageEvent'])
    ->whereNumber('id')
    ->name('damage-event.update');

Route::delete('/damage-event/{id}', [VehicleDamageEventController::class, 'delete'])
    ->middleware(['auth', 'verified', 'can:delete,App\Models\VehicleDamageEvent'])
    ->whereNumber('id')
    ->name('damage-event.delete');



Route::get('/vehicle/new', [VehicleController::class, 'showCreateForm'])
    ->middleware(['auth', 'verified', 'can:create, App\Models\Vehicle'])
    ->name('vehicle.createForm');

Route::post('/vehicle', [VehicleController::class, 'create'])
    ->middleware(['auth', 'verified', 'can:create,App\Models\Vehicle'])
    ->name('vehicle.create');

Route::get('/vehicle/{id}/edit', [VehicleController::class, 'showEditForm'])
    ->middleware(['auth', 'verified', 'can:update,App\Models\Vehicle'])
    ->whereNumber('id')
    ->name('vehicle.editForm');

Route::put('/vehicle/{id}/edit', [VehicleController::class, 'update'])
    ->middleware(['auth', 'verified', 'can:update,App\Models\Vehicle'])
    ->whereNumber('id')
    ->name('vehicle.update');


Route::get('users', [UserController::class, 'list'])
    ->middleware(['auth', 'verified', 'can:viewAny,App\Models\User'])
    ->name('users');

Route::put('user/{id}/toggle-premium', [UserController::class, 'togglePremium'])
    ->middleware(['auth', 'verified', 'can:update,App\Models\User'])
    ->whereNumber('id')
    ->name('user.togglePremium');



require __DIR__ . '/auth.php';
