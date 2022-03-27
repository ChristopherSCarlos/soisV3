<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontpage;
use App\Http\Contollers\AuthRolePermsController;
use App\Http\Contollers\CreationTest;
use App\Http\Contollers\CookieController;
use App\Http\Contollers\ArticleCreate;
use App\Http\Contollers\OrgAccArticleCreate;
use App\Http\Contollers\OrganizationCRUD;
use App\Http\Contollers\AnouncementCRUD;
use App\Http\Contollers\UserCRUD;
use App\Http\Contollers\OrgCRUD;



use App\Http\Livewire\Users;
use App\Http\Livewire\SelectedUser;
use App\Http\Livewire\OrganizationPages;
use App\Http\Livewire\PagesUpdateProcess;
use App\Http\Livewire\ViewAnnouncement;


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


// Route::get('authredirects', function(){'AuthRolePermsController@index'});
Route::get('/authredirects', 'App\Http\Controllers\AuthRolePermsController@index');

Route::get('/cookie/set','App\Http\Controllers\CookieController@setCookie');
Route::get('/cookie/get','App\Http\Controllers\CookieController@getCookie');

Route::group(['middleware' => [
            'isSuperAdmin',
            'auth:sanctum',
            'verified',
]], function(){

        Route::get('/test/normal/controller', 'App\Http\Controllers\CreationTest@index')->name('test/normal/controller');
        Route::post('/store-form', 'App\Http\Controllers\CreationTest@store');

        Route::get('/article/create', 'App\Http\Controllers\ArticleCreate@index')->name('article/create');
        // Route::get('/article/update/{id}', 'App\Http\Controllers\ArticleCreate@edit')->name('article/update');
        Route::post('/store-article', 'App\Http\Controllers\ArticleCreate@store');

        Route::resource('articles', 'App\Http\Controllers\ArticleCreate');
        Route::resource('organization', 'App\Http\Controllers\OrganizationCRUD');
        Route::resource('announcement', 'App\Http\Controllers\AnouncementCRUD');
        Route::resource('users', 'App\Http\Controllers\UserCRUD');
        Route::resource('roles', 'App\Http\Controllers\RoleController');
        // Route::resource('articles', ArticleCreate::class);

        Route::put('users/addRoleToUser/{id}','App\Http\Controllers\UserCRUD@addRole')->name('users/addRoleToUser');
        Route::put('users/addOrganizationToUser/{id}','App\Http\Controllers\UserCRUD@addOrg')->name('users/addOrganizationToUser');
        Route::put('users/addGateKeyToUser/{id}','App\Http\Controllers\UserCRUD@addKey')->name('users/addGateKeyToUser');
        Route::put('users/addPermissionsToUser/{id}','App\Http\Controllers\UserCRUD@addPerms')->name('users/addPermissionsToUser');
        Route::put('users/addMorePermissionsToUser/{id}','App\Http\Controllers\UserCRUD@addMorePerms')->name('users/addMorePermissionsToUser');
        Route::put('users/addPasswordToUser/{id}','App\Http\Controllers\UserCRUD@addPassword')->name('users/addPasswordToUser');
        Route::get('users/access-control/{id}','App\Http\Controllers\UserCRUD@accessControl')->name('users/access-control');
        
        Route::put('organization/updateBanner/{id}','App\Http\Controllers\OrganizationCRUD@updateBnner')->name('organization/updateBanner');
        Route::put('organization/updateLogo/{id}','App\Http\Controllers\OrganizationCRUD@updateLogo')->name('organization/updateLogo');
        // Route::put('organization/deleteOrg/{id}','App\Http\Controllers\OrganizationCRUD@destroy')->name('organization/deleteOrg');

        


        Route::get('/dashboard', function(){
            return view('admin.dashboards');
        })->name('dashboard');

        Route::get('/default-interfaces', function(){
            return view('admin.default-interfaces');
        })->name('default-interfaces');

        Route::get('/pages', function(){
            return view('admin.pages');
        })->name('pages');

        Route::get('/users', function(){
            return view('admin.users');
        })->name('users');

        Route::get('/roles', function(){
            return view('admin.roles');
        })->name('roles');

        Route::get('/tags', function(){
            return view('admin.tags');
        })->name('tags');

        Route::get('/articles', function(){
            return view('admin.articles');
        })->name('articles');

        // Route::get('/articles/create', function(){
        //     return view('admin.article-create');
        // })->name('articles/create');

        Route::get('/articles/view/{id}', function(){
            return view('admin.article-update');
        })->name('articles/view');



        Route::get('/organizations', function(){
            return view('admin.organizations');
        })->name('organizations');

        Route::get('/events', function(){
            return view('admin.events');
        })->name('events');

        Route::get('/announcements', function(){
            return view('admin.announcements');
        })->name('announcements');

        Route::get('/officers', function(){
            return view('admin.officers');
        })->name('officers');

        Route::get('/ar-links', function(){
            return view('admin.ar-links');
        })->name('ar-links');

        Route::get('/system-pages/create-system-page', function(){
            return view('admin.pages-create-process');
        })->name('system-pages/create-system-page');

        Route::get('/system-pages/update-system-page', function(){
            return view('admin.pages-update-process');
        })->name('system-pages/update-system-page');

        Route::get('/articles/deleted-articles', function(){
            return view('admin.deleted-articles');
        })->name('articles/deleted-articles');

        Route::get('/announcements/deleted-announcements', function(){
            return view('admin.deleted-announcements');
        })->name('articles/deleted-announcements');

        Route::get('/users/deleted-users', function(){
            return view('admin.deleted-users');
        })->name('users/deleted-users');

        Route::get('/admin/membership', function(){
            return view('admin.membership');
        })->name('admin/membership');
        

        Route::get('/admin/nonacads', function(){
            return view('admin.nonacademic');
        })->name('admin/nonacads');

        Route::get('/test', function(){
            return view('livewire.testl-livewire');
        })->name('test');

// 
        

        // Route::get('users/selected-user/{id}', [App\Http\Livewire\SelectedUser::class, 'edit'])->name('user/selected-user');
        
        Route::get('/users-selected-user-{id}', function(){
            return view('admin.selected-users');
        })->name('user-selected-user');

        Route::get('/users-selected-update-{id}', function(){
            return view('admin.update-user');
        })->name('user-selected-update');
        // Route::get('/', function () {
        // });



        // Route::get('/announcements/view-selected-announcements/{$announcement_id}', function(){
        //     return view('admin.view-selected-announcements');
        // })->name('announcements/view-selected-announcements');

        Route::post('/announcements/view-selected-announcements/{announcement_id}', [App\Http\Livewire\ViewAnnouncement::class, 'URLRedirector'])->name('announcements/view-selected-announcements');
        // Route::get('/system-pages/update-system-page/{$pages_id}', [App\Http\Livewire\PagesUpdateProcess::class, 'render'])->name('system-pages/update-system-page');



});

