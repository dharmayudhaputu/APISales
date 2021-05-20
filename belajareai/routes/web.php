<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('login', ['uses' =>'LoginController@index']);

// membuat router
$router->group( ['prefix' => 'api', 'middleware'=>'auth'] , function() use ($router) {

    // routes untuk Product
    $router->get('Product', ['uses' =>'ProductController@index']);

    $router->get('Product/{id}', ['uses' => 'ProductController@show']);

    $router->delete('Product/{id}', ['uses' => 'ProductController@destroy']);
    
    $router->put('Product/{id}', ['uses' =>'ProductController@update']);
    
    $router->post('Product', ['uses' =>'ProductController@create']);
    //akhir untuk Product

    // routes untuk quotation
    $router->get('Quotation', ['uses' =>'QuotationController@index']);

    $router->get('Quotation/{id}', ['uses' => 'QuotationController@show']);
    
    $router->delete('Quotation/{id}', ['uses' => 'QuotationController@destroy']);
        
    $router->put('Quotation/{id}', ['uses' =>'QuotationController@update']);
        
    $router->post('Quotation', ['uses' =>'QuotationController@create']);
    //akhir untuk quotation

    // routes untuk invoice
    $router->get('Invoice', ['uses' =>'InvoiceController@index']);

    $router->get('Invoice/{id}', ['uses' => 'InvoiceController@show']);
    
    $router->delete('Invoice/{id}', ['uses' => 'InvoiceController@destroy']);
        
    $router->put('Invoice/{id}', ['uses' =>'InvoiceController@update']);
        
    $router->post('Invoice', ['uses' =>'InvoiceController@create']);
    //akhir untuk invoice

    // routes untuk sales order
    $router->get('SalesOrder', ['uses' =>'SalesOrderController@index']);

    $router->get('SalesOrder/{id}', ['uses' => 'SalesOrderController@show']);
    
    $router->delete('SalesOrder/{id}', ['uses' => 'SalesOrderController@destroy']);
        
    $router->put('SalesOrder/{id}', ['uses' =>'SalesOrderController@update']);
        
    $router->post('SalesOrder', ['uses' =>'SalesOrderController@create']);
    //akhir untuk sales order


    // routes untuk unpopular product
    $router->get('UnpopularProduct', ['uses' =>'UnpopularProductController@index']);

    $router->get('UnpopularProduct/{id}', ['uses' => 'UnpopularProductController@show']);
    
    $router->delete('UnpopularProduct/{id}', ['uses' => 'UnpopularProductController@destroy']);
        
    $router->put('UnpopularProduct/{id}', ['uses' =>'UnpopularProductController@update']);
        
    $router->post('UnpopularProduct', ['uses' =>'UnpopularProductController@create']);
    //akhir untuk unpopular product


    // routes untuk customer
    $router->get('Customer', ['uses' =>'CustomerController@index']);

    $router->get('Customer/{id}', ['uses' => 'CustomerController@show']);
    
    $router->delete('Customer/{id}', ['uses' => 'CustomerController@destroy']);
        
    $router->put('Customer/{id}', ['uses' =>'CustomerController@update']);
        
    $router->post('Customer', ['uses' =>'CustomerController@create']);
    //akhir untuk customer


});