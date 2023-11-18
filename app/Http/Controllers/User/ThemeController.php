<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ThemeController extends Controller
{
    public function index_page(Request $request)
    {
        return view('index');
    }
}
