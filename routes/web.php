<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EvaluateController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UserPrintController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MailMessageController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ComplainController;

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

Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});

Route::get('/reboot', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    dd('All done!');
});

Route::match(['get', 'post'], '/y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQjFcTs/{id}', [WelcomeController::class, 'index']);
// Route::match(['get', 'post'], '/site/{id}', [WelcomeController::class, 'index']);

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/done', function () {
    return view('done');
});

Route::get('/order-done', function () {
    return view('order-done');
});

Route::get('/complain-done', function () {
    return view('complain-done');
});

Route::post('/voice', [WelcomeController::class, 'voice']);
Route::post('/order-store', [WelcomeController::class, 'order'])->name('store.order');
Route::post('/complain-store', [WelcomeController::class, 'complain'])->name('store.complain');

Route::middleware('auth')->group(function () {
    Route::post('/markAsRead', function () {
        foreach (Auth::user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return back();
    })->name('markAsRead');

    Route::post('/notifications/{id}', function ($id) {
        $notification = Auth::user()->unreadNotifications->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    })->name('notifications.read');

    Route::get('/dashboard', HomeController::class)->name('dashboard');
    Route::get('/user/print/{user}', [UserController::class, 'print'])->name('user.print');
    Route::get('/user/print2/{user}', [UserPrintController::class, 'print'])->name('user.print2');
    Route::resource('/structure', StructureController::class);
    Route::resource('/place', PlaceController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/collaborator', CollaboratorController::class);
    Route::resource('/quiz', QuizController::class);
    Route::resource('/evaluate', EvaluateController::class);
    Route::get('/voices', [VoiceController::class, 'index'])->name('voice.index');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/chat', ChatController::class);
    Route::resource('/message', MailMessageController::class);
    Route::resource('/complain', ComplainController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/answer/{id}', [EvaluateController::class, 'answer'])->name('answer.list');
    Route::post('/consent', function () {
        $user = User::find(Auth::id());
        $user->consent = true;
        $user->save();
        return back();
    })->name('chat.consent');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/newsletter', [NewsletterController::class, 'save'])->name('newsletter.save');

Route::post('/contact', [ContactController::class, 'store'])->name('save.contact');

require __DIR__ . '/auth.php';
