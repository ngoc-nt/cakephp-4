<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsFixture
 */
class SkillsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'phone' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-12-07 09:24:18',
                'modified' => '2023-12-07 09:24:18',
            ],
        ];
        parent::init();
    }
}
