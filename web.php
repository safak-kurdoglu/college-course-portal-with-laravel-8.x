 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;

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

Route::get("login", function(){  return view("StudentLogin",["email" => ""]);})->name("login");   //default value for email in the first login is empty string.
Route::get("loginT", function(){ return view("TeacherLogin",["email" => ""]);});               

Route::any("studentLogin", [LessonController::class, "studentLogin"]);
Route::get("teacherLogin", [LessonController::class, "teacherLogin"]);

Route::any("checkLogin", [LessonController::class, "checkLogin"]);

Route::any("openUpload", [LessonController::class, "openUpload"]);


Route::any("toCourseTaken", [LessonController::class, "toCourseTaken"]);

Route::any("courseAdd", [LessonController::class, "courseAdd"]);

Route::any("toGivenCourse", [LessonController::class, "toGivenCourse"])->name("toGivenCourse");

Route::any("uploadedHomeworks", [LessonController::class, "uploadedHomeworks"]);
Route::get("openHomeworkUpload", [LessonController::class, "openHomeworkUpload"]);
Route::get("uploadHomework", [LessonController::class, "uploadHomework"]); 

Route::post('homeworkStore', [LessonController::class,"homeworkStore"]);
Route::post('homeworkDestroy', [LessonController::class,"homeworkDestroy"]);
Route::post('homeworkExisting', [LessonController::class,"homeworkExisting"]);

Route::get("uploadFile", [LessonController::class, "uploadFile"]);

Route::post('fileStore', [LessonController::class,"fileStore"]);
Route::post('fileDestroy', [LessonController::class,"fileDestroy"]);
Route::post('fileExisting', [LessonController::class,"fileExisting"]);