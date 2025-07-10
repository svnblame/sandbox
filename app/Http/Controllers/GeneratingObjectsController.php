<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\AppConfig;
use App\Models\GeneratingObjects\AppointmentMaker2;
use App\Models\GeneratingObjects\ApptEncoder;
use App\Models\GeneratingObjects\BloggsApptEncoder;
use App\Models\GeneratingObjects\Container;
use App\Models\GeneratingObjects\EarthForest;
use App\Models\GeneratingObjects\EarthPlains;
use App\Models\GeneratingObjects\EarthSea;
use App\Models\GeneratingObjects\Employee;
use App\Models\GeneratingObjects\MegaApptEncoder;
use App\Models\GeneratingObjects\NastyBoss;
use App\Models\GeneratingObjects\Preferences;
use App\Models\GeneratingObjects\ProdType;
use App\Models\GeneratingObjects\TerrainFactory;
use JetBrains\PhpStorm\NoReturn;

class GeneratingObjectsController extends Controller
{
    /**
     * @throws \ReflectionException
     */
    #[NoReturn]
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

        $commsManger = Appconfig::getInstance()->getCommsManager();

        $megaApptEncoding = $commsManger->make(ProdType::appt)->encode();

        // Dependency Injection example
//        $assembler = new Container(config_path('objects.xml'));
//        $encoder = $assembler->get(ApptEncoder::class);
//        $apptMaker = new AppointmentMaker2($encoder);
//        $appointmentOutput = $apptMaker->makeAppointment();

        // Concrete object created even if not in the config file
//        $assembler2 = new Container(config_path('objects.xml'));
//        $encoder2 = $assembler2->get(MegaApptEncoder::class);
//        $apptMaker2 = new AppointmentMaker2($encoder2);
//        $appointmentOutput2 = $apptMaker2->makeAppointment();

        $assembler = new Container(config_path('objects.xml'));
        $apptMaker = $assembler->get(AppointmentMaker2::class);
        $appointmentOutput = $apptMaker->makeAppointment();

        return view('generating_objects.index', compact(
            'output',
            'name',
            'earthSea',
            'earthPlains',
            'earthForest',
            'megaApptEncoding',
            'appointmentOutput',
//            'appointmentOutput2',
        ));
    }
}
