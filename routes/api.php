<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\DiscourseController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ImageGridController;
use App\Http\Controllers\Api\ImageGridItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware('auth:sanctum')->group(function() {
  Route::get('user', [UserController::class, 'find']);

  // Images
  Route::get('images', [ImageController::class, 'get']);
  Route::post('images/order', [ImageController::class, 'order']);
  Route::get('image/{image}', [ImageController::class, 'find']);
  Route::post('image/upload', [ImageController::class, 'upload']);
  Route::post('image', [ImageController::class, 'store']);
  Route::put('image/coords/{image}', [ImageController::class, 'coords']);
  Route::put('image/{image}', [ImageController::class, 'update']);
  Route::get('image/state/{image}', [ImageController::class, 'toggle']);
  Route::delete('image/{image}', [ImageController::class, 'destroy']);

  // Files
  Route::get('files', [FileController::class, 'get']);
  Route::post('files/order', [FileController::class, 'order']);
  Route::get('file/{file}', [FileController::class, 'find']);
  Route::post('file/upload', [FileController::class, 'upload']);
  Route::post('file', [FileController::class, 'store']);
  Route::put('file/{file}', [FileController::class, 'update']);
  Route::get('file/state/{file}', [FileController::class, 'toggle']);
  Route::delete('file/{file}', [FileController::class, 'destroy']);

  // Team member
  Route::get('team-members', [TeamMemberController::class, 'get']);
  Route::get('team-member/{teamMember}', [TeamMemberController::class, 'find']);
  Route::post('team-member', [TeamMemberController::class, 'store']);
  Route::put('team-member/{teamMember}', [TeamMemberController::class, 'update']);
  Route::post('team-members/order', [TeamMemberController::class, 'order']);
  Route::get('team-member/state/{teamMember}', [TeamMemberController::class, 'toggle']);
  Route::delete('team-member/{teamMember}', [TeamMemberController::class, 'destroy']);

  // Jobs
  Route::get('jobs', [JobController::class, 'get']);
  Route::get('job/{job}', [JobController::class, 'find']);
  Route::post('job', [JobController::class, 'store']);
  Route::put('job/{job}', [JobController::class, 'update']);
  Route::post('jobs/order', [JobController::class, 'order']);
  Route::get('job/state/{job}', [JobController::class, 'toggle']);
  Route::delete('job/{job}', [JobController::class, 'destroy']);

  // Discourses
  Route::get('discourses', [DiscourseController::class, 'get']);
  Route::get('discourse/{discourse}', [DiscourseController::class, 'find']);
  Route::post('discourse', [DiscourseController::class, 'store']);
  Route::put('discourse/{discourse}', [DiscourseController::class, 'update']);
  Route::post('discourses/order', [DiscourseController::class, 'order']);
  Route::get('discourse/state/{discourse}', [DiscourseController::class, 'toggle']);
  Route::delete('discourse/{discourse}', [DiscourseController::class, 'destroy']);

  // Topics (Discourse)
  Route::get('topics', [TopicController::class, 'get']);
  Route::get('topic/{topic}', [TopicController::class, 'find']);
  Route::post('topic', [TopicController::class, 'store']);
  Route::put('topic/{topic}', [TopicController::class, 'update']);
  Route::delete('topic/{topic}', [TopicController::class, 'destroy']);


  // Categories (Projects)
  Route::get('categories', [CategoryController::class, 'get']);
  Route::get('category/{category}', [CategoryController::class, 'find']);
  Route::post('category', [CategoryController::class, 'store']);
  Route::put('category/{category}', [CategoryController::class, 'update']);
  Route::delete('category/{category}', [CategoryController::class, 'destroy']);

  // Projects
  Route::get('projects', [ProjectController::class, 'get']);
  Route::get('project/{project}', [ProjectController::class, 'find']);
  Route::post('project', [ProjectController::class, 'store']);
  Route::put('project/{project}', [ProjectController::class, 'update']);
  Route::post('project/order', [ProjectController::class, 'order']);
  Route::get('project/state/{project}', [ProjectController::class, 'toggle']);
  Route::delete('project/{project}', [ProjectController::class, 'destroy']);

  // Image grid
  Route::post('image-grid', [ImageGridController::class, 'store']);
  Route::delete('image-grid/{imageGrid}', [ImageGridController::class, 'destroy']);
  Route::post('image-grid/order', [ImageGridController::class, 'order']);

  // Image grid item
  Route::post('image-grid-item', [ImageGridItemController::class, 'store']);
  Route::put('image-grid-item/{imageGridItem}', [ImageGridItemController::class, 'reset']);


});



