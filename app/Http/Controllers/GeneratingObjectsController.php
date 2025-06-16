<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneratingObjectsController extends Controller
{
    public function index()
    {
        return view('generating_objects.index');
    }
}
