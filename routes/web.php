<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\SslCommerzPaymentController;









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

Route::get('/',[FrontendController::class,'index'])->name('front');
Route::get('/single-product/{id}',[FrontendController::class,'singleproduct']);
Route::get('/catagorywise/{id}',[FrontendController::class,'catagorywise']);
Route::get('/subcatagorywise/{id}',[FrontendController::class,'subcatagorywise']);
Route::get('/brandwise/{id}',[FrontendController::class,'brandwise']);
Route::get('add/to/product/{id}',[CartController::class,'addtocart']);
Route::get('/cart-content',[CartController::class,'cartcontent']);
Route::get('/fetch_data',[CartController::class,'fetchdata']);
Route::get('cart/delete/{id}',[CartController::class,'deletecart']);
Route::get('/catfetch_data',[CartController::class,'cartfecthdata']);
Route::get('/cartitem/delete/{id}',[CartController::class,'cartitemdelete']);
Route::post('cart/update',[CartController::class,'updatecart']);
Route::post('/singleproduct-addtocart',[CartController::class,'singleproductcart'])->name('user.singleproductcart');
Route::get('/user-check',[CartController::class,'usercheck'])->name('user.checkout')->middleware('verified');
Route::post('autocompleteuser',[FrontendController::class,'fetchsearchdata'])->name('autocompleteuser.fetch');
Route::get('/shop',[FrontendController::class,'shoplist']);

// Wishlist//

Route::get('/addtowishlist/{id}',[CartController::class,'Wishlist']);
Route::get('/show-wishlist',[CartController::class,'showwishlist'])->name('user.wishlist');
Route::get('/userdeletewishlist/{id}',[CartController::class,'deletewishlist']);
Route::get('/useraddtocart/{id}',[CartController::class,'useraddtocart']);


Route::get('/redirect',[FrontendController::class,'redirect'])->middleware('verified');


Auth::routes();

// Email Verfication//

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/redirect');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('resent-email', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// my account//

Route::get('/myaccount',[FrontendController::class,'myaccount'])->middleware('verified');
Route::get('/user-order-details/{id}',[FrontendController::class,'userorderdetails']);
Route::post('/change-passsword-user',[FrontendController::class,'userchangepassword'])->name('user.changepassword');
Route::get('/user-pdf/{id}/{order_id}',[FrontendController::class,'userpdfdownload'])->name('user.pdf');

// Google URL
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

// Checkout//

Route::post('user/coupon',[CartController::class,'usercoupon'])->name('user.coupon');
Route::post('payment-process',[CartController::class,'paymentprocess'])->name('payment.process');
Route::post('sripte',[CartController::class,'paymentstripe'])->name('payment.stripe');
Route::post('bkash',[CartController::class,'bkashpayment'])->name('payment.bkash');
Route::post('rocket',[CartController::class,'rocketpayment'])->name('paymnet.rocket');
Route::get('/sucess',[CartController::class,'sucesspage']);

// Order Tracking//

Route::get('/order-tracking',[FrontendController::class,'ordertrackingpage'])->name('user.ordertracking');
Route::post('/check-odertarcking',[FrontendController::class,'checkordertracking'])->name('order.checktracking');

// wishlist//










Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin//


Route::get('admin/master',[AdminController::class,'index']);
Route::get('admin',[LoginController::class,'showLoginFrom'])->name('admin.login');
Route::post('admin',[LoginController::class,'login']);
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.loginout');


// Admin Catagory//

Route::get('admin/catagory',[CatagoryController::class,'index'])->name('admin.catagory');
Route::post('admin/catagory/add-catagory',[CatagoryController::class,'addcatagory'])->name('admin.add.catagory');
Route::post('admin/catagory/update-catagory',[CatagoryController::class,'updatecatagory'])->name('admin.updatecatagory');
Route::get('admin/catagory/delete/{id}',[CatagoryController::class,'deletecatagory']);

// Admin  Sub Catagory//

Route::get('admin/subcatagory',[CatagoryController::class,'subcatagory'])->name('admin.subcatagory');
Route::post('admin/add-subcatagory',[CatagoryController::class,'addsubcatagory'])->name('admin.add.subcatagory');
Route::get('admin/subcatagory/delete/{id}',[CatagoryController::class,'subcatadelete']);


// Admin Brand//

