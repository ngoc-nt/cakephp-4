<?php
declare(strict_types=1);

use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $connection = \Cake\Datasource\ConnectionManager::get('default')->newQuery();
        $count = $connection->select('id')->from('users')->execute()->count();
        if (!$count) {
            $datetime = (new FrozenTime())->format('Y-m-d H:m:s');

            for ($i=1; $i<= 20; $i++) {
                $data[] = [
                    'last_name' => 'last_name no ' . $i,
                    'first_name' => 'first_name no ' . $i,
                    'email' => 'user' .$i . '@gmail.com',
                    'password' => (new DefaultPasswordHasher())->hash('12345678'),
                    'last_login_datetime' => $datetime,
                    'status' => 1,
                    'created' => $datetime,
                    'modified' => $datetime,
                ];
            }

            $table = $this->table('users');
            $table->insert($data)->save();
        }
    }
}
