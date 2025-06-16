<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\NastyBoss;
use Illuminate\Http\Request;

class GeneratingObjectsController extends Controller
{
    public function index()
    {
        $boss = new NastyBoss();
        $boss->addEmployee('Harry');
        $boss->addEmployee('Bob');
        $boss->addEmployee('Mary');

        $output1 = $boss->projectFails();

        return view('generating_objects.index', compact('output1'));
    }
}
