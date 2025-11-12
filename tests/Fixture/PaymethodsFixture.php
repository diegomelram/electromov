<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymethodsFixture
 */
class PaymethodsFixture extends TestFixture
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
                'cardholder_name' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'provider_name' => 'Lorem ipsum dolor sit amet',
                'card_number' => 'Lorem ipsum dolor ',
                'cvv' => 'L',
                'created' => '2025-11-12 14:44:15',
                'modified' => '2025-11-12 14:44:15',
            ],
        ];
        parent::init();
    }
}
