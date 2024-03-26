<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {
        return response()
            ->view("front.login", [
                "title" => "Login Admin SMA Tanjung Priok"
            ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse{
        $email = $request->input('email');
        $password = $request->input('password');

        if (empty($email) || empty($password)) {
            return response()->view("front.login", [
                "title" => "Login Admin SMA Tanjung Priok",
                "error" => "Email or password is required!"
            ]);
        }

        if ($this->userService->login($email, $password)) {
            $user = $this->userService->getUserByEmail($email);

            if ($user->role === 'admin') {
                $request->session()->put("admin", $email);
                return redirect("/dashboard/admin");
            } elseif ($user->role === 'osis') {
                $request->session()->put("osis", $email);
                return redirect("/dashboard-osis/admin");
            }
        }

        return response()->view("front.login", [
            "title" => "Login Admin SMA Tanjung Priok",
            "error" => "Email or password is wrong!"
        ]);
    }

    public function logout(Request $request): RedirectResponse{
        $request->session()->flush();

        $request->session()->regenerate(true);

        return redirect('/login');
    }
}
