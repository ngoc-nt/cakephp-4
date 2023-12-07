<?php
declare(strict_types=1);

use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class CategoriesSeed extends AbstractSeed
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
        $datetime = (new FrozenTime())->format('Y-m-d H:m:s');
        $data = [];

        $table = $this->table('categories');
        for ($i=1; $i<= 20; $i++) {
            $data[] = [
                'name' => 'Category no ' . $i,
                'created' => $datetime,
                'modified' => $datetime,
            ];
        }
        $table->insert($data)->save();
    }
}
