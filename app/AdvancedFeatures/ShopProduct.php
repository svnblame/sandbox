<?php

namespace App\AdvancedFeatures;

class ShopProduct implements Chargeable
{
    use PriceUtilities;

    public const int AVAILABLE = 0;
    public const int OUT_OF_STOCK = 1;

    private int $id = 0;

    private int|float $discount = 0;
    public readonly string $producer;

    public function __construct(
        public readonly string $title = "default product",
        public readonly string $producerFirstName = "first name",
        public readonly string $producerMainName = "main name",
        public int|float $price = 0
    ) {
        $this->producer = $this->producerFirstName . " "
            . $this->producerMainName;
    }

    public function setID(int $id): void
    {
        $this->id = $id;
    }

    public static function getInstance(int $id, \PDO $pdo): ?ShopProduct
    {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $result = $stmt->execute([$id]);
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

        $product->setID((int) $row['id']);
        $product->setDiscount((int) $row['discount']);

        return $product;
    }

    public function setDiscount(int | float $num): void
    {
        $this->discount = $num;
    }

    public function getDiscount(): int | float
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

    public function getTitle(): string
    {
        return $this->title;
    }
}