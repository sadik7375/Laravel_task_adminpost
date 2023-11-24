<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;
use App\Models\AdminModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminLogin');
    }


    //admin login
    public function login(Request $request)
    {
        $credentials = $request->only('user_name', 'password');

        $user = AdminModel::where('user_name', $credentials['user_name'])
                    ->where('password', $credentials['password'])
                    ->first();

        if ($user) {
            // Authentication passed
            // You may want to log in the user using Laravel's auth system
            // auth()->login($user);
            $request->session()->put('user_name', $user->user_name);
            return redirect()->route('admin'); // Replace with your intended redirect path
        }

        // Authentication failed
        return back()->withErrors(['user_name' => 'Invalid credentials'])->withInput();
    }
}
