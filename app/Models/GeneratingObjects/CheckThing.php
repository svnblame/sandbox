<?php

namespace App\Models\GeneratingObjects;

class CheckThing
{
    public function __construct(
        private \DateTime $dateTag,
        private string $cssClass
    ) {}

    public function __toString()
    {
        return ($this->dateTag->format(\DateTime::ATOM) .
            " class: {$this->cssClass}");
    }
}
