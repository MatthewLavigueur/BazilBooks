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


Route::get('/login', 'LoginController@index');
Route::post('authentication', 'LoginController@authentication');
Route::get('/logout', 'LoginController@logout');
Route::get('register', 'RegisterController@index');
Route::post('register-insert', 'RegisterController@save');

Route::group(['middleware' => 'authverify'], function(){


       
            Route::get('user-list', 'RegisterController@userList');
            Route::get('user-delete-{id?}', 'RegisterController@userDelete');
            Route::get('user-edit-{id?}','RegisterController@userEdit');
            Route::post('user-edit','RegisterController@userEditPost');      
            Route::post('user-delete', 'RegisterController@userDeletePost');

            Route::get('customer', 'CustomerController@index');
            Route::post('customer-insert', 'CustomerController@save');
            Route::get('customer-list', 'CustomerController@customerList');
            Route::get('customer-edit-{id?}','CustomerController@customerEdit');
            Route::post('customer-edit','CustomerController@customerEditPost');
            Route::post('customer-delete', 'CustomerController@customerDeletePost');
         
            Route::get('payment', 'PaymentController@index');
            Route::post('payment-insert', 'PaymentController@save');
            Route::get('payment-list', 'PaymentController@paymentList');
            Route::get('payment-edit-{id?}','PaymentController@paymentEdit');
            Route::post('payment-edit','PaymentController@paymentEditPost');
            Route::post('payment-delete', 'PaymentController@paymentDeletePost');

            Route::get('genre', 'GenreController@index');
            Route::post('genre-insert', 'GenreController@save');
            Route::get('genre-list', 'GenreController@genreList');
            Route::get('genre-edit-{id?}','GenreController@genreEdit');
            Route::post('genre-edit','GenreController@genreEditPost');
            Route::post('genre-delete', 'GenreController@genreDeletePost');
    
            Route::get('publisher', 'PublisherController@index');
            Route::post('publisher-insert', 'PublisherController@save');
            Route::get('publisher-list', 'PublisherController@publisherList');
            Route::get('publisher-edit-{id?}','PublisherController@publisherEdit');
            Route::post('publisher-edit','PublisherController@publisherEditPost');
            Route::post('publisher-delete', 'PublisherController@publisherDeletePost');
          
            Route::get('country', 'CountryController@index');
            Route::post('country-insert', 'CountryController@save');
            Route::get('country-list', 'CountryController@countryList');
            Route::get('country-edit-{id?}','CountryController@countryEdit');
            Route::post('country-edit','CountryController@countryEditPost');
            Route::post('country-delete', 'CountryController@countryDeletePost');

            Route::get('author', 'AuthorController@index');
            Route::post('author-insert', 'AuthorController@save');
            Route::get('author-list', 'AuthorController@authorList');
            Route::get('author-edit-{id?}','AuthorController@authorEdit');
            Route::post('author-edit','AuthorController@authorEditPost');
            Route::post('author-delete', 'AuthorController@authorDeletePost');
         
            Route::get('books', 'BooksController@index');
            Route::post('books-insert', 'BooksController@save');
            Route::get('books-list', 'BooksController@booksList');
            Route::get('books-edit-{id?}','BooksController@booksEdit');
            Route::post('books-edit','BooksController@booksEditPost');
            Route::post('books-delete', 'BooksController@booksDeletePost');

            Route::get('invoice', 'InvoiceController@index');
            Route::post('invoice', 'InvoiceController@save');
            Route::get('invoice-{id?}', 'InvoiceController@invoiceBooks');
            Route::get('invoice-delete-{id?}', 'InvoiceController@invoiceBooksDelete');
            Route::get('invoice-edit-{id?}','InvoiceController@invoiceEdit');
            Route::post('add-book', 'InvoiceController@addBook');
            Route::get('invoice', 'InvoiceController@invoiceList');
            Route::get('invoicePDF-{id?}', 'InvoiceController@invoicePDF');


     
});