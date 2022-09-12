<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BossController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaiterController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Waiter\OrderController;
use App\Http\Controllers\Legal\LegalController;
use App\Http\Controllers\State\OrdersController;
use App\Http\Controllers\HomeGuestController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\RestBoss\RestBossController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeGuestController::class, 'index']);
Route::get('address/{address}', [HomeGuestController::class, 'redirectToAddress'])->name('redirectToAddress');
Route::get('role', [HomeGuestController::class, 'loginOption'])->name('loginOption');
Route::get('login-konobar', [HomeGuestController::class, 'loginWaiter'])->name('loginWaiter');
Route::get('login-sef', [HomeGuestController::class, 'loginBoss'])->name('loginBoss');
Route::get('login-stanje', [HomeGuestController::class, 'loginState'])->name('loginState');
Route::get('login-rest-boss', [HomeGuestController::class, 'loginRestBoss'])->name('loginRestBoss');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('boss')->name('boss.')->group(function () {
    Route::middleware(['isBoss', 'auth'])->group(function () {
        Route::get('home', [BossController::class, 'index'])->name('index');
        Route::get('home', [BossController::class, 'showOrder'])->name('showOrder');
        Route::post('/accept-order', [BossController::class, 'acceptOrder'])->name('acceptOrder');
        Route::post('/send-location', [BossController::class, 'sendLocation'])->name('sendLocation');
        Route::post('/finish-delivery', [BossController::class, 'finishDelivery'])->name('finishDelivery');

        Route::post('location', [BossController::class, 'location'])->name('location');

        Route::post('/logout', [BossController::class, 'logout'])->name('logout');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('rest-boss')->name('rest-boss.')->group(function () {
    Route::middleware(['isRestBoss', 'auth'])->group(function () {
        Route::get('home', [RestBossController::class, 'index'])->name('index');
        Route::get('home', [RestBossController::class, 'allStaff'])->name('allStaff');

        Route::get('deliverer', [RestBossController::class, 'showOrder'])->name('showOrder');
        Route::get('state', [RestBossController::class, 'statePage'])->name('statePage');
        Route::get('waiter', [RestBossController::class, 'showOrders'])->name('showOrders');

        Route::get('/porucivana-jela', [RestBossController::class, 'popularArticles'])->name('popularArticles');
        Route::get('/prihodi', [RestBossController::class, 'amounts'])->name('amounts');
        Route::get('/mesecni-prihodi', [RestBossController::class, 'months'])->name('months');
        Route::get('/godisnji-prihodi', [RestBossController::class, 'years'])->name('years');
        Route::get('/korisnici-prihodi', [RestBossController::class, 'users'])->name('users');

        Route::post('/logout', [RestBossController::class, 'logout'])->name('logout');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['isUser', 'auth'])->group(function () {
        Route::get('home', [UserController::class, 'index'])->name('index');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');


        Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
        Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('waiter')->name('waiter.')->group(function () {
    Route::middleware(['isWaiter', 'auth'])->group(function () {
        Route::get('home', [WaiterController::class, 'index'])->name('index');
        Route::get('/porudzbine', [OrderController::class, 'showOrders'])->name('showOrders');
        Route::post('/createOrder', [OrderController::class, 'createOrder'])->name('createOrder');
        Route::post('/accept', [OrderController::class, 'accept'])->name('accept');
        Route::post('/refuse', [OrderController::class, 'refuse'])->name('refuse');

        Route::get('map', [OrderController::class, 'indexx']);

        Route::post('/logout', [WaiterController::class, 'logout'])->name('logout');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('state')->name('state.')->group(function () {
    Route::middleware(['isState', 'auth'])->group(function () {
        Route::get('home', [StateController::class, 'index'])->name('index');
        Route::post('/logout', [StateController::class, 'logout'])->name('logout');
        Route::get('/porucivana-jela', [OrdersController::class, 'popularArticles'])->name('popularArticles');
        Route::get('/prihodi', [OrdersController::class, 'amounts'])->name('amounts');
        Route::get('/mesecni-prihodi', [OrdersController::class, 'months'])->name('months');
        Route::get('/godisnji-prihodi', [OrdersController::class, 'years'])->name('years');
        Route::get('/korisnici-prihodi', [OrdersController::class, 'users'])->name('users');

        Route::get('/porudzbine', [OrderController::class, 'showOrders'])->name('orders');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('legal')->name('legal.')->group(function () {
    Route::middleware(['isLegal', 'auth'])->group(function () {
        Route::get('home', [LegalController::class, 'index'])->name('index');
        Route::post('/logout', [LegalController::class, 'logout'])->name('logout');

        // Route::get('/porudzbine', [OrderController::class, 'showOrders'])->name('orders');
    });
});
//-----------------------------------------------------------------------------------------------------
