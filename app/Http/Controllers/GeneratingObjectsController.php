<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\Employee;
use App\Models\GeneratingObjects\NastyBoss;

class GeneratingObjectsController extends Controller
{
    public function index()
    {
        $output = [];

        $boss = new NastyBoss();
        $boss->addEmployee(Employee::recruit('Harry'));
        $boss->addEmployee(Employee::recruit('Bob'));
        $boss->addEmployee(Employee::recruit('Mary'));

        $output[] = $boss->projectFails();
        $output[] = $boss->projectFails();
        $output[] = $boss->projectFails();

        return view('generating_objects.index', compact('output'));
    }
}
