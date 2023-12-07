<?php
declare(strict_types=1);

use Cake\I18n\FrozenTime;
use Migrations\AbstractSeed;

/**
 * Products seed.
 */
class ProductsSeed extends AbstractSeed
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

        $table = $this->table('products');
        for ($i=1; $i<= 100; $i++) {
            $data[] = [
                'name' => 'Product no ' . $i,
                'category_id' => rand(1,20),
                'created' => $datetime,
                'modified' => $datetime,
            ];
        }
        $table->insert($data)->save();
    }
}
