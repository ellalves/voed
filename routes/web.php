<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'subscribed'])
    ->group(function () {

        //Orders
        Route::get('orders', 'OrderController@index')->name('orders.index');

        //Sales
        Route::get('sales', 'SaleController@pdv')->name('sales.pdv');

        /**
         * Companies
         */
        Route::any('search', 'TenantController@search')->name('tenants.search');
        // Route::get('tenants/{idTenant}/categories', 'TenantController@categories')->name('tenants.categories');
        Route::resource('tenants', 'TenantController');

        /**
         * Tables
         */
        Route::get('tables/qrcode/{idTable}', 'TableController@qrcode')->name('tables.qrcode');
        Route::any('tables/search', 'TableController@search')->name('tables.search');
        Route::resource('tables', 'TableController');

        /**
         * Products x Categories
         */
        Route::get('products/{idProduct}/categories/{idCategory}/detach', 'ProductController@productCategoriesDetach')->name('products.categories.detach');
        Route::get('products/{idProduct}/categories/create', 'ProductController@categoriesAvailable')->name('products.categories.available');
        Route::post('products/{idProduct}/categories', 'ProductController@productCategoriesAttach')->name('products.categories.attach');
        Route::get('products/{idProduct}/categories', 'ProductController@categories')->name('products.categories');

        /**
         * Products
         */
        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');

        /**
         * Categories
         */
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');

        /**
         * Users x Roles
         */
        Route::get('users/{id}/roles/{idRole}/detach', 'ACL\RoleUserController@detachUserRole')->name('users.roles.detach');
        Route::any('users/{id}/roles/create', 'ACL\RoleUserController@userRoleAvailable')->name('users.roles.available');
        Route::post('users/{id}/roles', 'ACL\RoleUserController@attachUserRole')->name('users.roles.attach');
        Route::get('users/{id}/roles', 'ACL\RoleUserController@roles')->name('users.roles');

        /**
         * Users
         */
        Route::get('users/profile/{username}', 'UserController@profile')->name('users.profile');

        Route::get('users/create', 'UserController@create')->name('users.create');
        Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
        Route::post('users', 'UserController@store')->name('users.store');
        Route::get('users/{id}/edit', 'UserController@edit')->name('users.edit');
        Route::put('users/{id}', 'UserController@update')->name('users.update');
        Route::any('users/search', 'UserController@search')->name('users.search');
        Route::get('users/show/{id}', 'UserController@show')->name('users.show');
        Route::get('users', 'UserController@index')->name('users.index');

        /**
         * Plans x Groups
         */
        Route::get('plans/{id}/groups/{idGroup}/detach', 'ACL\PlanGroupController@planGroupsDetach')->name('plans.groups.detach');
        Route::post('plans/{id}/groups', 'ACL\PlanGroupController@planGroupsAttach')->name('plans.groups.attach');
        Route::any('plans/{id}/groups/create', 'ACL\PlanGroupController@groupsAvailable')->name('plans.groups.available');
        Route::get('plans/{id}/groups', 'ACL\PlanGroupController@groups')->name('plans.groups');

        /**
         * Groups x Permissions
         */
        Route::get('groups/{id}/permissions/{idPermission}/detach', 'ACL\GroupPermissionController@groupPermissionsDetach')->name('groups.permissions.detach');
        Route::post('groups/{id}/permissions', 'ACL\GroupPermissionController@groupPermissionsAttach')->name('groups.permissions.attach');
        Route::any('groups/{id}/permissions/create', 'ACL\GroupPermissionController@permissionsAvailable')->name('groups.permissions.available');
        Route::get('groups/{id}/permissions', 'ACL\GroupPermissionController@permissions')->name('groups.permissions');

        /**
         * Permissions x Groups
         */
        Route::get('permissions/{id}/groups/{idGroup}/detach', 'ACL\GroupPermissionController@permissionGroupsDetach')->name('permissions.groups.detach');
        Route::post('permissions/{id}/groups', 'ACL\GroupPermissionController@permissionsGroupAttach')->name('permissions.groups.attach');
        Route::any('permissions/{id}/groups/create', 'ACL\GroupPermissionController@groupsAvailable')->name('permissions.groups.available');
        Route::get('permissions/{id}/groups', 'ACL\GroupPermissionController@groups')->name('permissions.groups');

        /**
         * Permissions x Roles
         */
        Route::get('permissions/{idPermission}/roles/{idRole}/detach', 'ACL\PermissionRoleController@PermissionRoleDetach')->name('permissions.roles.detach');
        Route::get('permissions/{id}/roles/create', 'ACL\PermissionRoleController@rolesAvailable')->name('permissions.roles.available');
        Route::post('permissions/{id}/roles', 'ACL\PermissionRoleController@attachRolesPermission')->name('permissions.roles.attach');
        Route::get('permissions/{id}/roles', 'ACL\PermissionRoleController@roles')->name('permissions.roles');

        /**
         * Roles x Permissions
         */
        Route::get('roles/{idRole}/permissions/{idPermission}/detach', 'ACL\PermissionRoleController@rolePermissionDetach')->name('roles.permissions.detach');
        Route::any('roles/{id}/permissions/create', 'ACL\PermissionRoleController@permissionsAvailable')->name('roles.permissions.available');
        Route::post('roles/{id}/permissions', 'ACL\PermissionRoleController@attachPermissionsRole')->name('roles.permissions.attach');
        Route::get('roles/{id}/permissions', 'ACL\PermissionRoleController@permissions')->name('roles.permissions');

        /**
         * Users x Roles
         */
        Route::get('roles/{id}/users/{idUser}/detach', 'ACL\RoleUserController@detachRoleUser')->name('roles.users.detach');
        Route::any('roles/{id}/users/create', 'ACL\RoleUserController@roleUserAvailable')->name('roles.users.available');
        Route::post('roles/{id}/users', 'ACL\RoleUserController@attachRoleUser')->name('roles.users.attach');
        Route::get('roles/{id}/users', 'ACL\RoleUserController@users')->name('roles.users');

        /**
         * Roles
         */
        Route::any('roles/search', 'ACL\RoleController@search')->name('roles.search');
        Route::resource('roles', 'ACL\RoleController');

        /**
         * Routes Permissions
         */
        Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionController');

        /**
         * Subscriptions
         */
        Route::get('subscriptions/resume', 'SubscriptionController@resume')->name('subscriptions.resume');
        Route::get('subscriptions/cancel', 'SubscriptionController@cancel')->name('subscriptions.cancel');
        Route::get('subscriptions/invoices', 'SubscriptionController@invoices')->name('subscriptions.invoices');
        Route::get('subscriptions/invoices/download/{idInvoice}', 'SubscriptionController@downloadInvoice')->name('subscriptions.invoice.download');

        /**
         * Routes Groups
         */
        Route::any('groups/search', 'ACL\GroupController@search')->name('groups.search');
        Route::resource('groups', 'ACL\GroupController');

        /**
         * Routes Details Plans
         */
        Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
        Route::delete('plans/{url}/details/{idPlan}', 'DetailPlanController@destroy')->name('details.plan.destroy');
        Route::get('plans/{url}/details/{idPlan}', 'DetailPlanController@show')->name('details.plan.show');
        Route::put('plans/{url}/details/{idPlan}', 'DetailPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idPlan}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
        Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

        /**
         * Routes Plans
         */
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::post('plans/store', 'PlanController@store')->name('plans.store');
        Route::get('plans', 'PlanController@index')->name('plans.index');

        Route::get('/', 'DashboardController@index')->name('admin.index');
    });

/**
 * Subscriptions
 */
Route::post('subscriptions/store', 'Admin\SubscriptionController@store')->name('subscriptions.store');
Route::get('subscriptions/checkout', 'Admin\SubscriptionController@checkout')->name('subscriptions.checkout');

Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');

// Route::get('/dashboard', function () {
//     Route::get('/', 'PlanController@index')->name('admin.index');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
