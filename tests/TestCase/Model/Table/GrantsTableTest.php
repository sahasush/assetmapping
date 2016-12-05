<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrantsTable Test Case
 */
class GrantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrantsTable
     */
    public $Grants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Grants') ? [] : ['className' => 'App\Model\Table\GrantsTable'];
        $this->Grants = TableRegistry::get('Grants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grants);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
