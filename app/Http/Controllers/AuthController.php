<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\Customer;

class AuthController extends Controller
{
    public function index(){
        $customer = Auth::user();
        return view('home', compact('customer'));
    }

    public function showLogin(){
        return view('login');
    }

    public function login(Request $request)
{
    // Validate the incoming request
    $credentials = $request->validate([
        'email' => 'required|email|exists:customers,email',
        'password' => 'required',
    ]);

    // Check if the customer with the provided email exists
    $customer = Customer::where('email', $credentials['email'])->first();


    if ($customer && Hash::check($credentials['password'], $customer->password)) {
        Auth::login($customer);
        return redirect('/')->with('success', 'Successfully logged in!');
    }

    // If the email exists, check if the password matches
    if (!Hash::check($credentials['password'], $customer->password)) {
        return back()->withErrors([
            'password' => 'The provided password does not match our records.',
        ])->withInput();
    }

    // If both email and password match, log the user in
}




    // public function showOrders(){
    //         $customer = Auth::user();
    //         if(!$customer){
    //             return redirect('/login')->with('Error', 'Please login to view your orders.');
    //         }
    //         $orders = $customer->orders;
    //         return view('customer.orders', compact('orders'));
    // }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('success', 'Logout successful!');
}

protected function authenticated(Request $request, $user)
{
    return redirect()->route('show.orders');
}


}


