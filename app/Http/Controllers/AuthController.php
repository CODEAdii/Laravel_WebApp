<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Register new user
    public function register(Request $request)
    {
        // Handle form submission
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string',
                'email' => ['required', 'email', 'unique:users,email'],
                'phone' => 'required',
                'password' => [
                    'required',
                    'confirmed',
                    'min:8', // Minimum password length
                ],
            ]);

            // Register user and attempt login
            $user = $this->userService->registerUser($request->only('name', 'email', 'password', 'phone'));

            if ($user && $this->userService->loginUser(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('register')->withErrors(['login' => 'Failed to log in after registration.']);
            }
        }

        // Show registration form
        return view('auth.register');
    }

    // User login
    public function login(Request $request)
    {
        // Handle login form submission
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email|string|exists:users,email',
                'password' => 'required',
            ]);

            // Attempt user login
            if ($this->userService->loginUser($request->only('email', 'password'))) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Invalid login credentials.');
            }
        }

        // Show login form
        return view('auth.login');
    }

    // Dashboard view
    public function dashboard()
    {
        // Retrieve the first uploaded time from Scheme model
        $firstUploadedTime = Scheme::min('created_at');
        return view('dashboard', compact('firstUploadedTime'));
    }

    // User profile update
    public function profile(Request $request)
    {
        // Handle profile update form submission
        if ($request->isMethod("post")) {
            $request->validate([
                'name' => 'required|string',
                'phone' => 'required',
            ]);

            // Update user profile
            $this->userService->updateUserProfile(auth()->user(), $request->only('name', 'phone'));

            return redirect()->route("dashboard")->with("success", "Profile updated");
        }

        // Show profile view
        return view('profile');
    }

    // User logout
    public function logout()
    {
        // Logout user
        $this->userService->logoutUser();
        return redirect()->route('login')->with("success", "Logged out successfully");
    }

	/**
	 * @return mixed
	 */
	public function getUserService() {
		return $this->userService;
	}
	
	/**
	 * @param mixed $userService 
	 * @return self
	 */
	public function setUserService($userService): self {
		$this->userService = $userService;
		return $this;
	}
}
