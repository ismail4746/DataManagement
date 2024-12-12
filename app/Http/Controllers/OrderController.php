<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->customer_id)->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        // Fetch all customers to show in the form
        $customer = Auth::user();
        return view('orders.form', compact('customer'));
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
        // Calculate total amount
        $totalAmount = $validatedData['quantity'] * $validatedData['price'];

        // Create a new order with the data from the request
        $order = Order::create($validatedData + ['total_amount' => $totalAmount]);

        // Redirect to the orders list with a success message
        return redirect(route('orders.index'))->with('success', 'Order created successfully!');
    }

    public function showOrders()
    {
        $customer = Auth::user(); // Get the authenticated customer
        // @dd($customer);

        $orders = $customer->orders()->with('customer')->select(
            'id',
            'customer_id',
            'product_name',
            'quantity',
            'price',
            DB::raw('quantity * price as total_amount')
        )->get();

        // if ($orders->isEmpty()) {
        //     return redirect()->back()->with('error', 'You have no orders.');
        // }

        return view('orders.index', compact('orders', 'customer'));
    }
}
