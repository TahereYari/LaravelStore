<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OffsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\usercontroller;
use App\Models\Category;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//*********************************Home********************************************************************* */
Route::get('/admin' , [AdminController::class , 'Admin'])->name('admin')->middleware(['auth','auth.role.admin']);
Route::get('/' , [HomeController::class , 'Home'])->name('home');
Route::get('/categorymenu/{id}' ,[HomeController::class ,'categoryUnderMenu']) ; 
Route::get('/previewproduct/{id}',[HomeController::class,'previewProduct'])->name('preview_Product');
Route::get('/product/comment/{id}', [HomeController::class ,'Comment'])->name('Comment');
Route::post('/product/comment/insert', [HomeController::class ,'CommentInsert'])->name('Comment_insert');
Route::get('/search',[HomeController::class ,'search'])->name('search');
Route::get('/categori/{id}',[HomeController::class ,'categorySite'])->name('category_site');
Route::get('/favorite/insert/{id}' , [HomeController::class ,'favoriteInsert'])->name('favorite_insert');
Route::get('/favoriteView',[HomeController::class ,'favoriteView'])->name('favorite_view');
Route::get('/favoriteView/{id}' ,[HomeController::class ,'favoriteDelete'])->name('favorite_delete');
Route::get('/off/preview' ,[HomeController::class ,'offPreview'])->name('off_preview');


//********************************************************************************************* */


//*****************************************************COMMENT******************************************************* */

Route::get('/admin/commentlist',[CommentController::class ,'commentList'])->name('comment_list');
Route::get('/admin/commentactivity/{id}',[CommentController::class ,'commentActivity'])->name('comment_activity');
Route::get('/admin/commentlist',[CommentController::class ,'commentList'])->name('comment_list');
Route::get('/admin/commentdelete/{id}',[CommentController::class ,'commentDelete'])->name('comment_delete');
//********************************************************************************************* */


