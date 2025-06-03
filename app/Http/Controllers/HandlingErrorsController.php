<?php

namespace App\Http\Controllers;

use App\Models\AdvancedFeatures\ConfManager;
use Exception;

class HandlingErrorsController extends Controller
{
    public function index()
    {
        try {
            $results = ConfManager::init();

            return view('handling-errors.index', compact('results'));
        } catch (Exception $e) {
            $errorMessage = 'Error: ' . $e->getMessage() . PHP_EOL;
            $errorMessage .= 'File: ' . $e->getFile() . ' on line ' . $e->getLine() . PHP_EOL;

            return view('errors.error', ['errorMessage' => $errorMessage]);
        }
    }
}
