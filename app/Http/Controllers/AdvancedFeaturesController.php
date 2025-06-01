<?php

namespace App\Http\Controllers;

use App\Models\AdvancedFeatures\StaticExample;

class AdvancedFeaturesController extends Controller
{
    public function index()
    {
        $greeting = StaticExample::sayHello();
        dd($greeting);
    }
}
