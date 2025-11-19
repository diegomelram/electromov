<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModelsFixture
 */
class ModelsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'brand' => 'Lorem ipsum dolor sit amet',
                'rate_per_minute' => 1.5,
                'created' => '2025-11-19 00:22:13',
                'modified' => '2025-11-19 00:22:13',
            ],
        ];
        parent::init();
    }
}
