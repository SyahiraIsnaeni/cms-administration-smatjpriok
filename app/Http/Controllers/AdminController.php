<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController
{
    public function dashboard():Response{
        return response()
            ->view("back.admin.dashboard");
    }
}