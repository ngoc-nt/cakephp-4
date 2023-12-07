<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProfiles extends AbstractMigration
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
        $table = $this->table('profiles', [
            'id' => false,
            'primary_key' => ['id'],
        ]);
        $table->addColumn('id', 'biginteger', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 20,
            'null' => false,
        ])
        ->addColumn('user_id', 'biginteger', [
            'comment' => 'ID user',
            'default' => null,
            'limit' => 20,
            'null' => false,
        ])
        ->addForeignKey('user_id', 'users', 'id', [
            'update' => 'CASCADE',
            'delete' => 'CASCADE',
        ])
        ->addColumn('phone', 'string', [
            'comment' => 'phone number',
            'default' => null,
            'limit' => 12,
            'null' => true,
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
        $this->table('profiles')->drop()->save();
    }
}
