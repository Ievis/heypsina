<?php

    use App\Http\Controllers\AdminMainController;
    use App\Http\Controllers\AdminMainVladController;
    use App\Http\Controllers\AdminShowFailedOrderController;
    use App\Http\Controllers\AdminShowFailedOrdersController;
    use App\Http\Controllers\AdminShowLoginController;
    use App\Http\Controllers\AdminShowOrderController;
    use App\Http\Controllers\AdminStoreLoginController;
    use App\Http\Controllers\AdminStoreOrderController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\CheckoutController;
    use App\Http\Controllers\InfoController;
    use App\Http\Controllers\PaymentCallbackController;
    use App\Http\Controllers\PaymentController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\SuccessController;
    use Illuminate\Support\Facades\Route;

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

    Route::get('/', ProductController::class);
    Route::get('/cart', CartController::class);
    Route::get('/checkout', CheckoutController::class);
    Route::get('/success', SuccessController::class);
    Route::get('/offer', [InfoController::class, 'showOffer']);
    Route::get('/shipment', [InfoController::class, 'showShipment']);
    Route::get('/confidentiality', [InfoController::class, 'showConfidentiality']);
    Route::get('/contacts', [InfoController::class, 'showContacts']);
    Route::post('/payment', PaymentController::class)->middleware('throttle:5,1');
    Route::post('/payments/callback', PaymentCallbackController::class);

    Route::get('/admin/login', AdminShowLoginController::class);
    Route::post('/admin/login/store', AdminStoreLoginController::class)->middleware('throttle:5,1');
    Route::middleware('admin')->group(function () {
        Route::get('/admin/orders/{status?}/{city?}', AdminMainController::class);
        Route::get('/admin/order/{id}', AdminShowOrderController::class);
        Route::post('/admin/order/store/{id}', AdminStoreOrderController::class);
    });

