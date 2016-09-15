<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CentersFacultyJunctionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CentersFacultyJunctionTable Test Case
 */
class CentersFacultyJunctionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CentersFacultyJunctionTable
     */
    public $CentersFacultyJunction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.centers_faculty_junction'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CentersFacultyJunction') ? [] : ['className' => 'App\Model\Table\CentersFacultyJunctionTable'];
        $this->CentersFacultyJunction = TableRegistry::get('CentersFacultyJunction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CentersFacultyJunction);

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
