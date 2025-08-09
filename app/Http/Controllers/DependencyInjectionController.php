<?php

namespace App\Http\Controllers;

use App\Models\GeneratingObjects\CheckThing;
use App\Models\GeneratingObjects\DependencyInjection\DIContainer;
use App\Models\GeneratingObjects\Pinger;

class DependencyInjectionController extends Controller
{
    public function index() {
        $pageTitle = 'Dependency Injection';

        // Using Autowiring
        $container = new DIContainer(config_path('objects.xml'));

        $pinger = $container->get(Pinger::class);

        $output1 = $pinger->execute();   // Expected output: "All is well!"

        $container->customGen(CheckThing::class, function (DIContainer $container): object {
            $now = new \DateTime('now', new \DateTimeZone('UTC'));
            $css = 'myCssClass';
            return new CheckThing($now, $css);
        });

        $checker = $container->get(CheckThing::class);

        return view(
            'dependency-injection.index',
            compact('pageTitle', 'output1', 'checker'));
    }
}
