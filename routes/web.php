<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WorklistController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\DiscourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Auth routes
Auth::routes(['verify' => true, 'register' => false]);
Route::get('/logout', 'Auth\LoginController@logout');

// Frontend - Home
Route::get('/', [HomeController::class, 'index'])->name('page.home');

// Frontend - Projects
Route::get('/projekte/{category?}', [ProjectController::class, 'index'])->name('page.project.index');
Route::get('/projekt/{slug?}/{project}', [ProjectController::class, 'show'])->name('page.project.show');
//Route::get('/projekte/{slug?}/{category}', [ProjectController::class, 'findByCategory'])->name('page.projects.category');

// Frontend - Worklist
Route::get('/werkliste', [WorklistController::class, 'index'])->name('page.worklist.index');

// Frontend - Office
Route::get('/buero', [OfficeController::class, 'index'])->name('page.office.index');

// Frontend - Discourse
Route::get('/diskurs', [DiscourseController::class, 'index'])->name('page.discourse.index');

// Frontend - Contact
Route::get('/kontakt', [ContactController::class, 'index'])->name('page.contact.index');

// Frontend - url based images
Route::get('/img/{template}/{filename}/{maxSize?}/{coords?}/{ratio?}', [ImageController::class, 'getResponse']);

// Output testing
Route::get('/test/team', [TestController::class, 'team']);
Route::get('/test/jobs', [TestController::class, 'jobs']);
Route::get('/test/discourse/topic/{topic}', [TestController::class, 'topic']);
Route::get('/test/discourse/by-topic/{topic:slug}', [TestController::class, 'discourseByTopic']);
Route::get('/test/project/category/{category}', [TestController::class, 'category']);
Route::get('/test/project/by-category/{category:slug}', [TestController::class, 'projectByCategory']);
Route::get('/test/project/grids/{project}', [TestController::class, 'projectGrids']);


/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum', 'verified')->group(function() {
  Route::get('administration/{any?}', function () {
    return view('layout.authenticated');
  })->where('any', '.*')->middleware('role:admin')->name('authenticated');
});


