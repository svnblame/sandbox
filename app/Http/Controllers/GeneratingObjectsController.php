<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\NastyBoss;
use App\Models\GeneratingObjects\Minion;
use App\Models\GeneratingObjects\CluedUp;


class GeneratingObjectsController extends Controller
{
    public function index()
    {
        $output = [];

        $boss = new NastyBoss();
        $boss->addEmployee(new Minion('Harry'));
        $boss->addEmployee(new CluedUp('Bob'));
        $boss->addEmployee(new Minion('Mary'));

        $output[] = $boss->projectFails();
        $output[] = $boss->projectFails();
        $output[] = $boss->projectFails();

        return view('generating_objects.index', compact('output'));
    }
}
