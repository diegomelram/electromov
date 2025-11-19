<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor ',
                'password' => 'Lorem ipsum dolor sit amet',
                'full_name' => 'Lorem ipsum dolor sit amet',
                'admin' => 1,
                'sex' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'age' => 1,
                'date_birth' => '2025-11-19',
                'created' => '2025-11-19 00:20:14',
                'modified' => '2025-11-19 00:20:14',
            ],
        ];
        parent::init();
    }
}
