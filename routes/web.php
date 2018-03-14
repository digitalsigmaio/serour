<?php

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
use Illuminate\Support\Facades\Route;

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@authenticate')->name('authentication');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/', 'ParentCompany\ParentCompanyController@index')->name('home')->middleware('auth');



Route::group(['prefix' => 'parents'], function (){
    Route::get('/{parent}/edit',  'ParentCompany\ParentCompanyController@edit')->name('editCompany')->middleware('auth');
    Route::put('/',       'ParentCompany\ParentCompanyController@update')->name('updateCompany')->middleware('auth');
});

Route::group(['prefix' => 'children'], function (){
    Route::get('/',               'Child\ChildController@index')->name('subsidiaries')->middleware('auth');
    Route::get('/new',            'Child\ChildController@create')->name('newSubsidiary')->middleware('auth');
    Route::post('/',              'Child\ChildController@store')->name('storeSubsidiary')->middleware('auth');
    Route::get('/{child}/edit',   'Child\ChildController@edit')->name('editSubsidiary')->middleware('auth');
    Route::put('/{child}',        'Child\ChildController@update')->name('updateSubsidiary')->middleware('auth');
    Route::get('/{child}',        'Child\ChildController@show')->name('showSubsidiary')->middleware('auth');
    Route::delete('/{child}',     'Child\ChildController@destroy')->name('deleteSubsidiary')->middleware('auth');
});

Route::group(['prefix' => 'employees'], function (){
    Route::get('/',               'Employee\EmployeeController@index')->name('employees')->middleware('auth');
    Route::get('/new',            'Employee\EmployeeController@create')->name('newEmployee')->middleware('auth');
    Route::post('/',              'Employee\EmployeeController@store')->name('storeEmployee')->middleware('auth');
    Route::get('/{employee}/edit',   'Employee\EmployeeController@edit')->name('editEmployee')->middleware('auth');
    Route::put('/{employee}',        'Employee\EmployeeController@update')->name('updateEmployee')->middleware('auth');
    Route::get('/{employee}',        'Employee\EmployeeController@show')->name('showEmployee')->middleware('auth');
    Route::delete('/{employee}',     'Employee\EmployeeController@destroy')->name('deleteEmployee')->middleware('auth');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/',                  'Category\CategoryController@index')->name('categories')->middleware('auth');
    Route::get('/new',               'Category\CategoryController@create')->name('newCategory')->middleware('auth');
    Route::post('/',                 'Category\CategoryController@store')->name('storeCategory')->middleware('auth');
    Route::get('/{category}/edit',   'Category\CategoryController@edit')->name('editCategory')->middleware('auth');
    Route::put('/{category}',        'Category\CategoryController@update')->name('updateCategory')->middleware('auth');
    Route::get('/{category}',        'Category\CategoryController@show')->name('showCategory')->middleware('auth');
    Route::delete('/{category}',     'Category\CategoryController@destroy')->name('deleteCategory')->middleware('auth');
});

Route::group(['prefix' => 'products'], function (){
    Route::get('/',                  'Product\ProductController@index')->name('products')->middleware('auth');
    Route::get('/new',               'Product\ProductController@create')->name('newProduct')->middleware('auth');
    Route::post('/',                 'Product\ProductController@store')->name('storeProduct')->middleware('auth');
    Route::get('/{product}/edit',    'Product\ProductController@edit')->name('editProduct')->middleware('auth');
    Route::put('/{product}',         'Product\ProductController@update')->name('updateProduct')->middleware('auth');
    Route::get('/{product}',         'Product\ProductController@show')->name('showProduct')->middleware('auth');
    Route::delete('/{product}',      'Product\ProductController@destroy')->name('deleteProduct')->middleware('auth');
    /* Product Gallery */
    Route::get('/{product}/gallery', 'Product\ProductController@gallery')->name('productImages')->middleware('auth');
    Route::post('/{product}/gallery','ProductImage\ProductImageController@store')->name('newProductImage')->middleware('auth');
    Route::delete('/{product}/gallery/{productImage}','ProductImage\ProductImageController@destroy')->name('deleteProductImage')->middleware('auth');
    Route::get('/{product}/gallery/{productImage}','ProductImage\ProductImageController@edit')->name('editProductImage')->middleware('auth');
    Route::put('/{product}/gallery/{productImage}','ProductImage\ProductImageController@update')->name('updateProductImage')->middleware('auth');
});

Route::group(['prefix' => 'services'], function (){
    Route::get('/',               'Service\ServiceController@index')->name('services')->middleware('auth');
    Route::get('/new',            'Service\ServiceController@create')->name('newService')->middleware('auth');
    Route::post('/',              'Service\ServiceController@store')->name('storeService')->middleware('auth');
    Route::get('/{service}/edit', 'Service\ServiceController@edit')->name('editService')->middleware('auth');
    Route::put('/{service}',      'Service\ServiceController@update')->name('updateService')->middleware('auth');
    Route::delete('/{service}',   'Service\ServiceController@destroy')->name('deleteService')->middleware('auth');
    /* Service Gallery */
    Route::get('/{service}/gallery', 'Service\ServiceController@gallery')->name('serviceImages')->middleware('auth');
    Route::post('/{service}/gallery', 'ServiceImage\ServiceImageController@store')->name('newServiceImage')->middleware('auth');
    Route::delete('/{service}/gallery/{serviceImage}', 'ServiceImage\ServiceImageController@destroy')->name('deleteServiceImage')->middleware('auth');
    Route::get('/{service}/gallery/{serviceImage}', 'ServiceImage\ServiceImageController@edit')->name('editServiceImage')->middleware('auth');
    Route::put('/{service}/gallery/{serviceImage}', 'ServiceImage\ServiceImageController@update')->name('updateServiceImage')->middleware('auth');
});

