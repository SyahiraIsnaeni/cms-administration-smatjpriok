<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserServiceImpl implements UserService
{
     public function login(string $email, string $password): bool
     {
         return Auth::attempt([
             "email" => $email,
             "password" => $password
         ]);
     }

     public function getUserByEmail(string $email): ?User
     {
         return User::where('email', $email)->first();
     }
}
