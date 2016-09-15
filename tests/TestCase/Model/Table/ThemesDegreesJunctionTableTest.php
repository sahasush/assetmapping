<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThemesDegreesJunctionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThemesDegreesJunctionTable Test Case
 */
class ThemesDegreesJunctionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThemesDegreesJunctionTable
     */
    public $ThemesDegreesJunction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.themes_degrees_junction'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThemesDegreesJunction') ? [] : ['className' => 'App\Model\Table\ThemesDegreesJunctionTable'];
        $this->ThemesDegreesJunction = TableRegistry::get('ThemesDegreesJunction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThemesDegreesJunction);

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
