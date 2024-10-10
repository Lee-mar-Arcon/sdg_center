<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
