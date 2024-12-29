<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function (){

   Volt::route('/register','pages.auth.register')->name('register');
   Volt::route('/login','pages.auth.login')->name('login');

});

Route::middleware('auth')->group(function (){
    Volt::route('/{folder?}','pages.index')->name('index');
});
