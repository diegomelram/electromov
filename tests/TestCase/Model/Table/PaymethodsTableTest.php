<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymethodsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymethodsTable Test Case
 */
class PaymethodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymethodsTable
     */
    protected $Paymethods;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Paymethods',
        'app.Users',
        'app.Trips',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Paymethods') ? [] : ['className' => PaymethodsTable::class];
        $this->Paymethods = $this->getTableLocator()->get('Paymethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paymethods);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PaymethodsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\PaymethodsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
