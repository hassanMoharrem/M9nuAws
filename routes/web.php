<?php


use Illuminate\Support\Facades\Route;



Route::post('locale',[\App\Http\Controllers\LanguageController::class,'switch'])->name('language.switch');

Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('site');
Route::get('/{name}',[\App\Http\Controllers\User\menu\MenuController::class, 'index'])->name('menu');
Route::get('/condition/show', [\App\Http\Controllers\Admin\site\ConditionController::class, 'indexNew'])->name('condition.index');
Route::get('/privacy/show', [\App\Http\Controllers\Admin\site\PrivacyController::class, 'indexNew'])->name('privacy.index');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'loginIndex'])->name('login.index');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'login'])->name('login.store');
});
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/login', [\App\Http\Controllers\User\Auth\AuthController::class, 'loginIndex'])->name('login.index');
    Route::post('/login', [\App\Http\Controllers\User\Auth\AuthController::class, 'login'])->name('login.store');
});
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users',[\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/user/show/{id}',[\App\Http\Controllers\Admin\UserController::class, 'showUser'])->name('user.show');
    Route::get('/category/show/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'showCategory'])->name('category.show');
    Route::get('/slider',[\App\Http\Controllers\Admin\site\SliderController::class, 'index'])->name('slider');
    Route::get('/step',[\App\Http\Controllers\Admin\site\StepController::class, 'index'])->name('step');
    Route::get('/condition',[\App\Http\Controllers\Admin\site\ConditionController::class, 'index'])->name('condition');
    Route::get('/privacy',[\App\Http\Controllers\Admin\site\PrivacyController::class, 'index'])->name('privacy');
    Route::get('/advantage',[\App\Http\Controllers\Admin\site\AdvantageController::class, 'index'])->name('advantage');
    Route::get('/social',[\App\Http\Controllers\Admin\site\SocialController::class, 'index'])->name('social');
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:web'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/menu', [\App\Http\Controllers\User\menu\MenuController::class, 'userIndex'])->name('menu.index');
    Route::get('/logout', [\App\Http\Controllers\User\Auth\AuthController::class, 'logout'])->name('logout');
});
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/login', function () {
        return view('user.auth.login');
    })->name('login');
});

