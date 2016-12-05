<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThemesCoursesJunctionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThemesCoursesJunctionTable Test Case
 */
class ThemesCoursesJunctionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThemesCoursesJunctionTable
     */
    public $ThemesCoursesJunction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.themes_courses_junction'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ThemesCoursesJunction') ? [] : ['className' => 'App\Model\Table\ThemesCoursesJunctionTable'];
        $this->ThemesCoursesJunction = TableRegistry::get('ThemesCoursesJunction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ThemesCoursesJunction);

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
