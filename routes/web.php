<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamInviteController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/profile', function(){
    return view('userprofile');
})
->middleware('auth')
->name('profile')
;


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
    });

    Route::middleware(['role:player|admin'])->group(function () {
        Route::get('/teams/create', [TeamController::class, 'create'])
            ->middleware('permission:create team')
            ->name('teams.create');

        Route::post('/teams', [TeamController::class, 'store'])
            ->middleware('permission:create team')
            ->name('teams.store');

        Route::get('/teams/{team}', [TeamController::class, 'show'])
            ->middleware('team.member')
            ->name('teams.show');

        Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])
            ->middleware('team.captain')
            ->name('teams.edit');

        Route::put('/teams/{team}', [TeamController::class, 'update'])
            ->middleware('team.captain')
            ->name('teams.update');

        Route::post('/teams/{team}/invites', [TeamInviteController::class, 'store'])
            ->middleware('team.captain')
            ->name('teams.invites.store');
    });
});


Route::middleware(['auth', 'permission:create team'])->group(function () {
    Route::get('/teams/create', [TeamController::class, 'create'])
        ->name('teams.create');

    Route::post('/teams', [TeamController::class, 'store'])
        ->name('teams.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teams/{team}', [TeamController::class, 'show'])
        ->name('teams.show');
});

require __DIR__.'/auth.php';
