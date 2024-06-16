<?php

// app/Services/UserService.php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserService
{
    /**
     * Register a new user.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function registerUser($data)
    {
        // Create a new user record
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
        ]);
    }

    /**
     * Login a user.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function loginUser($credentials)
    {
        // Attempt to log in the user
        return Auth::attempt($credentials);
    }

    /**
     * Update user profile information.
     *
     * @param  \App\Models\User  $user
     * @param  array  $data
     * @return void
     */
    public function updateUserProfile($user, $data)
    {
        // Update user's name and phone
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->save();
    }

    /**
     * Logout the user.
     *
     * @return void
     */
    public function logoutUser()
    {
        // Clear session data and logout the user
        Session::flush();
        Auth::logout();
    }
}
