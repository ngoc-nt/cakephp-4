<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    public function up()
    {
        // Create column id: biginteger, not null, auto increment
        $table = $this->table('products', [
            'id' => false,
            'primary_key' => ['id'],
        ]);
        $table->addColumn('id', 'biginteger', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'comment' => 'Name Product',
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('category_id', 'integer', [
            'comment' => 'ID category',
            'default' => null,
            'limit' => 20,
            'null' => false,
        ])
        ->addForeignKey('category_id', 'categories', 'id', [
            'update' => 'CASCADE',
            'delete' => 'CASCADE',
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
        $this->table('products')->drop()->save();
    }
}
