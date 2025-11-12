<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TripsFixture
 */
class TripsFixture extends TestFixture
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
                'vehicle_id' => 1,
                'start_station_id' => 1,
                'end_station_id' => 1,
                'paymethod_id' => 1,
                'promotion_id' => 1,
                'start_time' => '2025-11-12 14:44:19',
                'end_time' => '2025-11-12 14:44:19',
                'duration_minutes' => 1,
                'base_rate' => 1.5,
                'total_cost' => 1.5,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-11-12 14:44:19',
                'modified' => '2025-11-12 14:44:19',
            ],
        ];
        parent::init();
    }
}
