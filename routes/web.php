<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishListController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/shop/{product_slug}',[ShopController::class,'product_details'])->name("shop.product.details");
Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');
Route::post('/contact', [HomeController::class, 'add_contact'])->name('home.contact.add');

//Cart Section Development
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add_to_cart'])->name('cart.add');
Route::put('/cart/increase-quantity/{rowId}',[CartController::class,'increase_cart_quantity'])->name('cart.qty.increase');
Route::put('/cart/decrease-quantity/{rowId}',[CartController::class,'decrease_cart_quantity'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}',[CartController::class,'remove_item_from_cart'])->name('cart.remove');
Route::delete('/cart/clear',[CartController::class,'empty_cart'])->name('cart.empty');

//Wish List Development
Route::get('/wishlist',[WishlistController::class,'index'])->name('wishlist.index');
Route::post('/wishlist/add',[WishlistController::class,'add_to_wishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{rowId}',[WishlistController::class,'remove_item_from_wishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'empty_wishlist'])->name('wishlist.empty');

//APPLY COUPON MANAGEMENT
Route::post('/cart/apply-coupon',[CartController::class,'apply_coupon_code'])->name('cart.coupon.apply');
Route::delete('/cart/remove-coupon',[CartController::class,'remove_coupon_code'])->name('cart.coupon.remove');

//CHECKOUT MANAGEMENT
Route::get('/checkout',[CartController::class,'checkout'])->name('cart.checkout');
Route::post('/place-order',[CartController::class,'place_order'])->name('cart.place.order');
Route::get('/order-confirmation',[CartController::class,'confirmation'])->name('cart.confirmation');

//user.account.addresses, user.account.address.edit
Route::get('/user/addresses',[CartController::class,'checkout'])->name('user.account.addresses');
Route::get('/user/address/edit/{address_id}', [CartController::class, 'category_edit'])->name('user.account.address.edit');



Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard',[UserController::class,'index'])->name('user.index');
    Route::get('/account-orders',[UserController::class,'account_orders'])->name('user.account.orders');
    Route::get('/account-order-detials/{order_id}',[UserController::class,'account_order_details'])->name('user.acccount.order.details');
    Route::put('/account-order/cancel-order',[UserController::class,'account_cancel_order'])->name('user.account_cancel_order');
});
Route::middleware(['auth',AuthAdmin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

    //BRAND MANAGEMENT
    Route::get('/admin/brands', [AdminController::class, 'brands'])->name('admin.brands');
    Route::get('/admin/brand/add', [AdminController::class, 'add_brand'])->name('admin.brand.add');
    Route::post('/admin/brand/store', [AdminController::class,'brand_store'])->name('admin.brand.store');
    Route::get('/admin/brand/edit/{id}', [AdminController::class, 'brand_edit'])->name('admin.brand.edit');
    Route::put('/admin/brand/update', [AdminController::class,'brand_update'])->name('admin.brand.update');
    Route::delete('/admin/brand/{id}/delete',[AdminController::class,'brand_delete'])->name('admin.brand.delete');

    //CATEGORY MANAGEMENT
    Route::get('/admin/categories',[AdminController::class,'categories'])->name('admin.categories');
    Route::get('/admin/category/add', [AdminController::class, 'add_category'])->name('admin.category.add');
    Route::post('/admin/category/store', [AdminController::class,'category_store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [AdminController::class, 'category_edit'])->name('admin.category.edit');
    Route::put('/admin/category/update', [AdminController::class,'category_update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}/delete',[AdminController::class,'category_delete'])->name('admin.category.delete');

    //PRODUCT MANAGEMENT
    Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');
    Route::get('/admin/product/add',[AdminController::class,'add_product'])->name('admin.product.add');
    Route::post('/admin/product/store',[AdminController::class,'product_store'])->name('admin.product.store');
    Route::get('/admin/product/{id}/edit', [AdminController::class, 'product_edit'])->name('admin.product.edit');
    Route::put('/admin/product/update', [AdminController::class,'product_update'])->name('admin.product.update');
    Route::delete('/admin/product/{id}/delete',[AdminController::class,'product_delete'])->name('admin.product.delete');

    //COUPON MANAGEMENT
    Route::get('/admin/coupons',[AdminController::class,'coupons'])->name('admin.coupons');
    Route::get('/admin/coupon/add',[AdminController::class,'add_coupon'])->name('admin.coupon.add');
    Route::post('/admin/coupon/store',[AdminController::class,'coupon_store'])->name('admin.coupon.store');
    Route::get('/admin/coupon/{id}/edit', [AdminController::class, 'coupon_edit'])->name('admin.coupon.edit');
    Route::put('/admin/coupon/update',[AdminController::class,'update_coupon'])->name('admin.coupon.update');
    Route::delete('/admin/coupon/{id}/delete',[AdminController::class,'delete_coupon'])->name('admin.coupon.delete');

    //ORDER MANAGEMENT
    Route::get('/admin/orders',[AdminController::class,'orders'])->name('admin.orders');
    Route::get('/admin/order/items/{order_id}',[AdminController::class,'order_items'])->name('admin.order.items');
    Route::put('/admin/order/update-status',[AdminController::class,'update_order_status'])->name('admin.order.status.update');

    //CONTACT MANAGEMENT
    Route::get('/admin/contacts', [AdminController::class, 'contacts'])->name('admin.contacts');
    Route::delete('/admin/contact/{id}/delete',[AdminController::class,'delete_contact'])->name('admin.contact.delete');
});