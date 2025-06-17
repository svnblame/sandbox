<?php

namespace App\Models\GeneratingObjects;

class NastyBoss
{
    private array $employees = [];

    public function addEmployee(Employee $employee): void
    {
        // BAD!!: Forces specific implementation...
        // $this->employees[] = new Minion($employeeName);

        // Better! Work with ANY given Employee type
        $this->employees[] = $employee;
    }

    public function projectFails(): string
    {
        if (count($this->employees)) {
            $emp = array_pop($this->employees);
            return $emp->fire();
        }

        return 'Project failed. Employees need to do better! No one is fired, for now...';
    }
}
