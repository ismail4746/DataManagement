<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});



Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('register.form');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Route to display the registration form
Route::get('/register', [RegistrationController::class, 'index'])->name('register.form');

// Route to show the list of customers
Route::get('/customers', [CustomerController::class, 'view'])->name('view.customers');

// Route to handle customer registration (POST)
Route::post('/register', [CustomerController::class, 'storeCustomer'])->name('customers.store');
// Route::post('/register', [CustomerController::class, 'register'])->name('customers.create');
Route::get('/customers/orders', [OrderController::class, 'index'])->name('orders.index');
Route::post('/customers/{customerId}/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');


Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/', [AuthController::class, 'index'])->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route to display the order creation form
Route::get('create', [OrderController::class, 'create'])->name('orders.create');

// Route to store the order data
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

// Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders.index')->middleware('auth');
// Route::get('/orders', [OrderController::class, 'showOrders'])->name('orders');
// Route::get('/orders', [OrderController::class, 'showOrders'])->middleware('auth');
Route::middleware(['auth'])->get('/orders', [OrderController::class, 'showOrders'])->name('orders.show');

// Customer and Product Relationship Routes

// Show all products
// Route::get('/products', [ProductController::class, 'viewAllProducts'])->name('view.products');
Route::get('/products', [ProductController::class, 'index'])->name('view.products');


// Show the form to create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('create.product');

// Store a newly created product
Route::post('/products', [ProductController::class, 'store'])->name('store.product');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('edit.product'); // For showing the edit form
Route::put('products/{id}/update', [ProductController::class, 'update'])->name('update.product');


Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');

// Route::get('/customers/{customerId}/products', [CustomerController::class, 'viewProducts'])->name('view.customer.products'); // Show products for a specific customer
// Route::post('/customers/{customerId}/products', [CustomerController::class, 'addProductToCustomer'])->name('add.product.to.customer'); // Add product to customer (many-to-many relation)
// Route::delete('/customers/{customerId}/products/{productId}', [CustomerController::class, 'removeProductFromCustomer'])->name('remove.product.from.customer'); // Remove product from customer
