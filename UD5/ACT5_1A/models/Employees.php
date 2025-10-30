<?php

namespace models;

class Employees extends Model
{
    protected static $table = 'employees';


    public function __construct(
        public int $employee_id,
        public ?string $first_name=null,
        public ?string $last_name=null,
        public ?string $email=null,
        public ?string $phone_number=null,
        public ?string $hire_date=null,
        public ?string $job_id=null,
        public ?string $salary=null,
        public ?string $commission_pct=null,
        public ?string $manager_id=null,
        public ?string $department_id=null,
    )
    {}
}
