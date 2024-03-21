<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OsisController
{
    public function dashboard():Response{
        return response()
            ->view("back.osis.dashboard");
    }
}
