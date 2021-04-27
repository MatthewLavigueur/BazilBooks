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

Route::get('/', function () {
    return view('login');
});


Route::get('/login', 'loginController@index');
Route::post('authentication', 'loginController@authentication');
Route::get('/logout', 'loginController@logout');


Route::group(['middleware' => 'authverify'], function(){


            Route::get('register', 'registerController@index');
            Route::post('register-insert', 'registerController@save');
            Route::get('user-list', 'registerController@userList');
            Route::get('user-delete-{id?}', 'registerController@userDelete');
            Route::get('user-edit-{id?}','registerController@userEdit');
            Route::post('user-edit','registerController@userEditPost');      
            Route::post('user-delete', 'registerController@userDeletePost');

            Route::get('customer', 'customerController@index');
            Route::post('customer-insert', 'customerController@save');
            Route::get('customer-list', 'customerController@customerList');
            Route::get('customer-edit-{id?}','customerController@customerEdit');
            Route::post('customer-edit','customerController@customerEditPost');
            Route::post('customer-delete', 'customerController@customerDeletePost');
         
            Route::get('payment', 'paymentController@index');
            Route::post('payment-insert', 'paymentController@save');
            Route::get('payment-list', 'paymentController@paymentList');
            Route::get('payment-edit-{id?}','paymentController@paymentEdit');
            Route::post('payment-edit','paymentController@paymentEditPost');
            Route::post('payment-delete', 'paymentController@paymentDeletePost');

            Route::get('genre', 'genreController@index');
            Route::post('genre-insert', 'genreController@save');
            Route::get('genre-list', 'genreController@genreList');
            Route::get('genre-edit-{id?}','genreController@genreEdit');
            Route::post('genre-edit','genreController@genreEditPost');
            Route::post('genre-delete', 'genreController@genreDeletePost');
    
            Route::get('publisher', 'publisherController@index');
            Route::post('publisher-insert', 'publisherController@save');
            Route::get('publisher-list', 'publisherController@publisherList');
            Route::get('publisher-edit-{id?}','publisherController@publisherEdit');
            Route::post('publisher-edit','publisherController@publisherEditPost');
            Route::post('publisher-delete', 'publisherController@publisherDeletePost');
          
            Route::get('country', 'countryController@index');
            Route::post('country-insert', 'countryController@save');
            Route::get('country-list', 'countryController@countryList');
            Route::get('country-edit-{id?}','countryController@countryEdit');
            Route::post('country-edit','countryController@countryEditPost');
            Route::post('country-delete', 'countryController@countryDeletePost');

            Route::get('author', 'authorController@index');
            Route::post('author-insert', 'authorController@save');
            Route::get('author-list', 'authorController@authorList');
            Route::get('author-edit-{id?}','authorController@authorEdit');
            Route::post('author-edit','authorController@authorEditPost');
            Route::post('author-delete', 'authorController@authorDeletePost');
         
            Route::get('books', 'booksController@index');
            Route::post('books-insert', 'booksController@save');
            Route::get('books-list', 'booksController@booksList');
            Route::get('books-edit-{id?}','booksController@booksEdit');
            Route::post('books-edit','booksController@booksEditPost');
            Route::post('books-delete', 'booksController@booksDeletePost');

            Route::get('invoice', 'invoiceController@index');
            Route::post('invoice', 'invoiceController@save');
            Route::get('invoice-{id?}', 'invoiceController@invoiceBooks');
            Route::get('invoice-delete-{id?}', 'invoiceController@invoiceBooksDelete');
            Route::get('invoice-edit-{id?}','invoiceController@invoiceEdit');
            Route::post('add-book', 'invoiceController@addBook');
            Route::get('invoice', 'invoiceController@invoiceList');
            Route::get('invoicePDF-{id?}', 'invoiceController@invoicePDF');


     
});