<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PromotionsFixture
 */
class PromotionsFixture extends TestFixture
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
                'code' => 'Lorem ipsum dolor sit amet',
                'discount_percentage' => 1.5,
                'status' => 1,
                'created' => '2025-11-12 14:44:16',
                'modified' => '2025-11-12 14:44:16',
            ],
        ];
        parent::init();
    }
}
