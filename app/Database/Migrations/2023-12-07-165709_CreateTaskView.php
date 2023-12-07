<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTaskView extends Migration
{
    public function up()
    {
        $query = "
            CREATE VIEW tasks_view AS
            SELECT
                tasks.id,
                tasks.title,
                tasks.description,
                tasks.status_id,
                status.name AS status_name,
                tasks.type_id,
                type.name AS type_name
            FROM tasks
                LEFT JOIN status
                ON tasks.status_id = status.id
                LEFT JOIN type
                ON tasks.type_id = type.id;
        ";

        $this->db->query($query);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS tasks_view");
    }
}