Route::get('admin/brand',[CatagoryController::class,'brand'])->name('admin.brand');
Route::post('admin/add-brand',[CatagoryController::class,'addbrand'])->name('admin.add.brand');
Route::post('admin/update-brand',[CatagoryController::class,'updatebrand'])->name('admin.update.brand');
Route::get('admin/brand/delete/{id}',[CatagoryController::class,'deletebrand']);


// Admin Product//

Route::get('admin/product',[ProductController::class,'product'])->name('admin.product');
Route::post('admin/add-product',[ProductController::class,'addproduct'])->name('admin.add.product');
Route::get('admin/product/get/subname/{cataid}',[ProductController::class,'getsubname']);
Route::get('admin/manage-product',[ProductController::class,'manageproduct'])->name('admin.manageproduct');
Route::get('admin/view-product/{id}',[ProductController::class,'viewproduct']);
Route::get('admin/edit-product/{id}',[ProductController::class,'editproduct']);
Route::post('admin/updateproduct',[ProductController::class,'updateproduct'])->name('admin.updateproduct');


// Admin Coupon//

Route::get('admin/coupon',[CouponController::class,'coupon'])->name('admin.coupon');
Route::post('admin/coupon/add-coupon',[CouponController::class,'addcoupon'])->name('admin.addcoupon');
Route::post('admin/coupon/update',[CouponController::class,'updatecoupon'])->name('admin.updatecoupon');
Route::get('admin/coupondelete/{id}',[CouponController::class,'deletecoupon']);


// Admin Order//

// Admin Order//
Route::get('admin-order/pending',[OrderController::class,'pending_order'])->name('admin.order');
Route::get('/xxxx/{id}/{order_id}',[OrderController::class,'vieworder'])->name('show.order');
Route::get('/admin/accept/{acc_id}',[OrderController::class,'accept_order']);
Route::get('/cancel/{cancel_id}',[OrderController::class,'cancel_order']);
Route::get('/accept',[OrderController::class,'acceptorder'])->name('admin.accept.order');
Route::get('/rrrr/{id}/{order_id}',[OrderController::class,'viewacceptorder'])->name('admin.view.accept');
Route::get('/delivery/accept/{de_id}',[OrderController::class,'accept_deliveryorder']);
Route::get('/delivery_man',[OrderController::class,'deliverymanorder'])->name('admin.delivery.order');

Route::get('/hym/{id}/{order_id}',[OrderController::class,'viewdeliveryacceptorder'])->name('admin.deliveryman.accept');
Route::get('/deliveryed/accept/{completed_id}',[OrderController::class,'completedorder']);
Route::get('lol/order',[OrderController::class,'scuccesorder'])->name('admin.success.order');
Route::get('/rttt/{id}/{order_id}',[OrderController::class,'viewsuccedorder'])->name('admin.viewsucced.accept');
Route::get('/cancel_order',[OrderController::class,'cancelorder'])->name('admin.cancel.order');
Route::get('/invoice-pdf/{id}/{order_id}',[OrderController::class,'invoicepdf'])->name('order.invoice');

// Admin Report

Route::get('/admin/today',[ReportController::class,'todayorder'])->name('admin.today.order');
Route::get('/admin/today_delivery',[ReportController::class,'todaydeliveryorder'])->name('admin.today.deliveryorder');
Route::get('/admin/this_month',[ReportController::class,'Thismonth'])->name('admin.today.thismonthorder');
Route::get('/admin/search_report',[ReportController::class,'search'])->name('admin.search_report');
Route::post('admin/search_year',[ReportController::class,'searchbyyear'])->name('year.report');
Route::post('admin/search_month',[ReportController::class,'searchbymonth'])->name('month.report');
Route::post('admin/date_month',[ReportController::class,'searchbydate'])->name('date.report');


// Admin Slider//

Route::get('admin/sider',[AdminController::class,'slider'])->name('admin.slider');
Route::post('admin-add-slider',[AdminController::class,'addslider'])->name('admin.addslider');
Route::post('admin-update-slider',[AdminController::class,'updateslider'])->name('admin.updateslider');
Route::get('admin/delete-slide/{id}',[AdminController::class,'deleteslider']);


// Admin Header and Footer//

Route::get('admin/header-footer',[AdminController::class,'adminheaderandfooter'])->name('admin.headerandfooter');
Route::post('admin/header-update',[AdminController::class,'updateadminheader'])->name('admin.updateheader');
Route::post('admin/footer-update',[AdminController::class,'updateadminfooter'])->name('admin.updateadminfooter');



