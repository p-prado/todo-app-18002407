<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Grocery Shopping',
                'description' => 'Buy fruits, vegetables, and other essentials for the week.',
                'status_id' => 1,
                'type_id' => 2,
            ],
            [
                'title' => 'Exercise Routine',
                'description' => 'Go for a 30-minute jog in the morning or do a home workout.',
                'status_id' => 1,
                'type_id' => 2,
            ],
            [
                'title' => 'Read JavaScript Book',
                'description' => 'Spend 30 minutes reading the JavaScript book.',
                'status_id' => 1,
                'type_id' => 1,
            ],
            [
                'title' => 'Call Family',
                'description' => 'Call parents and catch up on their week.',
                'status_id' => 2,
                'type_id' => 2,
            ],
            [
                'title' => 'Research Marketing Strategy',
                'description' => 'Research and document the best marketing strategy for this business.',
                'status_id' => 1,
                'type_id' => 3,
            ],
            [
                'title' => 'Brainstorm business name ideas',
                'description' => 'Gather 50 ideas for the business name, including different elements in each name.',
                'status_id' => 1,
                'type_id' => 3,
            ],
        ];
        // Using Query Builder to insert data
        $this->db->table('tasks')->insertBatch($data);
    }
}
