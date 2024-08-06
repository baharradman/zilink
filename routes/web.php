<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserEmail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpeloreController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\User\PermissionController;

//------------------------------------------------------------
//Admin
//------------------------------------------------------------
Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');
    Route::prefix('shop')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('admin.shop.index');
        Route::get('/create', [ShopController::class, 'create'])->name('admin.shop.create');
        Route::post('/store', [ShopController::class, 'store'])->name('admin.shop.store');
        Route::get('/edit/{shop}', [ShopController::class, 'edit'])->name('admin.shop.edit');
        Route::put('/update/{shop}', [ShopController::class, 'update'])->name('admin.shop.update');
        Route::delete('/delete/{shop}', [ShopController::class, 'destroy'])->name('admin.shop.destroy');
    });
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });
    Route::prefix('user')->namespace('User')->group(function () {
        Route::prefix('role')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
            Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
            Route::delete('/delete/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
            Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('admin.user.role.permission-update');
        });
        Route::prefix('permission')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
            Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
            Route::put('/update/{permission}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
            Route::delete('/delete/{permission}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
            Route::get('/permission-form/{permission}', [PermissionController::class, 'permissionForm'])->name('admin.user.permission.permission-form');
            Route::put('/permission-update/{permission}', [PermissionController::class, 'permissionUpdate'])->name('admin.user.permission.permission-update');
        });
        Route::prefix('admin-user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
            Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
            Route::get('/roles/{admin}', [AdminUserController::class, 'roles'])->name('admin.user.admin-user.roles');
            Route::post('/roles/{admin}/store', [AdminUserController::class, 'rolesStore'])->name('admin.user.admin-user.roles.store');
            Route::get('/permissions/{admin}', [AdminUserController::class, 'permissions'])->name('admin.user.admin-user.permissions');
            Route::post('/permissions/{admin}/store', [AdminUserController::class, 'permissionsStore'])->name('admin.user.admin-user.permissions.store');
        });
    });
    
    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index'])->name('admin.link.index');
        Route::get('/create', [LinkController::class, 'create'])->name('admin.link.create');
        Route::post('/store', [LinkController::class, 'store'])->name('admin.link.store');
        Route::get('/edit/{link}', [LinkController::class, 'edit'])->name('admin.link.edit');
        Route::put('/update/{link}', [LinkController::class, 'update'])->name('admin.link.update');
        Route::delete('/delete/{link}', [LinkController::class, 'destroy'])->name('admin.link.destroy');
    });
});

Route::namespace('Auth')->group(function () {
    Route::get('/login-register', [LoginRegisterController::class, 'LoginRegisterForm'])->name('auth.login-register-form');
    Route::middleware('throttle:5,1')->post('/login-register', [LoginRegisterController::class, 'LoginRegister'])->name('auth.login-register');
    Route::get('/login-confirm{token}', [LoginRegisterController::class, 'LoginConfirmForm'])->name('auth.login-confirm-form');
    Route::middleware('throttle:5,1')->post('/login-confirm{token}', [LoginRegisterController::class, 'LoginConfirm'])->name('auth.login-confirm');
    Route::middleware('throttle:5,1')->get('/login-resend-otp{token}', [LoginRegisterController::class, 'loginResendOtp'])->name('auth.login-resend-otp');
    Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('auth.logout');
});
Route::prefix('expelore')->group(function () {
    Route::get('/{category?}', [ExpeloreController::class, 'index'])->name('expelore.index');
});
Route::prefix('shop')->group(function () {
    Route::get('/{shop}', [ExpeloreController::class, 'shop'])->name('expelore.shop');
});
Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

