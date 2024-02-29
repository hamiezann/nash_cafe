
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminPromotionController;
use App\Http\Controllers\StoreController;
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


Route::get('/', function () {
    return view('user.authentication.login');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin $ Staff Route
Route::get('backend/login', [AdminController::class, 'login_form'])->name('login.form');
Route::get('ui/login', [AdminController::class, 'user_login'])->name('login.user');
Route::get('ui/register', [AdminController::class, 'user_register'])->name('register.user');


Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');

//Admin route protection
Route::group(['middleware' => 'admin'], function () {
    Route::get('admin_logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('admin.dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
    Route::get('admin.index', [AdminController::class, 'admin_index'])->name('admin.index');

    Route::get('/product.index', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product.create', [ProductController::class, 'create_product'])->name('admin.product.create');
    Route::get('/product.show/{productId}', [ProductController::class, 'show_product'])->name('admin.product.show');
    Route::get('/product.edit/{productId}', [ProductController::class, 'edit_product'])->name('admin.product.edit');
    Route::post('/product.update', [ProductController::class, 'update_product'])->name('admin.product.update');
    Route::match(['get','post'],'/product.store', [ProductController::class, 'store_product'])->name('admin.product.store');
    Route::delete('/product/{product}', [ProductController::class, 'destroy_product'])->name('admin.product.destroy');

    Route::get('/staff.index', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/staff.create', [StaffController::class, 'create_staff'])->name('admin.staff.create');
    Route::get('/staff.show/{staffId}', [StaffController::class, 'show_staff'])->name('admin.staff.show');
    Route::get('/staff.edit/{staffId}', [StaffController::class, 'edit_staff'])->name('admin.staff.edit');
    Route::post('/staff.update', [StaffController::class, 'update_staff'])->name('admin.staff.update');
    Route::match(['get','post'],'/staff.store}', [StaffController::class, 'store_staff'])->name('admin.staff.store');
    Route::delete('/staff/{staff}', [StaffController::class, 'destroy_staff'])->name('admin.staff.destroy');
    
    Route::get('/payment.index', [PaymentController::class, 'index'])->name('admin.payment.index');
    Route::get('/payment.show/{paymentId}', [PaymentController::class, 'show_payment'])->name('admin.payment.show');
    Route::delete('/payment/{payment}', [PaymentController::class, 'destroy_payment'])->name('admin.payment.destroy');
    
    Route::get('/customer.index', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('/customer.show/{customerId}', [CustomerController::class, 'show_customer'])->name('admin.customer.show');
    Route::delete('/customer/{customer}', [CustomerController::class, 'destroy_customer'])->name('admin.customer.destroy');
    
    Route::get('/order.index', [OrderController::class, 'admin_index'])->name('admin.order.index');
    Route::get('/order.show/{orderId}', [OrderController::class, 'admin_show_order'])->name('admin.order.show');
    
    Route::get('/category.table', [CategoryController::class, 'index'])->name('admin.category.table');
    Route::get('/category.create', [CategoryController::class, 'create_category'])->name('admin.category.create');
    Route::get('/category.show/{categoryId}', [CategoryController::class, 'show_category'])->name('admin.category.show');
    Route::get('/category.edit/{categoryId}', [CategoryController::class, 'edit_category'])->name('admin.category.edit');
    Route::post('/category.update', [CategoryController::class, 'update_category'])->name('admin.category.update');
    Route::match(['get','post'],'/category.store}', [CategoryController::class, 'store_category'])->name('admin.category.store');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy_category'])->name('admin.category.destroy');

    // Route::get('/promotion', [AdminPromotionController::class, 'index'])->name('admin.promotion.index');
    Route::post('/promotion/update',  [AdminPromotionController::class, 'update'])->name('admin.promotion.update');

    Route::get('print_pdf/{orderId}', [AdminController::class, 'print_pdf'])->name('print_pdf');

  });
  
//Staff route protection
Route::group(['middleware' => 'staff'], function () {
    Route::get('logout', [StaffController::class, 'staff_logout'])->name('staff.logout');
    Route::get('staff.dashboard', [StaffController::class, 'staff_dashboard'])->name('staff.dashboard');
    
    Route::get('/staff/order', [OrderController::class, 'index'])->name('order.list');
    Route::get('/staff/order-details/{orderId}', [OrderController::class, 'show_order_details'])->name('order.details');
    Route::get('/staff/update-status/{orderId}', [OrderController::class, 'show_status_update_form'])->name('status.update.form');
    Route::patch('/staff/update-status/{orderId}', [OrderController::class, 'update_status'])->name('status.update');


  });


//User Route

// Route::middleware('guest')->group(function () {
  Route::match(['get','post'],'/cart-add', [CartController::class, 'add'])->name('cart.add');
  Route::get('/cart-remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
  Route::match(['get','post'],'/cart-update/{productId}', [CartController::class, 'update'])->name('cart.update');
  
   Route::post('/payment-start', [PaymentController::class, 'stripePayment'])->name('payment.initiate');
  // Route::match(['get','post'],'/payment-start', [PaymentController::class, 'stripePayment'])->name('payment.initiate');
  // Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');
  Route::get('/stripe-success', [PaymentController::class, 'handleStripeSuccess'])->name('stripe.success');
  Route::get('/payment-failed', [PaymentController::class, 'cancelPayment'])->name('payment.cancel');
  Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'aboutUs'])->name('about');
Route::get('/order', [HomeController::class, 'order'])->name('order');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/review', [HomeController::class, 'review'])->name('review');
Route::get('/product', [ProductController::class, 'productlist'])->name('productlist');
Route::get('/product-details/{productId}', [ProductController::class, 'show'])->name('productdetails');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/store-update', [CartController::class, 'update_store'])->name('update.store');
Route::get('/nearest-store', [StoreController::class, 'showNearestStore'])->name('store.show');
Route::get('/store-list', [StoreController::class, 'index'])->name('store.index');

Route::get('print_pdf_user/{orderId}', [OrderController::class, 'print_pdf_user'])->name('print_pdf_user');
Route::get('order/completed', [OrderController::class, 'show_completed'])->name('show_completed_order');
// });

Auth::routes();



//End User Route