Route::group(['prefix' => 'projects'], function (){
    Route::get('/',               'Project\ProjectController@index')->name('projects')->middleware('auth');
    Route::get('/new',            'Project\ProjectController@create')->name('newProject')->middleware('auth');
    Route::post('/',              'Project\ProjectController@store')->name('storeProject')->middleware('auth');
    Route::get('/{project}/edit', 'Project\ProjectController@edit')->name('editProject')->middleware('auth');
    Route::put('/{project}',      'Project\ProjectController@update')->name('updateProject')->middleware('auth');
    Route::delete('/{project}',   'Project\ProjectController@destroy')->name('deleteProject')->middleware('auth');
    /* Project Gallery */
    Route::get('/{project}/gallery', 'Project\ProjectController@gallery')->name('projectImages')->middleware('auth');
    Route::post('/{project}/gallery', 'ProjectImage\ProjectImageController@store')->name('newProjectImage')->middleware('auth');
    Route::delete('/{project}/gallery/{projectImage}', 'ProjectImage\ProjectImageController@destroy')->name('deleteProjectImage')->middleware('auth');
    Route::get('/{project}/gallery/{projectImage}', 'ProjectImage\ProjectImageController@edit')->name('editProjectImage')->middleware('auth');
    Route::put('/{project}/gallery/{projectImage}', 'ProjectImage\ProjectImageController@update')->name('updateProjectImage')->middleware('auth');
});

Route::group(['prefix' => 'clients'], function (){
    Route::get('/',               'Client\ClientController@index')->name('clients')->middleware('auth');
    Route::get('/new',            'Client\ClientController@create')->name('newClient')->middleware('auth');
    Route::post('/',              'Client\ClientController@store')->name('storeClient')->middleware('auth');
    Route::get('/{client}/edit',  'Client\ClientController@edit')->name('editClient')->middleware('auth');
    Route::put('/{client}',       'Client\ClientController@update')->name('updateClient')->middleware('auth');
    Route::delete('/{client}',    'Client\ClientController@destroy')->name('deleteClient')->middleware('auth');
});

Route::group(['prefix' => 'news'], function (){
    Route::get('/',               'News\NewsController@index')->name('news')->middleware('auth');
    Route::get('/new',            'News\NewsController@create')->name('newNews')->middleware('auth');
    Route::post('/',              'News\NewsController@store')->name('storeNews')->middleware('auth');
    Route::get('/{news}/edit',    'News\NewsController@edit')->name('editNews')->middleware('auth');
    Route::put('/{news}',         'News\NewsController@update')->name('updateNews')->middleware('auth');
    Route::delete('/{news}',      'News\NewsController@destroy')->name('deleteNews')->middleware('auth');
});

Route::group(['prefix' => 'socials'], function (){
    Route::get('/',                'Social\SocialController@index')->name('socials')->middleware('auth');
    Route::get('/new',             'Social\SocialController@create')->name('newSocial')->middleware('auth');
    Route::post('/',               'Social\SocialController@store')->name('storeSocial')->middleware('auth');
    Route::get('/{social}/edit',   'Social\SocialController@edit')->name('editSocial')->middleware('auth');
    Route::put('/{social}',        'Social\SocialController@update')->name('updateSocial')->middleware('auth');
    Route::delete('/{social}',     'Social\SocialController@destroy')->name('deleteSocial')->middleware('auth');
});

Route::group(['prefix' => 'galleries'], function (){
    Route::get('/',                'Gallery\GalleryController@index')->name('galleries')->middleware('auth');
    Route::get('/new',             'Gallery\GalleryController@create')->name('newGallery')->middleware('auth');
    Route::post('/',               'Gallery\GalleryController@store')->name('storeGallery')->middleware('auth');
    Route::get('/{gallery}/edit',  'Gallery\GalleryController@edit')->name('editGallery')->middleware('auth');
    Route::put('/{gallery}',       'Gallery\GalleryController@update')->name('updateGallery')->middleware('auth');
    Route::delete('/{gallery}',    'Gallery\GalleryController@destroy')->name('deleteGallery')->middleware('auth');
});

Route::group(['prefix' => 'messages'], function (){
    Route::get('/',                'Message\MessageController@index')->name('messages')->middleware('auth');
    Route::delete('/{message}',    'Message\MessageController@destroy')->name('deleteMessage')->middleware('auth');
});


Route::group(['prefix' => 'users'], function (){
    Route::get('/',                'UserController@index')->name('users');
    Route::get('/new',             'UserController@create')->name('newUser');
    Route::post('/',               'UserController@store')->name('storeUser');
    Route::get('/{user}/edit',     'UserController@edit')->name('editUser');
    Route::put('/{user}',          'UserController@update')->name('updateUser');
    Route::delete('/{user}',       'UserController@destroy')->name('deleteUser');
});

Route::group(['prefix' => 'notification'], function (){
    Route::get('/',                'NotificationController@index')->name('notificationForm')->middleware('auth');
    Route::post('/',               'NotificationController@send')->name('notification')->middleware('auth');
});



