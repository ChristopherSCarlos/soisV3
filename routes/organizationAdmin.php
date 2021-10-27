<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontpage;
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

require_once "../routes/organizationAdmin.php";

Route::group(['middleware' => [
            'auth:sanctum',
            'verified',
]], function(){
        Route::get('/dashboardAdmin', function(){
            return view('dashboard');
        })->name('dashboardAdmin');
        
        Route::get('/pages', function(){
            return view('admin.pages');
        })->name('pages');

        Route::get('/articles', function(){
            return view('admin.articles');
        })->name('articles');

        Route::get('/organizations', function(){
            return view('admin.organizations');
        })->name('organizations');

        Route::get('/users', function(){
            return view('admin.users');
        })->name('users');

        Route::get('/roles', function(){
            return view('admin.roles');
        })->name('roles');

        Route::get('/events', function(){
            return view('admin.events');
        })->name('events');

        Route::get('/announcements', function(){
            return view('admin.announcements');
        })->name('announcements');

        Route::get('/tags', function(){
            return view('admin.tags');
        })->name('tags');

});


Route::get('/{urlslug}', FrontPage::class);
Route::get('/', FrontPage::class);
