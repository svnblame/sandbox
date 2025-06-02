<?php

namespace App\Http\Controllers;

use App\Models\AdvancedFeatures\ShopProduct;
use App\Models\AdvancedFeatures\StaticExample;
use PDOException;

class AdvancedFeaturesController extends Controller
{
    public function index()
    {
        $greeting = StaticExample::sayHello();

        // Create and return a new PDO database connection
        try {
            $db_conn = require_once(database_path('connection.php'));
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        $book = ShopProduct::getInstance(1, $db_conn);

        return view('advanced-features.index', ['greeting' => $greeting, 'book' => $book]);
    }
}
