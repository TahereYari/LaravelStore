<?php

use App\Http\Controllers\AdminCategoryApiController;
use App\Http\Controllers\API\AdminApiProduct;
use App\Http\Controllers\API\BasketApiController;
use App\Http\Controllers\API\CommentApiController;
use App\Http\Controllers\API\HomeApiController;
use App\Http\Controllers\API\InvoiceApiController;
use App\Http\Controllers\API\OffsApiController;
use App\Http\Controllers\API\StoreApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserApiController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//*****************************************User1************************************************** */
Route::post('/register' ,[UserApiController::class , 'register'])-> name('register');
Route::post('/login' ,[UserApiController::class , 'login'])-> name('login');
Route::get('/activeUser/{user_id}' ,[UserApiController::class , 'ActiveUser'])-> name('activeUser')->middleware(['auth:sanctum']);
Route::get('/logout' ,[UserApiController::class , 'logout'])-> name('logout')->middleware(['auth:sanctum']);
//******************************************************************************************* */

//***************************************************AdminUSER*************************************************************** */
Route::get('/admin/user/list' ,[UserApiController::class ,'userList'])->name('user_list')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/userSite/list' ,[UserApiController::class ,'userSiteList'])->name('userSite_list');
Route::get('/admin/user/create' ,[UserApiController::class ,'userCreate'])->name('user_create')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/user/insert', [UserApiController::class, 'userInsert'])->name('user-insert')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/user/editprofile' , [UserApiController::class , 'userEdit'])->name('user_edit')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/cart/adddressinsert' ,[UserApiController::class ,'adddressInsert'])->name('adddress_insert')->middleware(['auth:sanctum']);

Route::get('/admin/user/delete/{id}' ,[UserApiController::class , 'userDelete'])->name('user_delete')->middleware(['auth:sanctum','auth.role.admin.json']);

Route::post('/admin/user/update' , [UserApiController::class , 'userUpdate'])->name('user_Update')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/roles' , [UserApiController::class , 'roleList'])->name('role_list')->middleware(['auth:sanctum','auth.role.admin.json']);

Route::get('/admin/Access' ,[UserApiController::class ,'Access'])->name('Access')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/Access/insert' ,[UserApiController::class ,'AccessInsert'])->name('Access_insert')->middleware(['auth:sanctum','auth.role.admin.json']);

//کاربر سایت
Route::post('/userSite/editeditprofile' , [UserApiController::class , 'userSiteEdit'])->name('userSite_edit')->middleware(['auth:sanctum']);
//********************************************************************************************* */


//*********************************Catrgory********************************************************** */
Route::get('/admin/category/list' , [AdminCategoryApiController::class , 'categoryList']) ->name('category-List')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/category/{id}' , [AdminCategoryApiController::class , 'CategoryOne']) ->name('CategoryOn')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('admin/category/insert' , [AdminCategoryApiController::class , 'CategoryInsert'])->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/category/delete/{id}' ,[AdminCategoryApiController::class, 'CategoryDelete'])->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/category/update/{id}' ,[AdminCategoryApiController::class , 'CategoryUpdate'])->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/front/categoryProduct/{id}' ,[AdminCategoryApiController::class , 'categoryProduct']);
//********************************************************************************************* */



//*************************************Product************************************************************ */
Route::get('/admin/product/list' ,[AdminApiProduct::class , 'productList'])->name('products_list')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/chart' ,[AdminApiProduct::class , 'chart'])->name('chart')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/product/lisall' ,[AdminApiProduct::class , 'productListAll'])->name('products_list_all')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/product/insert', [AdminApiProduct::class, 'productInsert'])->name('product-insert')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/product/insert/picture/{product_id}' , [AdminApiProduct::class , 'productPictures'])->name('product-pictures')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/product/update/{id}' , [AdminApiProduct::class , 'productUpdate'])->name('product_Update')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/product/delete/{id}' ,[AdminApiProduct::class , 'productDelete'])->name('product_delete')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/basketproducts/{priduct_id}' ,[AdminApiProduct::class ,'basketproducts'])->name('mbasketproducts')->middleware(['auth:sanctum','auth.role.admin.json']);

Route::get('/admin/product/edit/picture/{id}' , [AdminApiProduct::class , 'pictureEdit']) ->name('picture_edit')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/product/update/picture' , [AdminApiProduct::class , 'pictureUpdate']) ->name('picture_Update')->middleware(['auth:sanctum','auth.role.admin.json']);
//********************************************************************************************* */


//*****************************************************STORE******************************************************* */
Route::get('/admin/store',[StoreApiController::class ,'storePage'])->name('store_page')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/storeSite',[StoreApiController::class ,'storeSite'])->name('storeSite');

Route::post('admin/store/insert' , [StoreApiController::class , 'storeInsert']) ->name('store-insert')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/store/update/{id}' ,[StoreApiController::class , 'storeEdit'])-> name('store-update')->middleware(['auth:sanctum','auth.role.admin.json']);
//********************************************************************************************* */

 
//*****************************************************COMMENT******************************************************* */

