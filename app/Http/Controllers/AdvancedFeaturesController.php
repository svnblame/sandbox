<?php

namespace App\Http\Controllers;

use App\Models\AdvancedFeatures\Document;
use App\Models\AdvancedFeatures\ProductCategory;
use App\Models\AdvancedFeatures\ShopProduct;
use App\Models\AdvancedFeatures\SpreadSheet;
use App\Models\AdvancedFeatures\StaticExample;
use App\Models\AdvancedFeatures\TextProductWriter;
use App\Models\AdvancedFeatures\User;
use App\Models\AdvancedFeatures\UtilityService;
use App\Models\AdvancedFeatures\XmlProductWriter;
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

        $productCategory = '';
        if ($audioProduct->getCategory() === ProductCategory::audio) {
            $productCategory = 'This is an Audio Product by Enum value.';
        } else if ($audioProduct->getCategory()->name == 'audio') {
            $productCategory = 'This is an Audio Product by property value `name`';
        } else {
            $productCategory = 'This is NOT and audio Product.';
        }

        $randomCategory = print_r(ProductCategory::getRandomCategory(), true);

        $product1 = ShopProduct::find(1, $db_conn);
        $xmlWriter = new XmlProductWriter();
        $xmlWriter->addProduct($product1);
        $xmlProduct1 = $xmlWriter->write();

        $textWriter = new TextProductWriter();
        $textWriter->addProduct($product1);
        $textProduct1 = $textWriter->write();

        $p = new ShopProduct(ProductCategory::getRandomCategory());

        $pCalculatedTax = $p->calculateTax(125.00);

        $u = new UtilityService(100);
        $uFinalPrice = $u->getFinalPrice();

        $p2 = new ShopProduct(ProductCategory::getRandomCategory());
        $p2FinalPrice = $p2->calculateTax(150.00);
        $p2ID = $p2->generateID();

        $document = print_r(Document::create(), true);
        $user     = print_r(User::create(), true);
        $spreadSheet = print_r(SpreadSheet::create(), true);

        return view('advanced-features.index', [
            'greeting' => $greeting,
            'book' => $book->summaryLine(),
            'record' => $record->summaryLine(),
            'audioProduct' => $audioProduct->summaryLine(),
            'productCategory' => $productCategory,
            'randomCategory' => $randomCategory,
            'xmlProduct1' => $xmlProduct1,
            'textProduct1' => $textProduct1,
            'pCalculatedTax' => $pCalculatedTax,
            'uFinalPrice' => $uFinalPrice,
            'p2FinalPrice' => $p2FinalPrice,
            'p2ID' => $p2ID,
            'document' => $document,
            'user' => $user,
            'spreadSheet' => $spreadSheet,
        ]);
    }
}
