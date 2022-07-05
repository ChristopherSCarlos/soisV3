<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontpage;
use App\Http\Contollers\AuthRolePermsController;
use App\Http\Contollers\CreationTest;
use App\Http\Contollers\CookieController;
use App\Http\Contollers\ArticleCreate;
use App\Http\Contollers\OrgAccArticleCreate;
use App\Http\Contollers\OrganizationCRUD;
use App\Http\Contollers\OrganizationController;
use App\Http\Contollers\AnouncementCRUD;
use App\Http\Contollers\AnnouncementCRUD;
use App\Http\Contollers\UserCRUD;
use App\Http\Contollers\OrgCRUD;



use App\Http\Livewire\Users;
use App\Http\Livewire\SelectedUser;
use App\Http\Livewire\OrganizationPages;
use App\Http\Livewire\PagesUpdateProcess;
use App\Http\Livewire\ViewAnnouncement;
use App\Http\Middleware\isHeadOfStudentServices;


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
            'isHeadOfStudentServices',
            'auth:sanctum',
            'verified',
]], function(){

        Route::resource('admin-articles', 'App\Http\Controllers\ArticleCreate');
        Route::resource('admin-sliders', 'App\Http\Controllers\AdminSlider');
        Route::resource('admin-sois-sub-links', 'App\Http\Controllers\SoisSystemLinks');
        Route::resource('admin-system-assets-type', 'App\Http\Controllers\SystemAssetTypes');
        Route::resource('admin-web-page-type', 'App\Http\Controllers\WebPageType');
        Route::resource('admin-officers', 'App\Http\Controllers\OfficerControl');
        Route::resource('admin-position-titles', 'App\Http\Controllers\PositionTitles');
        Route::resource('admin-organization', 'App\Http\Controllers\OrganizationCRUD');
        Route::resource('admin-announcement', 'App\Http\Controllers\AnnouncementCRUD');
        Route::resource('admin-users', 'App\Http\Controllers\UserCRUD');
        Route::resource('admin-roles', 'App\Http\Controllers\RoleController');
        Route::resource('admin-sub-links', 'App\Http\Controllers\SoisSubLinksCRUD');
        Route::resource('admin-AR-Events', 'App\Http\Controllers\AccomplishEventsCRUD');

        Route::resource('admin-org-articles', 'App\Http\Controllers\OrgAccArticleCreate');

        Route::put('adminorganization/updateBanner/{id}','App\Http\Controllers\AdminOrganization@updateBnner')->name('adminorganization/updateBanner');
        Route::put('adminorganization/updateLogo/{id}','App\Http\Controllers\AdminOrganization@updateLogo')->name('adminorganization/updateLogo');

        Route::get('/admin-default-interfaces', function(){
            return view('admin.default-interfaces');
        })->name('admin-default-interfaces');

        Route::get('/admin-org', function(){
            return view('admin.organizations');
        })->name('admin-org');

        Route::get('/adminArticles', function(){
            return view('admin.articles');
        })->name('adminArticles');

        Route::get('/adminAnnouncements', function(){
            return view('admin.announcements');
        })->name('adminAnnouncements');

        Route::get('/announcements/Admin-deleted-announcements', function(){
            return view('admin.deleted-announcements');
        })->name('articles/Admin-deleted-announcements');

        Route::resource('adminCreateAnnouncement', 'App\Http\Controllers\AdminAnnouncement');


        Route::get('/Adminofficers', function(){
            return view('admin.officers');
        })->name('Adminofficers');

        Route::get('/adminSub-links', function(){
            return view('admin.sub-links');
        })->name('adminSub-links');


        Route::get('/Adminusers', function(){
            return view('admin.users');
        })->name('Adminusers');

        // SUPER ADMIN NAVIGATION FOR MEMBERSHIP SYSTEM
        Route::get('/Adminmemberships', function(){
            return view('admin.sa-member-membership');
        })->name('Adminmemberships');

        Route::get('/AdminUserManagement', function(){
            return view('admin.sa-membership-user-management');
        })->name('AdminUserManagement');

        Route::get('/AdminAcademicOrganization', function(){
            return view('admin.sa-membership-academic-organization');
        })->name('AdminAcademicOrganization');

        Route::get('/AdminNonAcademicOrganization', function(){
            return view('admin.sa-membership-non-academic-organization');
        })->name('AdminNonAcademicOrganization');

        Route::get('/AdminApplicationReqeusts', function(){
            return view('admin.sa-membership-application-requests');
        })->name('AdminApplicationReqeusts');

        Route::get('/AdminAccountRegistrants', function(){
            return view('admin.sa-membership-account-registrants');
        })->name('AdminAccountRegistrants');

        Route::get('/AdminDeclinedApplication', function(){
            return view('admin.sa-membership-declined-applications');
        })->name('AdminDeclinedApplication');

        Route::get('/AdminAcademicApplication', function(){
            return view('admin.sa-membership-academic-application');
        })->name('AdminAcademicApplication');

        Route::get('/AdminNonAcademicApplication', function(){
            return view('admin.sa-membership-non-academic-application');
        })->name('AdminNonAcademicApplication');

        Route::get('/AdminMembershipMembers', function(){
            return view('admin.sa-membership-members');
        })->name('AdminMembershipMembers');

        Route::get('/AdminPaymentDetails', function(){
            return view('admin.sa-membership-payment-details');
        })->name('AdminPaymentDetails');

        // SUPER ADMIN NAVIGATION FOR GPOA SYSTEM
        Route::get('/AdminPartnershipRequests', function(){
            return view('admin.sa-gpoa-partnership-requests');
        })->name('AdminPartnershipRequests');

        Route::get('/AdminPartnershipApplication', function(){
            return view('admin.sa-gpoa-partnership-application');
        })->name('AdminPartnershipApplication');

        Route::get('/AdminApprovedEvents', function(){
            return view('admin.sa-gpoa-approved-events');
        })->name('AdminApprovedEvents');

        Route::get('/AdminDisApprovedEvents', function(){
            return view('admin.sa-gpoa-disapproved-events');
        })->name('AdminDisApprovedEvents');

        Route::get('/AdminApprovedPartnership', function(){
            return view('admin.sa-gpoa-approved-partnership');
        })->name('AdminApprovedPartnership');

        Route::get('/AdminDeclinedPartnership', function(){
            return view('admin.sa-gpoa-decline-partnership');
        })->name('AdminDeclinedPartnership');

        Route::get('/AdminUpcomingEvents', function(){
            return view('admin.sa-gpoa-upcoming-events');
        })->name('AdminUpcomingEvents');

        Route::get('/AdminAccomplishedEvents', function(){
            return view('admin.sa-gpoa-accomplished-events');
        })->name('AdminAccomplishedEvents');

        // SUPER ADMIN NAVIGATION FOR ACCOMPLISHMENT REPORTS SYSTEM
        Route::get('/AdminAREvents', function(){
            return view('admin.sa-accomplishment-ar-events');
        })->name('AdminAREvents'); 

        Route::get('/AdminARGpoaEvents', function(){
            return view('admin.sa-accomplishment-gpoa-events');
        })->name('AdminARGpoaEvents'); 

        Route::get('/AdminAROfficerSignature', function(){
            return view('admin.sa-accomplishment-officers-signature');
        })->name('AdminAROfficerSignature'); 

        Route::get('/AdminARCompiledAccomplishments', function(){
            return view('admin.sa-accomplishment-my-accomplishments');
        })->name('AdminARCompiledAccomplishments'); 

        Route::get('/AdminARAccomplishmentReports', function(){
            return view('admin.sa-accomplishment-accomplishment-reports');
        })->name('AdminARAccomplishmentReports'); 

        Route::get('/AdminARStudentAccomplishments', function(){
            return view('admin.sa-accomplishment-student-accomplishments');
        })->name('AdminARStudentAccomplishments'); 

        Route::get('/AdminARSubmitAccomplishments', function(){
            return view('admin.s-a-page-if-no-data');
        })->name('AdminARSubmitAccomplishments');
});


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
        Route::resource('announcement', 'App\Http\Controllers\AnnouncementCRUD');
        Route::resource('users', 'App\Http\Controllers\UserCRUD');
        Route::resource('roles', 'App\Http\Controllers\RoleController');
        Route::resource('sub-links', 'App\Http\Controllers\SoisSubLinksCRUD');
        Route::resource('AR-Events', 'App\Http\Controllers\AccomplishEventsCRUD');
        // Route::resource('articles', ArticleCreate::class);

        Route::get('announcement/delete/{id}','App\Http\Controllers\AnnouncementCRUD@delete')->name('announcement/delete');


        Route::get('articles/updateImage/{id}','App\Http\Controllers\ArticleCreate@updateImage')->name('articles/updateImage');
        Route::post('articles/updateImageProcess/{id}/{artID}','App\Http\Controllers\ArticleCreate@updateImageProcess')->name('articles/updateImageProcess');
        Route::get('articles/featureNews/{id}','App\Http\Controllers\ArticleCreate@featureNews')->name('articles/featureNews');

        Route::get('articles/unfeatureNews/{id}','App\Http\Controllers\ArticleCreate@unfeatureNews')->name('articles/unfeatureNews');
        

        Route::get('articles/setAsTopNews/{id}','App\Http\Controllers\ArticleCreate@setAsTopNews')->name('articles/setAsTopNews');
        Route::get('articles/NotsetAsTopNews/{id}','App\Http\Controllers\ArticleCreate@NotsetAsTopNews')->name('articles/NotsetAsTopNews');
        Route::get('articles/delete/{id}','App\Http\Controllers\ArticleCreate@delete')->name('articles/delete');


        Route::resource('sadmin-sois-sub-links', 'App\Http\Controllers\SoisSystemLinks');
        Route::resource('sadmin-system-assets-type', 'App\Http\Controllers\SystemAssetTypes');
        Route::resource('sadmin-web-page-type', 'App\Http\Controllers\WebPageType');
        Route::resource('sadmin-officers', 'App\Http\Controllers\OfficerControl');
        Route::resource('sadmin-position-titles', 'App\Http\Controllers\PositionTitles');
        Route::resource('sadmin-organization', 'App\Http\Controllers\OrganizationCRUD');
        Route::resource('admin-sliders', 'App\Http\Controllers\AdminSlider');
        Route::resource('sadmin-sois-sub-links', 'App\Http\Controllers\SASoisSystemLinks');
        Route::resource('sadmin-system-assets-type', 'App\Http\Controllers\SASystemAssetTypes');
        Route::resource('sadmin-web-page-type', 'App\Http\Controllers\SAWebPageType');
        Route::resource('sadmin-officers', 'App\Http\Controllers\SAOfficerControl');
        Route::resource('sadmin-position-titles', 'App\Http\Controllers\SAPositionTitles');
        Route::resource('sadmin-organization', 'App\Http\Controllers\OrganizationCRUD');
        Route::resource('sadmin-sliders', 'App\Http\Controllers\SAAdminSlider');
        Route::resource('sadmin-announcement', 'App\Http\Controllers\SAAnnouncementCRUD');
        Route::resource('sadmin-role', 'App\Http\Controllers\SARoleCRUD');
        Route::resource('sadmin-permission', 'App\Http\Controllers\SAPermissionCRUD');

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

        
        Route::get('/superorganization', function(){
            return view('admin.organizations');
        })->name('superorganization');

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

        Route::get('/viewarticles', function(){
            return view('admin.articles');
        })->name('viewarticles');

        // Route::get('/articles/create', function(){
        //     return view('admin.article-create');
        // })->name('articles/create');

        Route::get('/articles/view/{id}', function(){
            return view('admin.article-update');
        })->name('articles/view');


        Route::get('/sub-links', function(){
            return view('admin.sub-links');
        })->name('sub-links');

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

        Route::get('/upcoming-events', function(){
            return view('admin.upcoming-event');
        })->name('upcoming-events');

        Route::get('/gpoa-events', function(){
            return view('admin.gpoa-events');
        })->name('gpoa-events');

        Route::get('/approved-partnerships', function(){
            return view('admin.approved-partnership');
        })->name('approved-partnerships');

        Route::get('/partnership-application', function(){
            return view('admin.partnership-application');
        })->name('partnership-application');

        Route::get('/approved-events', function(){
            return view('admin.approved-events');
        })->name('approved-events');

        Route::get('/disapproved-events', function(){
            return view('admin.disapproved-events');
        })->name('disapproved-events');

        Route::get('/declined-partnerships', function(){
            return view('admin.declined-partnerships');
        })->name('declined-partnerships');

        Route::get('/declined-partnerships', function(){
            return view('admin.declined-partnerships');
        })->name('declined-partnerships');


        Route::get('Organization/memberships', function(){
            return view('admin.memberships');
        })->name('Organization/memberships');


        // memberships
        Route::get('/memberships', function(){
            return view('admin.memberships');
        })->name('memberships');

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


        // SUPER ADMIN NAVIGATION FOR MEMBERSHIP SYSTEM
        Route::get('/SAmemberships', function(){
            return view('admin.sa-member-membership');
        })->name('SAmemberships');

        Route::get('/SAUserManagement', function(){
            return view('admin.sa-membership-user-management');
        })->name('SAUserManagement');

        Route::get('/SAAcademicOrganization', function(){
            return view('admin.sa-membership-academic-organization');
        })->name('SAAcademicOrganization');

        Route::get('/SANonAcademicOrganization', function(){
            return view('admin.sa-membership-non-academic-organization');
        })->name('SANonAcademicOrganization');

        Route::get('/SAApplicationReqeusts', function(){
            return view('admin.sa-membership-application-requests');
        })->name('SAApplicationReqeusts');

        Route::get('/SAAccountRegistrants', function(){
            return view('admin.sa-membership-account-registrants');
        })->name('SAAccountRegistrants');

        Route::get('/SADeclinedApplication', function(){
            return view('admin.sa-membership-declined-applications');
        })->name('SADeclinedApplication');

        Route::get('/SAAcademicApplication', function(){
            return view('admin.sa-membership-academic-application');
        })->name('SAAcademicApplication');

        Route::get('/SANonAcademicApplication', function(){
            return view('admin.sa-membership-non-academic-application');
        })->name('SANonAcademicApplication');

        Route::get('/SAMembershipMembers', function(){
            return view('admin.sa-membership-members');
        })->name('SAMembershipMembers');

        Route::get('/SAPaymentDetails', function(){
            return view('admin.sa-membership-payment-details');
        })->name('SAPaymentDetails');

        // SUPER ADMIN NAVIGATION FOR GPOA SYSTEM
        Route::get('/SAPartnershipRequests', function(){
            return view('admin.sa-gpoa-partnership-requests');
        })->name('SAPartnershipRequests');

        Route::get('/SAPartnershipApplication', function(){
            return view('admin.sa-gpoa-partnership-application');
        })->name('SAPartnershipApplication');

        Route::get('/SAApprovedEvents', function(){
            return view('admin.sa-gpoa-approved-events');
        })->name('SAApprovedEvents');

        Route::get('/SADisApprovedEvents', function(){
            return view('admin.sa-gpoa-disapproved-events');
        })->name('SADisApprovedEvents');

        Route::get('/SAApprovedPartnership', function(){
            return view('admin.sa-gpoa-approved-partnership');
        })->name('SAApprovedPartnership');

        Route::get('/SADeclinedPartnership', function(){
            return view('admin.sa-gpoa-decline-partnership');
        })->name('SADeclinedPartnership');

        Route::get('/SAUpcomingEvents', function(){
            return view('admin.sa-gpoa-upcoming-events');
        })->name('SAUpcomingEvents');

        Route::get('/SAAccomplishedEvents', function(){
            return view('admin.sa-gpoa-accomplished-events');
        })->name('SAAccomplishedEvents');

        // SUPER ADMIN NAVIGATION FOR ACCOMPLISHMENT REPORTS SYSTEM
        Route::get('/SAAREvents', function(){
            return view('admin.sa-accomplishment-ar-events');
        })->name('SAAREvents'); 

        Route::get('/SAARGpoaEvents', function(){
            return view('admin.sa-accomplishment-gpoa-events');
        })->name('SAARGpoaEvents'); 

        Route::get('/SAAROfficerSignature', function(){
            return view('admin.sa-accomplishment-officers-signature');
        })->name('SAAROfficerSignature'); 

        Route::get('/SAARCompiledAccomplishments', function(){
            return view('admin.sa-accomplishment-my-accomplishments');
        })->name('SAARCompiledAccomplishments'); 

        Route::get('/SAARAccomplishmentReports', function(){
            return view('admin.sa-accomplishment-accomplishment-reports');
        })->name('SAARAccomplishmentReports'); 

        Route::get('/SAARStudentAccomplishments', function(){
            return view('admin.sa-accomplishment-student-accomplishments');
        })->name('SAARStudentAccomplishments'); 

        Route::get('/SAARSubmitAccomplishments', function(){
            return view('admin.s-a-page-if-no-data');
        })->name('SAARSubmitAccomplishments'); 

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
        Route::resource('organizations', 'App\Http\Controllers\OrganizationController');
        Route::resource('orgAnnouncements', 'App\Http\Controllers\AnnouncementOrganizationController');

        Route::resource('oadmin-sliders', 'App\Http\Controllers\OAdminSlider');
        Route::resource('oadmin-announcement', 'App\Http\Controllers\OAnnouncementCRUD');
        Route::resource('oadmin-officers', 'App\Http\Controllers\OOfficerControl');
        Route::resource('oadmin-position-titles', 'App\Http\Controllers\OPositionTitles');
        Route::resource('oadmin-social', 'App\Http\Controllers\OSocialMedia');

        Route::post('/org-store-announcement', 'App\Http\Controllers\AnnouncementOrganizationController@store');

        Route::get('/ar-menu', function(){
            return view('orgAdmin.ar-menu');
        })->name('ar-menu');

        
        Route::get('Organization/articles', function(){
            return view('orgAdmin.articles');
        })->name('Organization/articles');

        Route::get('Organization/organizations', function(){
            return view('orgAdmin.organizations');
        })->name('Organization/organizations');

        Route::get('Organization/events', function(){
            return view('orgAdmin.events');
        })->name('Organization/events');

        Route::get('OrganizationAnnouncements', function(){
            return view('orgAdmin.announcements');
        })->name('OrganizationAnnouncements');

        // Route::post('/org-announcement-create.blade', 'App\Http\Controllers\AnnouncementCRUD@store');


        Route::get('Organization/officers', function(){
            return view('orgAdmin.officers');
        })->name('Organization/officers');

        Route::get('Organization/socials', function(){
            return view('orgAdmin.socials');
        })->name('Organization/socials');

        Route::get('/announcements/org-deleted-announcements', function(){
            return view('orgAdmin.deleted-announcements');
        })->name('articles/org-deleted-announcements');


        Route::get('/upcoming-events', function(){
            return view('admin.upcoming-event');
        })->name('upcoming-events');



        Route::get('Organization/upcoming-events', function(){
            return view('admin.upcoming-event');
        })->name('Organization/upcoming-events');

        Route::get('Organization/gpoa-events', function(){
            return view('admin.gpoa-events');
        })->name('Organization/gpoa-events');

        Route::get('Organization/approved-partnerships', function(){
            return view('admin.approved-partnership');
        })->name('Organization/approved-partnerships');

        Route::get('Organization/partnership-application', function(){
            return view('admin.partnership-application');
        })->name('Organization/partnership-application');

        Route::get('Organization/approved-events', function(){
            return view('admin.approved-events');
        })->name('Organization/approved-events');

        Route::get('Organization/disapproved-events', function(){
            return view('admin.disapproved-events');
        })->name('Organization/disapproved-events');

        Route::get('Organization/declined-partnerships', function(){
            return view('admin.declined-partnerships');
        })->name('Organization/declined-partnerships');





        Route::get('Organization/memberships', function(){
            return view('admin.memberships');
        })->name('Organization/memberships');

        Route::get('Organization/userManagement', function(){
            return view('admin.membership-user-management');
        })->name('Organization/userManagement');

        Route::get('Organization/membershipsMembers', function(){
            return view('admin.membership-members');
        })->name('Organization/membershipsMembers');

        Route::get('Organization/paymentDetails', function(){
            return view('admin.payment-details');
        })->name('Organization/paymentDetails');

        Route::get('Organization/applicationRequest', function(){
            return view('admin.application-requests');
        })->name('Organization/applicationRequest');

        Route::get('Organization/accountRegistrants', function(){
            return view('admin.account-registrants');
        })->name('Organization/accountRegistrants');

        Route::get('Organization/declinedApplications', function(){
            return view('admin.declined-applications');
        })->name('Organization/declinedApplications');

        Route::get('Organization/MyAcademicOrgs', function(){
            return view('admin.my-org-academic');
        })->name('Organization/MyAcademicOrgs');

        Route::get('Organization/MyNonAcademicOrgs', function(){
            return view('admin.my-org-nonacademic');
        })->name('Organization/MyNonAcademicOrgs');

        Route::get('Organization/MyApplicationAcademic', function(){
            return view('admin.my-application-academic');
        })->name('Organization/MyApplicationAcademic');

        Route::get('Organization/MyApplicationNonAcademic', function(){
            return view('admin.my-application-non-academic');
        })->name('Organization/MyApplicationNonAcademic');

        Route::get('Organizations/Messages/Inbox', function(){
            return view('admin.membership-messages');
        })->name('Organizations/Messages/Inbox');

        Route::get('Organizations/Messages/Sent', function(){
            return view('admin.membership-messages-sent');
        })->name('Organizations/Messages/Sent');

        Route::get('Organizations/MyMessages/Inbox', function(){
            return view('admin.membership-my-messages-inbox');
        })->name('Organizations/MyMessages/Inbox');



        // AR ROUTES

        Route::get('Organization/AR-Events', function(){
            return view('admin.ar-events');
        })->name('Organization/AR-Events');

        Route::get('Organization/GPOA/AR-Events', function(){
            return view('admin.ar-gpoa-events');
        })->name('Organization/GPOA/AR-Events');

        Route::get('Organization/accomplishments', function(){
            return view('admin.ar-accomplishments');
        })->name('Organization/accomplishments');

        Route::get('Organization/student-accomplishments', function(){
            return view('admin.ar-student-accomplishments');
        })->name('Organization/student-accomplishments');

        Route::get('Organization/OfficerSignatures', function(){
            return view('admin.ar-officer-signatures');
        })->name('Organization/OfficerSignatures');

        Route::get('Organization/myAccomplishments', function(){
            return view('admin.ar-my-accomplishments');
        })->name('Organization/myAccomplishments');



});



Route::get('/organization/{urlslug}', OrganizationPages::class);
Route::get('/{urlslug}', FrontPage::class);
Route::get('/', FrontPage::class);
