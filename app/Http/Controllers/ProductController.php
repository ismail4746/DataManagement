<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $products = Product::with('customer')->orderBy('created_at', 'desc')->get();
            $products = Product::orderBy('created_at', 'desc');

            if ($request->has('customer_status') && $request->customer_status) {
                $products = $products->withRelationship('customer', ['status' => $request->customer_status]);
            } else {
                $products = $products->with('customer');
            }

            return DataTables::of($products)
                ->addColumn('action', function($product) {
                    return view('products.actions', compact('product'))->render();
                })
                ->editColumn('product_image', function ($product) {
                    // Display the product image or a default image
                    $imagePath = $product->image ? asset("storage/{$product->image}") : asset('images/default.png');
                    return "<img src='{$imagePath}' alt='Product Image' style='width:50px; height:50px;' />";
                })
                ->rawColumns(['action', 'product_image'])
                ->make(true);
        }

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
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');
        } else {
            $imagePath = 'images/default.png';
        }

        // Create the product record
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'customer_id' => $request->customer_id,
            'image' => $imagePath,
        ]);

        // Redirect to the product list page with a success message
        return redirect()->route('view.products')->with('success', 'Product created successfully!');
    }

    // Show the form to edit an existing product
    public function edit($id)
    {
        $product = Product::findProduct($id);

        if (!$product) {
            return redirect()->route('view.products')->with('error', 'Product not found.');
        }

        $customers = Customer::all();
        return view('products.edit', compact('product', 'customers'));
    }

    // Update the existing product
    public function update(Request $request, $id)
{
    // Validate the form data
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string',
        'product_price' => 'required|numeric',
        'customer_id' => 'required|exists:customers,customer_id',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findProduct($id);
    if (!$product) {
        return redirect()->route('view.products')->with('error', 'Product not found.');
    }

    if ($request->hasFile('product_image')) {
        if ($product->image && $product->image !== 'images/default.png') {
            Storage::delete('public/' . $product->image);
        }

        $imagePath = $request->file('product_image')->store('product_images', 'public');
        $validated['image'] = $imagePath;
    }

    $product->update($validated);

    return redirect()->route('view.products')->with('success', 'Product updated successfully!');
}


    // Delete an existing product
    public function delete($id)
    {
        $product = Product::findProduct($id);

        if (!$product) {
            return redirect()->route('view.products')->with('error', 'Product not found.');
        }

        // Delete the product
        $product->delete();

        return redirect()->route('view.products')->with('success', 'Product deleted successfully!');
    }
}
