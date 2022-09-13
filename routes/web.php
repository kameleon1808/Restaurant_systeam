<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deliverer\DelivererController; //
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Waiter\WaiterController;
use App\Http\Controllers\State\StateController;
use App\Http\Controllers\Waiter\OrderController;
use App\Http\Controllers\Legal\LegalController;
use App\Http\Controllers\State\OrdersController;
use App\Http\Controllers\HomeGuestController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\RestBoss\RestBossController;
use App\Http\Controllers\State\StateController as StateStateController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\ShopController;
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


Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['isUser', 'auth'])->group(function () {
        Route::get('home', [UserController::class, 'index'])->name('index');
        Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');
        Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
        Route::get('/order', [UserOrderController::class, 'show'])->name('order');
        Route::post('/locate', [UserOrderController::class, 'locate'])->name('locate');
        Route::post('/cancel', [UserOrderController::class, 'cancel'])->name('cancel');
        Route::post('/create', [UserOrderController::class, 'create'])->name('create');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::post('/remove', [CartController::class, 'remove'])->name('remove');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');

        Route::get('/edit-cart/{id}', [CartController::class, 'edit'])->name('edit');
        Route::put('update-cart/{id}', [CartController::class, 'update']);


        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/updateInformation', [UserController::class, 'updateInformation'])->name('updateInformation');

        Route::post('update-pwd', [UserController::class, 'update'])->name('update');
        Route::post('/delete', [UserController::class, 'delete'])->name('delete');
    });
});
//-----------------------------------------------------------------------------------------------------
Route::prefix('legal')->name('legal.')->group(function () {
    Route::middleware(['isLegal', 'auth'])->group(function () {
        Route::get('home', [LegalController::class, 'index'])->name('index');
        Route::post('/logout', [LegalController::class, 'logout'])->name('logout');
        Route::get('/shop/{slug}', [ShopController::class, 'show'])->name('shop.show');
    });
});
//-----------------------------------------------------------------------------------------------------

Route::prefix('boss')->name('boss.')->group(function () {
    Route::middleware(['isBoss', 'auth'])->group(function () {
        Route::get('home', [DelivererController::class, 'index'])->name('index');
        Route::get('home', [DelivererController::class, 'showOrder'])->name('showOrder');
        Route::post('/accept-order', [DelivererController::class, 'acceptOrder'])->name('acceptOrder');
        Route::post('/send-location', [DelivererController::class, 'sendLocation'])->name('sendLocation');
        Route::post('/finish-delivery', [DelivererController::class, 'finishDelivery'])->name('finishDelivery');

        Route::post('location', [DelivererController::class, 'location'])->name('location');

        Route::post('/logout', [DelivererController::class, 'logout'])->name('logout');
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
