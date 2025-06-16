<?php

namespace App\Models\GeneratingObjects;

class NastyBoss
{
    private array $employees = [];

    public function addEmployee(string $employeeName): void
    {
        // BAD!!: Forces specific implementation...
        $this->employees[] = new Minion($employeeName);
    }

    public function projectFails(): string
    {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            return $emp->fire();
        }

        return 'Project failed. Employees need to do better! No one is fired, for now...';
    }
}
