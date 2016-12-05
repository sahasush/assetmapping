<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThemesCentersJunctionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThemesCentersJunctionTable Test Case
 */
class ThemesCentersJunctionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThemesCentersJunctionTable
     */
    public $ThemesCentersJunction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.themes_centers_junction'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThemesCentersJunction') ? [] : ['className' => 'App\Model\Table\ThemesCentersJunctionTable'];
        $this->ThemesCentersJunction = TableRegistry::get('ThemesCentersJunction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThemesCentersJunction);

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