Route::group(['middleware' => [
            'isOrganizationAdmin',
            'auth:sanctum',
            'verified',
]], function(){

        Route::get('/Organization/dashboard', function(){
            return view('orgAdmin.dashboards');
        })->name('Organization/dashboard');


        Route::resource('org-articles', 'App\Http\Controllers\OrgAccArticleCreate');

        
        Route::get('/Organization/articles', function(){
            return view('orgAdmin.articles');
        })->name('Organization/articles');

        Route::get('/Organization/organizations', function(){
            return view('orgAdmin.organizations');
        })->name('Organization/organizations');

        Route::get('/Organization/events', function(){
            return view('orgAdmin.events');
        })->name('Organization/events');

        Route::get('/Organization/announcements', function(){
            return view('orgAdmin.announcements');
        })->name('Organization/announcements');

        Route::get('/Organization/officers', function(){
            return view('orgAdmin.officers');
        })->name('Organization/officers');

        Route::get('/Organization/socials', function(){
            return view('orgAdmin.socials');
        })->name('Organization/socials');

        Route::get('/announcements/org-deleted-announcements', function(){
            return view('orgAdmin.deleted-announcements');
        })->name('articles/org-deleted-announcements');

});



Route::get('/organization/{urlslug}', OrganizationPages::class);
Route::get('/{urlslug}', FrontPage::class);
Route::get('/', FrontPage::class);
