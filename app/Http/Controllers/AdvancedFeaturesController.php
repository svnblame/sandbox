<?php

namespace App\Http\Controllers;

use App\Models\AdvancedFeatures\ProductCategory;
use App\Models\AdvancedFeatures\ShopProduct;
use App\Models\AdvancedFeatures\StaticExample;
use PDOException;

class AdvancedFeaturesController extends Controller
{
    /**
     * @throws \Exception
     */
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

        $record = ShopProduct::find(1, $db_conn);
        $book = ShopProduct::find(2, $db_conn);

        $audioProduct = ShopProduct::getInstance(
            ProductCategory::audio,
            'Lonesome Blues',
            'Bob',
            'Dylan',
            15.99,
            52,
        );

        return view('advanced-features.index', [
            'greeting' => $greeting,
            'book' => $book->summaryLine(),
            'record' => $record->summaryLine(),
            'audioProduct' => $audioProduct->summaryLine(),
        ]);
    }
}
