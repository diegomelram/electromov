<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VehiclesFixture
 */
class VehiclesFixture extends TestFixture
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
                'model_id' => 1,
                'serial_number' => 'Lorem ipsum dolor ',
                'status' => 'Lorem ipsum dolor sit amet',
                'battery_level' => 1,
                'latitude' => 1.5,
                'longitude' => 1.5,
                'current_station_id' => 1,
                'created' => '2025-11-19 00:14:18',
                'modified' => '2025-11-19 00:14:18',
            ],
        ];
        parent::init();
    }
}