//*****************************************************STORE******************************************************* */
Route::get('/admin/store',[StoreController::class ,'storePage'])->name('store_page')->middleware(['auth','auth.role.admin','auth.role.read']);
Route::get('/admin/store/create' , [StoreController::class , 'storeCreate'])->name('store-create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('admin/store/insert' , [StoreController::class , 'storeInsert']) ->name('store-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::get('/admin/store/edit/{id}' ,[StoreController::class , 'storeEdit'])-> name('store-edit')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::post('/admin/store/update' ,[StoreController::class , 'storerUpdate'])-> name('store-update')->middleware(['auth','auth.role.admin','auth.role.update']);
//********************************************************************************************* */

 

//*********************************Catrgory********************************************************** */
Route::get('/admin/category/list' , [CategoryController::class , 'categoryList']) ->name('category-List')->middleware(['auth','auth.role.admin','auth.role.read']);
Route::get('/admin/category/create' , [CategoryController::class , 'CategoryCreate'])->name('category-create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('admin/category/insert' , [CategoryController::class , 'CategoryInsert']) ->name('category-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::get('/admin/category/delete/{id}' ,[CategoryController::class, 'CategoryDelete'])->name('category-delete')->middleware(['auth','auth.role.admin','auth.role.delete']);
Route::get('/admin/category/edit/{id}' ,[CategoryController::class , 'CategoryEdit'])-> name('category-edit')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::post('/admin/category/update' ,[CategoryController::class , 'CategoryUpdate'])-> name('category-update')->middleware(['auth','auth.role.admin','auth.role.update']);
//********************************************************************************************* */


//***********************************SubCatrgory************************************************************ */
Route::get('/admin/subcategory/list' , [SubCategoryController::class , 'subcategoryList']) ->name('subcategory-List')->middleware(['auth','auth.role.admin','auth.role.read']);
Route::get('/admin/subcategory/create' , [SubCategoryController::class , 'subCategoryCreate'])->name('subcategory-create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('admin/subcategory/insert' , [SubCategoryController::class , 'subCategoryInsert']) ->name('subcategory-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::get('/admin/subcategory/delete/{id}' ,[SubCategoryController::class, 'subCategoryDelete'])->name('subcategory-delete')->middleware(['auth','auth.role.admin','auth.role.delete']);
Route::get('/admin/subcategory/edit/{id}' ,[SubCategoryController::class , 'subCategoryEdit'])-> name('subcategory-edit')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::post('/admin/subcategory/update' ,[SubCategoryController::class , 'subCategoryUpdate'])-> name('subcategory-update')->middleware(['auth','auth.role.admin','auth.role.update']);
//********************************************************************************************* */


//*************************************Product************************************************************ */
Route::get('/admin/product/list' ,[ProductController::class , 'productList'])->name('products_list')->middleware(['auth','auth.role.admin','auth.role.read']);
Route::get('/admin/product/create' ,[ProductController::class , 'productCreate'])->name('product-create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('/admin/product/insert', [ProductController::class, 'productInsert'])->name('product-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::get('/admin/product/productCategory/{id}',[ProductController::class ,'productCategory'])->name('product-category')->middleware(['auth','auth.role.admin']);
Route::post('/admin/product/insert/picture' , [ProductController::class , 'productPictures'])->name('product-pictures')->middleware(['auth','auth.role.admin']);
Route::post('/admin/product/insert/image' , [ProductController::class , 'productimages'])->name('product-images')->middleware(['auth','auth.role.admin']);
Route::get('/admin/product/edit/{id}' , [ProductController::class , 'productEdit'])->name('product_edit')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::post('/admin/product/update' , [ProductController::class , 'productUpdate'])->name('product_Update')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::get('/admin/product/delete/{id}' ,[ProductController::class , 'productDelete'])->name('product_delete')->middleware(['auth','auth.role.admin','auth.role.delete']);
Route::get('/admin/product/subcategory/{id}',[ProductController::class, 'preiewSubCategory'])->name('preiew_subCategory');

Route::get('/admin/product/edit/picture/{id}' , [ProductController::class , 'pictureEdit']) ->name('picture_edit')->middleware(['auth','auth.role.admin']);
Route::post('/admin/product/update/picture' , [ProductController::class , 'pictureUpdate']) ->name('picture_Update')->middleware(['auth','auth.role.admin','auth.role.update']);
//********************************************************************************************* */


//************************************************OFFS****************************************************************** */
Route::get('/admin/offs/list' ,[OffsController::class ,'offList'])->name('off_list')->middleware(['auth','auth.role.admin','auth.role.read']);
Route::get('/admin/offs/create' ,[OffsController::class ,'offCreate'])->name('off_create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('/admin/offs/insert', [OffsController::class, 'offInsert'])->name('off-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::get('/admin/discount/edit/{id}' , [OffsController::class , 'discountEdit'])->name('discount_edit')->middleware(['auth','auth.role.admin']);
Route::post('/admin/discount/update' , [OffsController::class , 'discountUpdate'])->name('discount_Update')->middleware(['auth','auth.role.admin','auth.role.update']);

Route::get('/admin/offcode/list' ,[OffsController::class ,'offCode'])->name('off_code');
Route::get('/admin/offcode/create' ,[OffsController::class ,'offcodeCreate'])->name('offcode_create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('/admin/offcode/insert', [OffsController::class, 'offcodeInsert'])->name('offcode-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);


//********************************************************************************************* */


//***************************************************USER*************************************************************** */
Route::get('/admin/user/list' ,[usercontroller::class ,'userList'])->name('user_list')->middleware(['auth','auth.role.admin','auth.AdminforUser']);
Route::get('/admin/user/create' ,[usercontroller::class ,'userCreate'])->name('user_create')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('/admin/user/insert', [usercontroller::class, 'userInsert'])->name('user-insert')->middleware(['auth','auth.role.admin','auth.role.creat']);
Route::post('/admin/user/edit' , [usercontroller::class , 'userEdit'])->name('user_edit')->middleware(['auth','auth.role.admin','auth.role.update']);
Route::post('/cart/adddressinsert' ,[usercontroller::class ,'adddressInsert'])->name('adddress_insert');

Route::get('/admin/user/delete/{id}' ,[usercontroller::class , 'userDelete'])->name('user_delete')->middleware(['auth','auth.role.admin','auth.role.delete']);

Route::post('/admin/user/update' , [usercontroller::class , 'userUpdate'])->name('user_Update')->middleware(['auth','auth.role.admin','auth.role.update']);

Route::get('/admin/Access' ,[usercontroller::class ,'Access'])->name('Access')->middleware(['auth','auth.role.admin']);
Route::post('/admin/Access/insert' ,[usercontroller::class ,'AccessInsert'])->name('Access_insert')->middleware(['auth','auth.role.admin']);

Route::get('/admin/user/viewprofile/{id}' , [usercontroller::class , 'viewprofile'])->name('view_profile')->middleware(['auth','auth.role.admin','auth.role.update']);

Route::post('/admin/user/editprofile/{id}' , [usercontroller::class , 'editprofile'])->name('edit_profile')->middleware(['auth','auth.role.admin','auth.role.update']);
//********************************************************************************************* */

//********************************************Log********************************************************************** */
Auth::routes();
Route::get('/logout' ,[logoutcontroller::class ,'logOut'])->name('logout');
Route::get('/user/userprofile' , [HomeController::class , 'UserProfile'])->name('user_profile');
//کاربر سایت
Route::post('/user/edit' , [usercontroller::class , 'userSiteEdit'])->name('userSite_edit')->middleware(['auth']);

//********************************************************************************************* */


//***********************************************CART******************************************************************* */

Route::get('/cart' ,[HomeController::class ,'pageCart'])->name('page_cart');
Route::get('/cart/insert/{user_id}/{product_id}' ,[HomeController::class ,'cartInsert'])->name('cart_insert');
Route::get('/cart/up/{basket_id}/{basketproduct_id}' ,[HomeController::class ,'stepUp'])->name('stepUp');
Route::get('/cart/down/{basket_id}/{basketproduct_id}' ,[HomeController::class ,'stepDown'])->name('stepDown');
Route::get('/cart/delete/{basket_id}/{basketproduct_id}' ,[HomeController::class ,'deleteItemBasket'])->name('deleteitem_Basket');
Route::get('/cart/adddiscount/{id}' ,[HomeController::class ,'addDiscount'])->name('add_discount');



Route::get('/cart/adddress' ,[HomeController::class ,'adddressUser'])->name('adddress_user');
Route::get('/checkout/{id}' ,[HomeController::class ,'Checkout'])->name('Checkout');
//********************************************************************************************* */


//***********************************************Invoice******************************************************************* */
Route::get('/InvoiceList' ,[InvoiceController::class ,'InvoiceList'])->name('Invoice_list');
Route::get('/Invoice/product/{id}' ,[InvoiceController::class ,'InvoiceProduct'])->name('Invoice_product');
Route::get('/Invoice/send/{id}' ,[InvoiceController::class ,'InvoiceSend'])->name('Invoice_Send');
Route::get('/mybaskets/{user_id}' ,[InvoiceController::class ,'myBaskets'])->name('my_baskets');
Route::get('/mybaskets/sales/{id}' ,[InvoiceController::class ,'myproduceSale'])->name('myproduce_Sale');
//********************************************************************************************* */


//******************************************************EMAIL*************************************** */
Route::get('/admin/email' ,[MailController::class , 'pageMail'])->name('page_mail');
Route::get('/admin/sendemail' ,[MailController::class , 'sendMail'])->name('send_mail');
Auth::routes();