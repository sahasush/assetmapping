<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LabsCentersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LabsCentersTable Test Case
 */
class LabsCentersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LabsCentersTable
     */
    public $LabsCenters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.labs_centers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('LabsCenters') ? [] : ['className' => 'App\Model\Table\LabsCentersTable'];
        $this->LabsCenters = TableRegistry::get('LabsCenters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LabsCenters);

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
