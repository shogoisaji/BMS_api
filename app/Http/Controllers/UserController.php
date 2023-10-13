<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function account()
    {
        $user = auth()->user();

        return response()->json(['user' => $user], 200);
    }

}
