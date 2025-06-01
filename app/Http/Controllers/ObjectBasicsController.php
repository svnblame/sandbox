<?php

namespace App\Http\Controllers;

use App\Models\ObjectBasics\ShopProduct;
use App\Models\ObjectBasics\AddressManager;
use App\Models\ObjectBasics\ShopProductWriter;
use App\Models\ObjectBasics\Wrong;

class ObjectBasicsController extends Controller
{
    public function index()
    {
        $product = new ShopProduct(
            title: "My Antonia",
            producerFirstName: "Willa",
            producerMainName: "Cather",
            price: 5.99
        );

        $author = "author: {$product->producer}";

        $settings = simplexml_load_file(config_path('settings.xml'));
        $manager = new AddressManager();
        $resolve = $settings->resolvedomains == 'true';
        $addresses = $manager->outputAddresses($resolve);

         $product2 = new ShopProduct(
            title: "Exile on Coldharbour Lane",
            producerFirstName: "The",
            producerMainName: "Alabama 3",
            price: 10.99);
        $writer = new ShopProductWriter();
        $summary = $writer->summaryLine($product2);

        return view("object-basics.index", compact('author', 'addresses', 'summary'));
    }
}
