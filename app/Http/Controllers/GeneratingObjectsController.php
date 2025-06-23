<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\BloggsCommsManager;
use App\Models\GeneratingObjects\Employee;
use App\Models\GeneratingObjects\NastyBoss;
use App\Models\GeneratingObjects\Preferences;
use App\Models\GeneratingObjects\CommsManager;
use App\Models\GeneratingObjects\EncoderType;

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

        $pref = Preferences::getInstance();
        $pref->setProperty('name', 'Gene');

        unset($pref);   // remove the reference

        $pref2 = Preferences::getInstance();
        $name = $pref2->getProperty('name');

        $bloggs = new BloggsCommsManager();

        return view('generating_objects.index', compact(
            'output',
            'name',
            'bloggs'
        ));
    }
}
