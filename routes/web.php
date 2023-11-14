<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EvaluateController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\NewsletterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('lang', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/migrate', function(){
    Artisan::call('migrate:fresh --seed');
    dd('migrated!');
});

Route::get('reboot',function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
      dd('All done!');
  });

Route::match(['get', 'post'], '/site/{id}', [WelcomeController::class, 'index']);

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::controller(WelcomeController::class)->group(function(){

    Route::post('voice','voice');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', HomeController::class)->name('dashboard');
    Route::get('/user/print/{user}', [UserController::class, 'print'])->name('user.print');
    Route::resource('/structure', StructureController::class);
    Route::resource('/place', PlaceController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/quiz', QuizController::class);
    Route::match(['get', 'post'], '/evaluate', [EvaluateController::class, 'index'])->name('evaluate.index');
    Route::get('/voices', [VoiceController::class, 'index'])->name('voice.index');
    Route::get('/clients', [VoiceController::class, 'customers'])->name('customer.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/newsletter', [NewsletterController::class, 'save'])->name('newsletter.save');

Route::post('/contact', [ContactController::class, 'store'])->name('save.contact');

require __DIR__ . '/auth.php';
