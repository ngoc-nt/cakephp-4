<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProfilesFixture
 */
class ProfilesFixture extends TestFixture
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
                'phone' => 'Lorem ipsu',
                'created' => '2023-12-07 07:51:59',
                'modified' => '2023-12-07 07:51:59',
            ],
        ];
        parent::init();
    }
}
