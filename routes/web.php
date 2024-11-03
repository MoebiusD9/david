<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    // return view('welcome');


    $users = User::get();

    // $users = User::create([
    //     'name' => 'John Doe',
    //     'email' => 'johndoe@gmail.com',
    //     'password' => 'password'
    // ]);

    // $users = User::find(5)->update([
    //     'name' => 'John Doe Updated'
    // ]);

    // $users = User::find(5)->delete();
    // $users = DB::table('users')->where('id', 3)->update([
    //     'password' => 'password1'
    // ]);

    // $users = DB::table('users')->where('id', 3)->delete();



    // $users = DB::delete("delete from users where id = ?", ['2']);
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
