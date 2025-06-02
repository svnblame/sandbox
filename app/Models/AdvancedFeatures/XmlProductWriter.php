<?php

namespace App\Models\AdvancedFeatures;

use XMLWriter;

class XmlProductWriter extends ShopProductWriter
{
    public function write(): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('products');

        foreach ($this->products as $product) {
            $writer->startElement('product');
            $writer->writeAttribute('title', $product->getTitle());
            $writer->startElement('summary');
            $writer->text($product->summaryLine());
            $writer->endElement(); // summary
            $writer->endElement(); // product
        }
        $writer->endElement(); // products
        $writer->endDocument();

        return $writer->flush();
    }
}
