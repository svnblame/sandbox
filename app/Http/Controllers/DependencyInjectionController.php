<?php

namespace App\Http\Controllers;

class DependencyInjectionController extends Controller
{
    public function index() {
        $pageTitle = 'Dependency Injection';
        return view('dependency-injection.index', compact('pageTitle'));
    }
}
