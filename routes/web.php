<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatSearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FrontController;


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

//admin - Category Start --------------------------------->
Route::get('/category_list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category_add',[CategoryController::class,'add'])->name('category.add');
Route::post('/category_addPost',[CategoryController::class,'addPost'])->name('category.add.post');
Route::get('/category_edit/{id}',[CategoryController::class,'category_update'])->name('category.update');
Route::post('/category_update/{id}',[CategoryController::class,'category_updatePost'])->name('category.update.post');
Route::get('/category_delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
Route::get('/category_active/{id}',[CategoryController::class,'active'])->name('category.active');
Route::get('/category_inactive/{id}',[CategoryController::class,'inactive'])->name('category.inactive');
//admin - Category Finish --------------------------------->

//admin - Brand Start --------------------------------->
Route::get('/brand_list',[BrandController::class,'list'])->name('brand.list');
Route::get('/brand-add',[BrandController::class,'brand_add'])->name('brand.add');
Route::post('/brand-add-Post',[BrandController::class,'brand_addPost'])->name('brand.add.post');
Route::get('/category_active/{id}',[BrandController::class,'active'])->name('brand.active');
Route::get('/category_inactive/{id}',[BrandController::class,'inactive'])->name('brand.inactive');
Route::get('/brand-edit/{id}',[BrandController::class,'brand_edit'])->name('brand.edit');
Route::post('/brand-update/{id}',[BrandController::class,'brand_updatePost'])->name('brand.update.post');
Route::get('/brand-delete/{id}',[BrandController::class,'brandDelete'])->name('brand.delete');
//admin - Brand Finish --------------------------------->

//admin - Product Start --------------------------------->
Route::get('producs-list',[ProductsController::class,'productsList'])->name('products.list');
Route::get('products-add',[ProductsController::class,'productsAdd'])->name('products.add');
Route::post('products-add',[ProductsController::class,'productAddPost'])->name('products.add.post');
Route::get('/products_active/{id}',[ProductsController::class,'active'])->name('products.active');
Route::get('/products_inactive/{id}',[ProductsController::class,'inactive'])->name('products.inactive');
Route::get('/product-delete/{id}',[ProductsController::class,'productDelete'])->name('product.delete');
Route::get('/product-edit/{id}',[ProductsController::class,'product_edit'])->name('product.edit');
Route::post('/product-update/{id}',[ProductsController::class,'productUpdate'])->name('product.update.post');
//admin - Product Finish --------------------------------->

//admin - Cupon Start --------------------------------->
Route::get('cupon-manager',[CuponController::class,'cupon_list'])->name('cupon.mng');
Route::get('/copon-active/{id}',[CuponController::class,'active'])->name('cupon.active');
Route::get('/cupon-inactive/{id}',[CuponController::class,'inactive'])->name('cupon.inactive');
Route::get('/cupon-delete/{id}',[CuponController::class,'cuponDelete'])->name('cupon.delete');
Route::get('/cupon-add',[CuponController::class,'cuponAdd'])->name('cupon.add');
Route::post('/cupon-addPost',[CuponController::class,'cuponAddPost'])->name('cupon.add.post');
Route::get('/cupon-edit/{id}',[CuponController::class,'cuponsEdit'])->name('cupon.edit');
Route::post('/cupon-editPost/{id}',[CuponController::class,'cuponsEditPost'])->name('cupon.edit.post');
//admin - Cupon Finish --------------------------------->


//admin - Blog Start --------------------------------->
Route::get('/articles-add',[BlogController::class,'articlesAdd'])->name('articles.add');
Route::post('/articles-add/save',[BlogController::class,'articlesaddPost'])->name('articles.add.post');
Route::get('/articles',[BlogController::class,'articles'])->name('articles');
Route::get('/article_delete/{id}',[BlogController::class,'delete'])->name('articles.delete');
Route::get('article-edit/{id}',[BlogController::class,'articlesEdit'])->name('articles.edit');
Route::post('article-edit-save/{id}',[BlogController::class,'articlesUpdate'])->name('articles.edit.post');
//admin - Blog Finish --------------------------------->

//front - Blog Start --------------------------------->
Route::get('my-blog-page',[BlogController::class,'frontBlog'])->name('front.blog');
Route::get('my-blog-details/{id}',[BlogController::class,'details'])->name('front.details');
//front - Blog Finish --------------------------------->


//front - Cart Start --------------------------------->
Route::get('cart-shopping',[CartController::class,'cart'])->name('cart');
Route::get('cart-shopping-delete/{id}',[CartController::class,'cartDelete'])->name('cart.delete');
Route::get('cart-shopping-alldelete',[CartController::class,'clearCartDelete'])->name('cart.delete.all');
Route::post('quantity-update/{id}',[CartController::class,'quantityUpdatePost'])->name('quantity.update');
Route::post('cupon-apply',[CartController::class,'cuponApply'])->name('cupon.post');
//front - Cart Finish --------------------------------->


//front - Login/Register Start --------------------------------->
Route::get('login-front',[LoginController::class,'loginFront'])->name('front.login');
Route::get('register-front',[LoginController::class,'registerFront'])->name('front.register');
//front - Login/Register Finish--------------------------------->


Route::get('category-search/{cat_id}',[CatSearchController::class,'catSearch'])->name('cat.search');

//front - Products Details Start --------------------------------->
Route::get('products-details/{id}',[DetailsController::class,'details'])->name('details');
//front - Products Details  Finish --------------------------------->

Route::get('profile',[ProfileController::class,'profile'])->name('profile');
Route::post('profile-update/{id}',[ProfileController::class,'profileUpdate'])->name('user.profile.update');

Route::get('/',[FrontController::class,'template'])->name('template');


//front - Order Start --------------------------------->
Route::get('orders',[ProfileController::class,'orderFront'])->name('order.front');
//front - Order Finish --------------------------------->

//front - Contact Start --------------------------------->
Route::get('user-messages',[ContactController::class,'contact'])->name('user.messages');
Route::get('contact',[ContactController::class,'frontContact'])->name('frontContact');
Route::post('send-message',[ContactController::class,'contactAdd'])->name('send.message');
Route::get('user-message/{id}',[ContactController::class,'contactView'])->name('contact.view');
//front - Contact Finish --------------------------------->


//admin reviews & ratings///////
Route::get('reviews-ratings',[ReviewController::class,'reviewsRatings'])->name('reviews.ratings');
//admin reviews & ratings//////

//front - Shop Start --------------------------------->
Route::get('shop',[ShopController::class,'shop'])->name('shop');
//front - Shoo Finish --------------------------------->


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/panel',[AdminController::class,'index'])->name('index');
    Route::post('add/to-cart/{product_id}',[CartController::class,'addToCart'])->name('add/to-cart');

    //front - Wishlist Start --------------------------------->
    Route::get('wishlist/{product_id}',[WishlistController::class,'wishlisT'])->name('wishlist');
    Route::get('wishlist_page',[WishlistController::class,'wishPage'])->name('wishlist.page');
    Route::get('wishlist-delete/{product_id}',[WishlistController::class,'destroyWish'])->name('wishlist.delete');
    Route::get('wishlist-delete-all/',[WishlistController::class,'truncateWish'])->name('wishlist.delete.all');
    //front - Wishlist Finish --------------------------------->

    //front - Checkout Start --------------------------------->
    Route::get('checkout',[CheckoutController::class,'checkout'])->name('checkout');
    Route::post('order-post',[OrderController::class,'storeOrder'])->name('order.post');
    //front - Checkout Finish --------------------------------->

    //admin - Order Start --------------------------------->
    Route::get('order',[OrderController::class,'order'])->name('order');
    Route::get('order-view/{order_id}',[OrderController::class,'viewOrder'])->name('order.view');
    Route::get('order-view-pages/{order_id}',[OrderController::class,'viewOrderFront'])->name('order.view.pages');
    //admin - Order Finish --------------------------------->

    Route::post('comment-send',[DetailsController::class,'reviewPost'])->name('review.post');
});
