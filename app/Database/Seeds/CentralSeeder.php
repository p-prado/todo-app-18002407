<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CentralSeeder extends Seeder
{
    public function run()
    {
        $this->call('StatusSeeder');
        $this->call('TypeSeeder');
        $this->call('TaskSeeder');
    }
}