<?php

namespace App\ObjectBasics;

class AddressManager
{
    private $addresses = ["209.131.36.159", "216.58.213.174"];

    public function outputAddresses($resolve)
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