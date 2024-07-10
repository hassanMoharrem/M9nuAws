<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::get('locale/{lang}',[\App\Http\Controllers\LanguageController::class,'switch']);
Route::prefix('admin')->name('api.admin.')->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::post('/data/users', [\App\Http\Controllers\Admin\UserController::class, 'getAllDataUser'])->name('DataUsers');
        Route::post('/create', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('AddUser');
        Route::post('/{id}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('ShowUser');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('UpdateUser');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('DeleteUser');
    });
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::post('/data/categories/{user_id}', [\App\Http\Controllers\Admin\CategoryController::class, 'getAllData'])->name('DataCategories');
        Route::post('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('AddCategory');
        Route::post('/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('ShowCategory');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('UpdateCategory');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('DeleteCategory');
    });
    Route::prefix('products')->name('products.')->group(function () {
        Route::post('/data/products/{category_id}', [\App\Http\Controllers\Admin\ProductController::class, 'getAllData'])->name('DataProducts');
        Route::post('/create', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('AddProduct');
        Route::post('/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('ShowProduct');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('UpdateProduct');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('DeleteProduct');
    });
    Route::prefix('slider')->name('slider.')->group(function () {
        Route::post('/data/slider', [\App\Http\Controllers\Admin\site\SliderController::class, 'getAllData'])->name('DataSlider');
        Route::post('/create', [\App\Http\Controllers\Admin\site\SliderController::class, 'store'])->name('AddSlider');
        Route::post('/{id}', [\App\Http\Controllers\Admin\site\SliderController::class, 'show'])->name('ShowSlider');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\site\SliderController::class, 'update'])->name('UpdateSlider');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\site\SliderController::class, 'destroy'])->name('DeleteSlider');
    });
    Route::prefix('step')->name('step.')->group(function () {
        Route::post('/data/step', [\App\Http\Controllers\Admin\site\StepController::class, 'getAllData'])->name('DataStep');
        Route::post('/create', [\App\Http\Controllers\Admin\site\StepController::class, 'store'])->name('AddStep');
        Route::post('/{id}', [\App\Http\Controllers\Admin\site\StepController::class, 'show'])->name('ShowStep');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\site\StepController::class, 'update'])->name('UpdateStep');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\site\StepController::class, 'destroy'])->name('DeleteStep');
    });
    Route::prefix('advantage')->name('advantage.')->group(function () {
        Route::post('/data/advantage', [\App\Http\Controllers\Admin\site\AdvantageController::class, 'getAllData'])->name('DataAdvantage');
        Route::post('/create', [\App\Http\Controllers\Admin\site\AdvantageController::class, 'store'])->name('AddAdvantage');
        Route::post('/{id}', [\App\Http\Controllers\Admin\site\AdvantageController::class, 'show'])->name('ShowAdvantage');
        Route::post('/update/{id}', [\App\Http\Controllers\Admin\site\AdvantageController::class, 'update'])->name('UpdateAdvantage');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\site\AdvantageController::class, 'destroy'])->name('DeleteAdvantage');
    });
});
Route::prefix('users')->name('api.users.')->group(function () {
    Route::post('/profile/show', [\App\Http\Controllers\User\ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/edit', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.edit');
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::post('/data/menus', [\App\Http\Controllers\User\menu\MenuController::class, 'getAllData'])->name('DataCategory');
        Route::post('/create', [\App\Http\Controllers\User\menu\MenuController::class, 'store'])->name('store');
        Route::post('/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'show'])->name('ShowCategory');
        Route::post('/update/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'update'])->name('UpdateCategory');
        Route::post('/delete/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'destroy'])->name('DeleteCategory');
    });
    Route::prefix('products')->name('products.')->group(function () {
        Route::post('/data/products/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'getAllDataProduct'])->name('DataProducts');
        Route::post('/create', [\App\Http\Controllers\User\menu\MenuController::class, 'storeProduct'])->name('store');
        Route::post('/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'showProduct'])->name('ShowProduct');
        Route::post('/update/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'updateProduct'])->name('UpdateProduct');
        Route::post('/delete/{id}', [\App\Http\Controllers\User\menu\MenuController::class, 'destroyProduct'])->name('DeleteProduct');


    });
});
