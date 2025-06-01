<?php

namespace App\Models\ObjectBasics;

class AddressManager
{
    private array $addresses = [];

    /**
     * @param bool $resolve
     * @return array
     */
    public function outputAddresses(bool $resolve): array
    {
        $this->addresses = config('app.addresses');
        $results = [];

        foreach ($this->addresses as $i => $address) {
            $results[$i] = $address;

            if ($resolve) {
                $results[$i] .= " (" . gethostbyaddr($address) . ")";
            }
        }

        return $results;
    }
}
