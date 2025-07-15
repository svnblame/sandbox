<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\AppointmentMaker2;
use App\Models\GeneratingObjects\ApptEncoder;
use App\Models\GeneratingObjects\DependencyInjection\DIContainer;

class DependencyInjectionController extends Controller
{
    public function index() {
        $pageTitle = 'Dependency Injection';

        $assembler = new DIContainer(config_path('objects-di.xml'));

        $encoder = $assembler->get(ApptEncoder::class);

        $apptMaker = new AppointmentMaker2($encoder);

        $output = $apptMaker->makeAppointment();

        return view(
            'dependency-injection.index',
            compact('pageTitle', 'output'));
    }
}
