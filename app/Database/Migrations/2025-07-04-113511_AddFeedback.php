<?php
// app/Database/Migrations/2025-07-04_AddFeedback.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFeedback extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'email'       => ['type' => 'VARCHAR', 'null' => true],
            'comment'     => ['type' => 'TEXT'],
            'article_id'  => ['type' => 'INT'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('feedback');
    }

    public function down()
    {
        $this->forge->dropTable('feedback');
    }
}
