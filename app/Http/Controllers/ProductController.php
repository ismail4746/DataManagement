<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Fetch products with the associated customer, ordered by creation date
            $products = Product::with('customer')->orderBy('created_at', 'desc');

            return DataTables::of($products)
                ->addColumn('action', function($product) {
                    // Return action buttons (Edit and Delete buttons) for each product
                    return view('products.actions', compact('product'))->render();
                })
                ->make(true);  // Return the data in the correct JSON format for DataTables
        }

        // If it's not an AJAX request, just return the view
        return view('products.index');
    }


    // Show the form to create a new product
    public function create()
    {
        $customers = Customer::all();
        return view('products.create', compact('customers'));
    }

    // Store a newly created product
    public function store(Request $request)
{

    // Validate the incoming request data
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string',
        'product_price' => 'required|numeric',
        'customer_id' => 'required|exists:customers,customer_id',
    ]);
    // Create a new product record in the database
    Product::create([
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_price' => $request->product_price,
        'customer_id' => $request->customer_id, // Store the customer_id
    ]);

    // Redirect to the product list page with a success message
    return redirect()->route('view.products')->with('success', 'Product created successfully!');
}




public function edit($id){
    $product = Product::find($id);
    $customers = Customer::all();
    return view('products.edit', compact('product', 'customers'));

}

public function update(Request $request, $id)
{
    // Validate the form data
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string',
        'product_price' => 'required|numeric',
        'customer_id' => 'required|exists:customers,customer_id',
    ]);

    // Find the product by ID and update it
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('view.products')->with('error', 'Product not found.');
    }

    $product->update($validated);

    return redirect()->route('view.products')->with('success', 'Product updated successfully!');
}


public function delete($id)
{
    $product = Product::find($id);
    if (!$product) {
        return redirect()->route('view.products')->with('error', 'Product not found.');
    }
    $product->delete();
    return redirect()->route('view.products')->with('success', 'Product deleted successfully!');
}


}
