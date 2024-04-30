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
use App\Http\Controllers\PrivacyController;
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
Route::get('/', [HomeController::class, 'index'])->name('de.page.home');
Route::get('/en', [HomeController::class, 'index'])->name('en.page.home');

// Frontend - Contact
Route::get('/kontakt', [ContactController::class, 'index'])->name('de.page.contact.index');
Route::get('/en/contact', [ContactController::class, 'index'])->name('en.page.contact.index');

// Frontend - Worklist
Route::get('/werkliste', [WorklistController::class, 'index'])->name('de.page.worklist.index');
Route::get('/en/worklist', [WorklistController::class, 'index'])->name('en.page.worklist.index');

// Frontend - Office
Route::get('/buero', [OfficeController::class, 'index'])->name('de.page.office.index');
Route::get('/en/office', [OfficeController::class, 'index'])->name('en.page.office.index');
Route::get('/buero/team', [OfficeController::class, 'team'])->name('de.page.office.team');
Route::get('/en/office/team', [OfficeController::class, 'team'])->name('en.page.office.team');

Route::get('/buero/lebenslauf/{slug?}/{teamMember}', [OfficeController::class, 'cv'])->name('de.page.office.cv');
Route::get('/en/office/cv/{slug?}/{teamMember}', [OfficeController::class, 'cv'])->name('en.page.office.cv');
Route::get('/buero/offene-stellen', [OfficeController::class, 'jobs'])->name('de.page.office.jobs');
Route::get('/en/office/vacancies', [OfficeController::class, 'jobs'])->name('en.page.office.jobs');

// Frontend - Projects
Route::get('/projekte/{category?}', [ProjectController::class, 'index'])->name('de.page.project.index');
Route::get('/en/projects/{category?}', [ProjectController::class, 'index'])->name('en.page.project.index');
Route::get('/projekt/{category}/{slug}/{project}', [ProjectController::class, 'show'])->name('de.page.project.show');
Route::get('/en/projects/{category}/{slug}/{project}', [ProjectController::class, 'show'])->name('en.page.project.show');

// Frontend - Discourse
Route::get('/diskurs/{topic?}', [DiscourseController::class, 'index'])->name('de.page.discourse.index');
Route::get('/en/discourse/{topic?}', [DiscourseController::class, 'index'])->name('en.page.discourse.index');

// Frontend - url based images
Route::get('/img/{template}/{filename}/{maxSize?}/{coords?}/{ratio?}', [ImageController::class, 'getResponse']);

// Frontend - Privacy
Route::get('/datenschutz', [PrivacyController::class, 'index'])->name('de.page.privacy.index');
Route::get('/en/privacy', [PrivacyController::class, 'index'])->name('en.page.privacy.index');

// Output testing
// Route::get('/test/team', [TestController::class, 'team']);
// Route::get('/test/jobs', [TestController::class, 'jobs']);
// Route::get('/test/discourse/topic/{topic}', [TestController::class, 'topic']);
// Route::get('/test/discourse/by-topic/{topic:slug}', [TestController::class, 'discourseByTopic']);
// Route::get('/test/project/category/{category}', [TestController::class, 'category']);
// Route::get('/test/project/by-category/{category:slug}', [TestController::class, 'projectByCategory']);
// Route::get('/test/project/grids/{project}', [TestController::class, 'projectGrids']);


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


