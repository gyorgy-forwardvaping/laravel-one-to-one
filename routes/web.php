<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/insert', function () {
    $user = User::findOrFail(1);

    $address = new Address(['name' => 'bham woodland farm road 3B']);
    $user->address()->save($address);
});

Route::get('/update', function () {
    // $address = Address::find(1);
    // return $address->user;

    $address = Address::whereUserId(1)->first();

    $address->name = "updated address b240pj";
    $address->save();
});

Route::get('/show', function () {
    $user = User::findOrFail(1);
    return $user->name . ' live under ' . $user->address->name;
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->address()->delete();
    $user->delete();
});
