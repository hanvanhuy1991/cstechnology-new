<?php

use App\Http\Controllers\Admin\Auth\ConfirmPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProtoTypeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TaxonomyController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OptionTypeController;
use App\Http\Controllers\Admin\TaxonController;
use App\Http\Controllers\Admin\TaxonSearchController;
use App\Http\Controllers\Admin\VariantController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Password Confirmation Routes...
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::middleware('auth')
    ->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);

        Route::post('products/{product}/variants/sort', [VariantController::class, 'sortHandle'])->name('products.variants.sort');
        Route::resource('products', ProductController::class);
        Route::resource('products.variants', VariantController::class)->except('show');
        Route::post('option-types/sort', [OptionTypeController::class, 'sortHandle'])->name('option-types.sort');
        Route::resource('option-types', OptionTypeController::class)->except('show');

        Route::get('prototypes/{prototype}/load-option', [ProtoTypeController::class, 'loadOption']);
        Route::resource('prototypes', ProtoTypeController::class)->except('show');

        Route::post('taxonomies/sort', [TaxonomyController::class, 'sortHandle'])->name('taxonomies.sort');
        Route::get('taxonomies/{taxonomy}/jstree', [TaxonomyController::class, 'getTree'])->name('taxonomies.tree');
        Route::resource('taxonomies', TaxonomyController::class);
        Route::get('taxonomies/{taxonomy}/taxon/{taxon}/jstree', [TaxonController::class, 'getTree'])->name('taxons.tree');

        Route::get('taxons/search', TaxonSearchController::class)->name('taxons.search');
        Route::post('taxons/{taxon}/sort', [TaxonController::class, 'sortHandle'])->name('taxons.sort');
        Route::post('taxons', [TaxonController::class, 'store'])->name('taxons.store');
        Route::get('taxons/{taxon}/edit', [TaxonController::class, 'edit'])->name('taxons.edit');
        Route::put('taxons/{taxon}', [TaxonController::class, 'update'])->name('taxons.update');
        Route::delete('taxons/{taxon}', [TaxonController::class, 'destroy'])->name('taxons.destroy');

        Route::post('media', [UploadController::class, 'store'])->name('uploads');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    });
