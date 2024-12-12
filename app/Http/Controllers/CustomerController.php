<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        // Paginate customers for the register page
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }
    public function storeCustomer(Request $request)
{
    // Validate form data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'gender' => 'required',
    ]);

    // Create customer
    Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'gender' => $request->gender,
    ]);

    // Redirect with success message
    return redirect()->route('view.customers')->with('success', 'Customer registered successfully!');
}




    public function view()
    {
        // Paginate customers for the customer-view page
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);

        // Pass the data to the view
        return view('customers.index', compact('customers'));
    }

    public function viewProducts($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $products = $customer->products; // Get products associated with the customer
        return view('customers.products', compact('customer', 'products'));
    }

    public function viewAllProducts()
{
    // Eager load the customer relationship to optimize database queries
    $products = Product::with('customer')->get(); // Fetch products with their associated customer

    return view('product-view', compact('products'));
}

    // Add a product to a customer (many-to-many relation)
    public function addProductToCustomer(Request $request, $customerId)
    {
        // Validate product_id from the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $customer = Customer::findOrFail($customerId);
        $product = Product::findOrFail($request->product_id);

        // Attach product to customer (many-to-many)
        $customer->products()->attach($product);

        return redirect()->route('view.customer.products', $customerId)->with('success', 'Product added to customer!');
    }

    // Remove a product from a customer (many-to-many relation)
    public function removeProductFromCustomer(Request $request, $customerId, $productId)
    {
        // Validate product_id from the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $customer = Customer::findOrFail($customerId);
        $product = Product::findOrFail($productId);

        // Detach product from customer
        $customer->products()->detach($product);

        return redirect()->route('view.customer.products', $customerId)->with('success', 'Product removed from customer!');
    }
}
