<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pending'],
            ['name' => 'Done'],
        ];

        $this->db->table('status')->insertBatch($data);
    }
}
