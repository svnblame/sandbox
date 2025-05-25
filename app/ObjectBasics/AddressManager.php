<?php

namespace App\ObjectBasics;

class AddressManager
{
    private array $addresses = ["209.131.36.159", "216.58.213.174"];

    /**
     * @param bool $resolve
     * @return void
     */
    public function outputAddresses(bool $resolve): void
    {
        foreach ($this->addresses as $address) {
            print $address;

            if ($resolve) {
                print " (" . gethostbyaddr($address) . ")";
            }

            print PHP_EOL;
        }
    }
}