<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('filter.header');
    }

    public function index($name)
    {

    }
}
