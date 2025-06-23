<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\EarthForest;
use App\Models\GeneratingObjects\EarthPlains;
use App\Models\GeneratingObjects\EarthSea;
use App\Models\GeneratingObjects\Employee;
use App\Models\GeneratingObjects\NastyBoss;
use App\Models\GeneratingObjects\Preferences;
use App\Models\GeneratingObjects\TerrainFactory;

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

        $factory = new TerrainFactory(
            new EarthSea(-1),
            new EarthPlains(),
            new EarthForest()
        );

        $earthSea = print_r($factory->getSea(), true);
        $earthPlains = print_r($factory->getPlains(), true);
        $earthForest = print_r($factory->getForest(), true);

        return view('generating_objects.index', compact(
            'output',
            'name',
            'earthSea',
            'earthPlains',
            'earthForest'
        ));
    }
}
