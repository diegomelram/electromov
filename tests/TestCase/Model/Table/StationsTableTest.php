<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StationsTable Test Case
 */
class StationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StationsTable
     */
    protected $Stations;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Stations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Stations') ? [] : ['className' => StationsTable::class];
        $this->Stations = $this->getTableLocator()->get('Stations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Stations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\StationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
