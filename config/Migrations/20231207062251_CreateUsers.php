<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    public function up()
    {
        // Create column id: biginteger, not null, auto increment
        $table = $this->table('users', [
            'id' => false,
            'primary_key' => ['id'],
        ]);
        $table->addColumn('id', 'biginteger', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('last_name', 'string', [
            'comment' => 'Last name',
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('first_name', 'string', [
            'comment' => 'First name',
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])->addIndex('email', ['unique' => true]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('last_login_datetime', 'datetime', [
            'default' => null,
            'limit' => null,
            'null' => true,
        ]);
        $table->addColumn('status', 'tinyinteger', [
            'default' => 1,
            'limit' => 4,
            'null' => false,
        ])->addIndex('status');
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
        $this->table('users')->drop()->save();
    }
}
