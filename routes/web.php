<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ContestantController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\ContactFormController;

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



//FrontPages
Route::get('/' , [FrontPageController::class,'index'])->name('Home Page');
Route::get('/contest' , [FrontPageController::class,'contest'])->name('Our Contest');
Route::get('/about' , [FrontPageController::class,'about'])->name('about');
Route::get('/contact' , [FrontPageController::class,'contact'])->name('contact');
Route::get('/contestants' , [FrontPageController::class,'contestants'])->name('Our Contestants');
Route::post('/vote' , [FrontPageController::class,'freevote'])->name('vote');
Route::get('/contest/{slug}' , [FrontPageController::class,'view_contest'])->name('Check Out Contest');
Route::get('/contestant/{slug}' , [FrontPageController::class,'view_contestant'])->name('Check Out Contestant');
Route::post('/contestant/pay/{slug}' , [FrontPageController::class,'finalpayment'])->name('Vote Contestant');
Route::post('/contestant/pay/' , [FrontPageController::class,'redirectToGateway'])->name('pay now');
Route::get('/payment/callback', [FrontPageController::class, 'handleGatewayCallback']);
//Contact
Route::post('/contact/store' , [ContactFormController::class,'store'])->name('store contact');
Route::get('/search' , [FrontPageController::class,'search'])->name('search');



//Admin Restrictions
Route::middleware(['auth', 'isAdmin'])->group(function () {


Route::get('admin/dashboard/' , [AdminHomeController::class,'dashboard'])->name('dashboard')->middleware('auth');


//Earnings
Route::get('admin/earnings/' , [PaymentController::class,'earning'])->name('Earnings')->middleware('auth');
Route::get('admin/earnings/delete/{id}' , [PaymentController::class,'destroy'])->name('earnings delete')->middleware('auth');


//Contact
Route::get('admin/contact/' , [ContactFormController::class,'index'])->name('admin contact');
Route::get('admin/contact/delete/{id}' , [ContactFormController::class,'destroy'])->name('contact delete')->middleware('auth');

//Contest
Route::get('admin/contest/' , [ContestController::class,'index'])->name('Contest')->middleware('auth');
Route::get('admin/contest/create' , [ContestController::class,'create'])->name('Contest Upload')->middleware('auth');
Route::post('admin/contest/store' , [ContestController::class,'store'])->name('Contest Store')->middleware('auth');
Route::get('admin/contest/{id}' , [ContestController::class,'show'])->name('Contest Edit')->middleware('auth');
Route::get('admin/contest/edit/{id}' , [ContestController::class,'edit'])->name('Contest Edit')->middleware('auth');
Route::put('admin/contest/update/{id}' , [ContestController::class,'update'])->name('Contest Update')->middleware('auth');
Route::get('admin/contest/delete/{id}' , [ContestController::class,'destroy'])->name('Contest Delete')->middleware('auth');



//Contestant
Route::get('admin/contestant/' , [ContestantController::class,'index'])->name('Contestants')->middleware('auth');
Route::get('admin/contestant/create' , [ContestantController::class,'create'])->name('Contestant Upload')->middleware('auth');
Route::post('admin/contestant/store' , [ContestantController::class,'store'])->name('Contestant Store')->middleware('auth');
Route::get('admin/contestant/{id}' , [ContestantController::class,'show'])->name('Contestant Edit')->middleware('auth');
Route::get('admin/contestant/edit/{id}' , [ContestantController::class,'edit'])->name('Contestant Edit')->middleware('auth');
Route::put('admin/contestant/update/{id}' , [ContestantController::class,'update'])->name('Contestant Update')->middleware('auth');
Route::get('admin/contestant/delete/{id}' , [ContestantController::class,'destroy'])->name('Contestant Delete')->middleware('auth');

});
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout' , [LogoutController::class,'perform'])->name('logout');
 });

require __DIR__.'/auth.php';
