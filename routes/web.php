<?php

use Illuminate\Support\Facades\Route;
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
//Fontend

Route::middleware('Setting')->group(function(){ 
    //Backend admin login
    Route::get('/admin/login','AdminController\AdminLoginController@getLogin')->name('admin.getLogin');
    Route::post('/admin/login','AdminController\AdminLoginController@postLogin')->name('admin.postLogin');

    //Frontend customer login
    Route::get('login','CustomerController\CustomerLoginController@getCustomerLogin')->name('customer.getLogin');
    Route::post('login','CustomerController\CustomerLoginController@postCustomerLogin')->name('customer.postlogin');
    Route::get('/','CustomerController\HomeController@getHome')->name('home');

    //Sau khi login
    Route::middleware(['auth'])->group(function () {
        /*
        |--------------------------------------------------------------------------
        | AdminRoute | Frontend
        |--------------------------------------------------------------------------

        */
        //Frontend
        Route::prefix('admin')->middleware('CheckAdmin')->group(function (){

            Route::get('dashboard','AdminController\DashboardController@getDashboard')->name('admin.dashboard');
        //quản lý user
            Route::prefix('user')->group(function(){

                Route::get('add','AdminController\UserController@getAddUser')->name('admin.adduser')->middleware('CheckACL:add-user');
                Route::post('add','AdminController\UserController@postAddUser')->name('admin.postadduser')->middleware('CheckACL:add-user');
                Route::get('detail/{id}','AdminController\UserController@detailUser')->name('admin.detailuser')->middleware('CheckACL:list-user');
                Route::get('edit/{id}','AdminController\UserController@getEditUser')->name('admin.edituser')->middleware('CheckACL:edit-user');
                Route::post('edit/{id}','AdminController\UserController@postEditUser')->middleware('CheckACL:edit-user');
                Route::get('softdelete/{id}','AdminController\UserController@SoftDeleteUser')->name('admin.softdeleteuser')->middleware('CheckACL:delete-user');
                Route::get('delete/{id}','AdminController\UserController@DeleteUser')->name('admin.deleteuser')->middleware('CheckACL:delete-user');
                Route::get('restore/{id}','AdminController\UserController@RestoreUser')->name('admin.restoreuser')->middleware('CheckACL:delete-user');
                Route::get('list','AdminController\UserController@getListUser')->name('admin.listuser')->middleware('CheckACL:list-user');
            });

        //profile người dùng
            Route::prefix('profile')->group(function(){
                Route::get('/','AdminController\UserController@getProfile')->name('admin.profile');
                Route::get('edit','AdminController\UserController@getEditProfile')->name('admin.editprofile');
                Route::post('edit','AdminController\UserController@postEditProfile')->name('admin.posteditprofile');
                Route::get('change-password','AdminController\UserController@getChangePassword')->name('admin.getchangepassword');
                Route::post('change-password','AdminController\UserController@postChangePassword')->name('admin.postchangepassword');
            });
        //vai trò và quyền của vai trò
            Route::prefix('role')->group(function(){
                Route::get('add','AdminController\RoleController@getAddRole')->name('admin.addrole')->middleware('CheckACL:add-role');
                Route::post('add','AdminController\RoleController@postAddRole')->middleware('CheckACL:add-role');
                Route::get('edit/{id}','AdminController\RoleController@getEditRole')->name('admin.editrole')->middleware('CheckACL:edit-role');
                Route::post('edit/{id}','AdminController\RoleController@postEditRole')->middleware('CheckACL:edit-role');
                Route::get('delete/{id}','AdminController\RoleController@getDeleteRole')->name('admin.deleterole')->middleware('CheckACL:delete-role');
            });
        //Categories- Danh mục sản phẩm
            Route::prefix('category')->group(function(){
                Route::get('add','AdminController\CategoryController@getAddCategory')->name('admin.addcategory')->middleware('CheckACL:add-category');
                Route::post('add','AdminController\CategoryController@postAddCategory')->middleware('CheckACL:add-category');
                Route::get('edit/{id}','AdminController\CategoryController@getEditCategory')->name('admin.editcategory')->middleware('CheckACL:edit-category');
                Route::post('edit/{id}','AdminController\CategoryController@postEditCategory')->middleware('CheckACL:edit-category');
                Route::get('delete/{id}','AdminController\CategoryController@DeleteCategory')->name('admin.deletecategory')->middleware('CheckACL:delete-category');
            });

        //Menus - Menu phía trên
            Route::prefix('menu')->group(function(){
                Route::get('add','AdminController\MenuController@getAddMenu')->name('admin.addmenu');
                Route::post('add','AdminController\MenuController@postAddMenu');
                Route::get('edit/{id}','AdminController\MenuController@getEditMenu')->name('admin.editmenu');
                Route::post('edit/{id}','AdminController\MenuController@postEditMenu');
                Route::get('delete/{id}','AdminController\MenuController@DeleteMenu')->name('admin.deletemenu');
            });

        //Product - Sản phẩm
            Route::prefix('product')->group(function(){
                Route::get('view','AdminController\ProductController@viewProduct')->name('admin.viewproduct')->middleware('CheckACL:list-product');
                Route::get('add','AdminController\ProductController@getAddProduct')->name('admin.addproduct')->middleware('CheckACL:add-product');
                Route::post('add','AdminController\ProductController@postAddProduct')->name('admin.postaddproduct')->middleware('CheckACL:add-product');
                Route::get('edit/{id}','AdminController\ProductController@getEditProduct')->name('admin.editproduct')->middleware('CheckACL:edit-product');
                Route::post('edit/{id}','AdminController\ProductController@postEditProduct')->name('admin.posteditproduct')->middleware('CheckACL:edit-product');
                Route::get('delete/{id}','AdminController\ProductController@DeleteProduct')->name('admin.deleteproduct')->middleware('CheckACL:delete-product');
                Route::post('edit-status/{id}','AdminController\ProductController@postEditStatus')->name('admin.editstatus')->middleware('CheckACL:update-product');


            });

        //slider - Trang bìa của website
            Route::prefix('slider')->group(function(){
                Route::get('view','AdminController\SliderController@viewSlider')->name('admin.viewslider')->middleware('CheckACL:list-slider');
                Route::get('add','AdminController\SliderController@getAddSlider')->name('admin.addslider')->middleware('CheckACL:add-slider');
                Route::post('add','AdminController\SliderController@postAddSlider')->name('admin.postaddslider')->middleware('CheckACL:add-slider');
                Route::get('edit/{id}','AdminController\SliderController@getEditSlider')->name('admin.editslider')->middleware('CheckACL:edit-slider');
                Route::post('edit/{id}','AdminController\SliderController@postEditSlider')->name('admin.posteditslider')->middleware('CheckACL:edit-slider');
                Route::get('delete/{id}','AdminController\SliderController@DeleteSlider')->name('admin.deleteslider')->middleware('CheckACL:delete-slider');
                Route::post('edit-status/{id}','AdminController\SliderController@editStatus')->name('admin.editstatusslider')->middleware('CheckACL:edit-slider');
            });

        //setting - cài đặt các email, sđt, fb, gmail,. . của shop
            Route::prefix('setting')->group(function(){
                Route::get('add','AdminController\SettingController@getAddSetting')->name('admin.addsetting')->middleware('CheckACL:add-setting');
                Route::post('add','AdminController\SettingController@postAddSetting')->name('admin.postaddsetting')->middleware('CheckACL:add-setting');
                Route::get('edit/{id}','AdminController\SettingController@getEditSetting')->name('admin.editsetting')->middleware('CheckACL:edit-setting');
                Route::post('edit/{id}','AdminController\SettingController@postEditSetting')->name('admin.posteditsetting')->middleware('CheckACL:edit-setting');
                Route::post('editgenaral', 'AdminController\SettingController@postEditGenaral')->name('admin.posteditgenaral')->middleware('CheckACL:edit-setting');
                Route::get('delete/{id}','AdminController\SettingController@DeleteSetting')->name('admin.deletesetting')->middleware('CheckACL:delete-setting');
                Route::post('update','AdminController\SettingController@updateLogoSetting')->name('admin.updatelogo')->middleware('CheckACL:edit-setting');

            });

        //brand - thương hiệu
            Route::prefix('brand')->group(function(){
                Route::get('add','AdminController\BrandController@getAddBrand')->name('admin.addbrand')->middleware('CheckACL:add-brand');
                Route::post('add','AdminController\BrandController@postAddBrand')->name('admin.postaddbrand')->middleware('CheckACL:add-brand');
                Route::get('edit/{id}','AdminController\BrandController@getEditBrand')->name('admin.editbrand')->middleware('CheckACL:edit-brand');
                Route::post('edit/{id}','AdminController\BrandController@postEditBrand')->name('admin.posteditbrand')->middleware('CheckACL:edit-brand');
                Route::get('delete/{id}', 'AdminController\BrandController@DeleteBrand')->name('admin.deletebrand')->middleware('CheckACL:delete-brand');
            });
        //đơn hàng
            Route::prefix('order')-> group(function(){
                Route::get('view','AdminController\OrderController@getOrder')->name('admin.getorder')->middleware('CheckACL:list-order');
                Route::get('detail/{id}','AdminController\OrderController@getDetailOrder')->name('admin.detailorder')->middleware('CheckACL:list-order');
                Route::post('update/{id}','AdminController\OrderController@updateOrder')->name('admin.updateorder')->middleware('CheckACL:update-order');
                Route::get('delete/{id}','AdminController\OrderController@deleteOrder')->name('admin.deleteorder')->middleware('CheckACL:delete-order');
            });

        //nhà cung cấp hàng
            Route::prefix('supplier')-> group(function(){
                Route::get('add','AdminController\SupplierController@getSupplier')->name('admin.getsupplier')->middleware('CheckACL:add-supplier');
                Route::post('add','AdminController\SupplierController@postSupplier') -> name('admin.postsupplier')->middleware('CheckACL:add-supplier');
                Route::get('edit/{id}','AdminController\SupplierController@getEditSupplier')->name('admin.editsupplier')->middleware('CheckACL:edit-supplier');
                Route::post('edit/{id}','AdminController\SupplierController@postEditSupplier')->name('admin.posteditsupplier')->middleware('CheckACL:edit-supplier');
                Route::get('delete/{id}','AdminController\SupplierController@deleteSupplier')->name('admin.deletesupplier')->middleware('CheckACL:delete-supplier');
            });
        //bài viết 
            Route::prefix('blog')->group(function(){
                Route::get('add','AdminController\BlogController@getAddBlog')->name('admin.getaddblog')->middleware('CheckACL:add-blog');
                Route::post('add','AdminController\BlogController@postAddBlog')->name('admin.postaddblog')->middleware('CheckACL:add-blog');
                Route::get('view','AdminController\BlogController@getViewBlog')->name('admin.getviewblog')->middleware('CheckACL:list-blog');
                Route::post('edit-status/{id}','AdminController\BlogController@editStatusBlog')->name('admin.editstatusblog')->middleware('CheckACL:edit-blog');
                Route::get('edit/{id}','AdminController\BlogController@getEditBlog')->name('admin.geteditblog')->middleware('CheckACL:edit-blog');
                Route::post('edit/{id}','AdminController\BlogController@postEditBlog')->name('admin.posteditblog')->middleware('CheckACL:edit-blog');
                Route::get('delete/{id}','AdminController\BlogController@deleteBlog')->name('admin.deleteblog')->middleware('CheckACL:delete-blog');
            });

        //in print
            Route::prefix('print')->group(function(){
                Route::get('print-review/{id}','AdminController\PrintController@getPrint')->name('admin.getPrint');
            });

        //logout
            Route::get('logout','AdminController\AdminLoginController@logout')->name('admin.logout');
        });




        /*
        |--------------------------------------------------------------------------
        | Customer Route | Backend
        |--------------------------------------------------------------------------

        */
        Route::prefix('customer')->group(function(){
            Route::prefix('profile')->group(function(){
                Route::get('','CustomerController\ProfileController@getViewProfile')->name('customer.viewprofile');
                Route::post('','CustomerController\ProfileController@postViewProfile')->name('customer.postviewprofile');
                Route::get('/password','CustomerController\ProfileController@getChangePassword')->name('customer.changepassword');
                Route::post('/password','CustomerController\ProfileController@postChangePassword')->name('customer.postchangepassword');
                Route::get('/order','CustomerController\ProfileController@getOrder')->name('customer.getorder');


            });
            Route::get('order/{id}','CustomerController\CartController@reOrder')->name('customer.reOrder');
            Route::get('logout','CustomerController\CustomerLoginController@CustomerLogout')->name('customer.logout');
        });


    });


Route::get('category/{id}/{slug}','CustomerController\HomeController@getCategory')->name('getCategory');
Route::get('brand/{id}/{slug}','CustomerController\HomeController@getBrand')->name('getBrand');
Route::get('tag/{id}','CustomerController\HomeController@getTag')-> name('getTag');
Route::post('search','CustomerController\HomeController@getSearch')-> name('getSearch');

Route::prefix('product-detail')-> group(function(){
    Route::get('/{id}','CustomerController\ProductController@getProductDetail')->name('getProductDetail');
    Route::post('/{id}','CustomerController\ProductController@postProductDetail')->name('postProductDetail');
});


Route::prefix('cart')-> group(function(){
    Route::get('/','CustomerController\CartController@getCart')->name('getCart');
    Route::post('save/{id}','CustomerController\CartController@saveCart')->name('saveCart');
    Route::patch('update-cart', 'CustomerController\CartController@update')->name('updatecart');
    Route::delete('remove-from-cart', 'CustomerController\CartController@remove')->name('deletecart');
});


Route::prefix('checkout')-> group(function(){
    Route::get('/','CustomerController\CheckOutController@getCheckout')->name('getCheckout');
    Route::post('/','CustomerController\CheckOutController@postCheckout')->name('postCheckout');
    Route::post('update','CustomerController\CheckOutController@updateCheckout')->name('updateCheckout');
});

Route::prefix('shopping')-> group(function(){
    Route::get('/','CustomerController\ShoppingController@getShopping')->name('getShopping');
    Route::get('sale','CustomerController\ShoppingController@getSale')->name('getSale');
    Route::get('new','CustomerController\ShoppingController@getNew')->name('getNew');
});





Route::prefix('blog')->group(function(){
    Route::get('','CustomerController\BlogController@getBlog')->name('getBlog');
    Route::get('/{id}/{slug}','CustomerController\BlogController@getSingerBlog')->name('getsingerblog');
    Route::post('blog-comment/{id}','CustomerController\BlogController@BlogComment')->name('blogcomment');
});


}); 
// route setting