Route::get('/admin/commentlist',[CommentApiController::class ,'commentList'])->name('comment_list')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/commentactivity/{id}',[CommentApiController::class ,'commentActivity'])->name('comment_activity')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/commentdelete/{id}',[CommentApiController::class ,'commentDelete'])->name('comment_delete')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/product/comment/insert/{product_id}', [CommentApiController::class ,'CommentInsert'])->name('Comment_insert')->middleware(['auth:sanctum']);;

//********************************************************************************************* */

//************************************************OFFS****************************************************************** */
Route::get('/admin/offs/list' ,[OffsApiController::class ,'offList'])->name('off_list');
Route::post('/admin/offs/insert', [OffsApiController::class, 'offInsert'])->name('off-insert')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/discount/edit/{id}' , [OffsApiController::class , 'discountEdit'])->name('discount_edit')->middleware(['auth:sanctum','auth.role.admin.json']);

Route::get('/admin/offcode/list' ,[OffsApiController::class ,'offCode'])->name('off_code')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/offcode/insert', [OffsApiController::class, 'offcodeInsert'])->name('offcode-insert')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::post('/admin/offcode/edit/{id}', [OffsApiController::class, 'offcodeEdit'])->name('offcode-edit')->middleware(['auth:sanctum','auth.role.admin.json']);

//********************************************************************************************* */

//***********************************************CART******************************************************************* */

Route::get('/cart' ,[BasketApiController::class ,'pageCart'])->name('page_cart')->middleware(['auth:sanctum']);
Route::get('/cart/insert/{user_id}/{product_id}' ,[BasketApiController::class ,'cartInsert'])->name('cart_insert')->middleware(['auth:sanctum']);
Route::get('/cart/up/{basket_id}/{basketproduct_id}' ,[BasketApiController::class ,'stepUp'])->name('stepUp')->middleware(['auth:sanctum']);
Route::get('/cart/down/{basket_id}/{basketproduct_id}' ,[BasketApiController::class ,'stepDown'])->name('stepDown')->middleware(['auth:sanctum']);
Route::delete('/cart/delete/{basket_id}/{basketproduct_id}' ,[BasketApiController::class ,'deleteItemBasket'])->name('deleteitem_Basket')->middleware(['auth:sanctum']);
Route::post('/cart/adddiscount/{basket_id}' ,[BasketApiController::class ,'addDiscount'])->name('add_discount')->middleware(['auth:sanctum']);
Route::get('/checkout/{address_id}' ,[BasketApiController::class ,'Checkout'])->name('Checkout')->middleware(['auth:sanctum']);

Route::get('/cart/adddress' ,[BasketApiController::class ,'adddressUser'])->name('adddress_user')->middleware(['auth:sanctum']);
//********************************************************************************************* */


//*********************************Home********************************************************************* */
 Route::get('/admin' , [HomeApiController::class , 'Admin'])->name('admin')->middleware(['auth:sanctum','auth.role.admin.json']);


 Route::get('/front' , [HomeApiController::class , 'Home'])->name('home');
 Route::get('/discountOfProduct/{product_id}' , [HomeApiController::class , 'discount'])->name('discount');
// Route::get('/categorymenu/{id}' ,[HomeController::class ,'categoryUnderMenu']) ; 
Route::get('/previewproduct/{product_id}',[HomeApiController::class,'previewProduct'])->name('preview_Product');
Route::post('/product/comment/insert', [HomeApiController::class ,'CommentInsert'])->name('Comment_insert')->middleware(['auth:sanctum']);
Route::get('/search/{q}',[HomeApiController::class ,'search'])->name('search');
Route::get('/categori/{category_id}',[HomeApiController::class ,'categorySite'])->name('category_site');
Route::get('/favorite/insert/{product_id}' , [HomeApiController::class ,'favoriteInsert'])->name('favorite_insert')->middleware(['auth:sanctum']);
//Route::get('/favorite/insert/{product_id}' , [HomeApiController::class ,'favorite'])->name('favorite')->middleware(['auth:sanctum']);
Route::get('/favoriteView',[HomeApiController::class ,'favoriteView'])->name('favorite_view')->middleware(['auth:sanctum']);
Route::get('/favoriteView/{product_id}' ,[HomeApiController::class ,'favoriteDelete'])->name('favorite_delete')->middleware(['auth:sanctum']);
Route::get('/off/preview' ,[HomeApiController::class ,'offPreview'])->name('off_preview');
//********************************************************************************************* */



//***********************************************Invoice******************************************************************* */
Route::get('/admin/InvoiceList' ,[InvoiceApiController::class ,'InvoiceList'])->name('Invoice_list')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/Invoice/product/{basket_id}' ,[InvoiceApiController::class ,'InvoiceProduct'])->name('Invoice_product')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/admin/Invoice/send/{basket_id}' ,[InvoiceApiController::class ,'InvoiceSend'])->name('Invoice_Send')->middleware(['auth:sanctum','auth.role.admin.json']);
Route::get('/mybaskets/{user_id}' ,[InvoiceApiController::class ,'myBaskets'])->name('my_baskets')->middleware(['auth:sanctum']);
Route::get('/mybaskets/sales/{basket_id}' ,[InvoiceApiController::class ,'myproduceSale'])->name('myproduce_Sale')->middleware(['auth:sanctum']);

//********************************************************************************************* */
