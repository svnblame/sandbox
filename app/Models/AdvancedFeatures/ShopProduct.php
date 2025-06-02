<?php

namespace App\Models\AdvancedFeatures;

use App\IdentityTrait;
use App\PriceUtilities;
use App\TaxTools;

class ShopProduct implements Chargeable, IdentityObject
{
    use PriceUtilities;
    use IdentityTrait;
    use TaxTools {
        TaxTools::calculateTax insteadof PriceUtilities;
    }

    private int $id = 0;

    private int|float $discount = 0;
    public readonly string $producer;

    public function __construct(
        private readonly ProductCategory $productCategory,
        public readonly string $title = 'Default Product',
        public readonly string $producerFirstName = 'First Name',
        public readonly string $producerMainName = 'Main Name',
        public int|float $price = 0,
        protected int $length = 0
    ) {
        $this->producer = $this->producerFirstName . ' '
            . $this->producerMainName;
    }

    /**
     * @throws \Exception
     */
    public static function getInstance(
        ProductCategory $type,
        string $title,
        string $producerFirstName = '',
        string $producerMainName = '',
        int|float $price = 0,
        int $length = 0
    ): self {
        return match ($type) {
            ProductCategory::audio => new RecordProduct($title, $producerFirstName, $producerMainName, $price, $length),
            ProductCategory::reading => new BookProduct($title, $producerFirstName, $producerMainName, $price, $length),
            ProductCategory::household, ProductCategory::clothing, ProductCategory::grocery => throw new \Exception('To be implemented'),
        };
    }

    public static function find(int $id, \PDO $pdo): ?ShopProduct
    {
        $stmt = $pdo->prepare('SELECT * FROM `products` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (empty($row)) {
            return null;
        }

        if ($row['type'] == "book") {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['numpages']
            );
        } elseif ($row['type'] == "record") {
            $product = new RecordProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                (float) $row['price'],
                (int) $row['playlength']
            );
        } else {
            $firstname = (is_null($row['firstname'])) ? "" : $row['firstname'];
            $product = new ShopProduct(
                $row['title'],
                $firstname,
                $row['mainname'],
                (float) $row['price']
            );
        }

        $product->setID((int)  $row['id']);
        $product->setDiscount((int)   $row['discount']);

        return $product;
    }

    public function setDiscount(int|float $num): void
    {
        $this->discount = $num;
    }

    public function getDiscount(): int|float
    {
        return $this->discount;
    }

    public function getPrice(): float
    {
        return ($this->price - $this->discount);
    }

    public function summaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";

        return $base;
    }

    public function getTaxRate(): float
    {
        return 20;
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

}
