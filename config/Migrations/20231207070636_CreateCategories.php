<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCategories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up(): void
    {
        $table = $this->table('categories', [
            'id' => false,
            'primary_key' => ['id'],
        ]);
        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'comment' => 'Name Category',
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'comment' => 'Created',
            'default' => null,
            'limit' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'comment' => 'Modified',
            'default' => null,
            'limit' => null,
            'null' => true,
        ]);
        $table->create();
    }

     /**
     * Drop table users.
     *
     * @return void
     */
    public function down()
    {
        $this->table('categories')->drop()->save();
    }
}
